<?php

namespace App\Http\Controllers;

use App\Enums\PlayerStatusEnum;
use App\Models\Payment;
use App\Models\PendingPayment;
use App\Models\Player;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class Index extends Controller
{

    protected $user;
    protected $deuda_maxima;

    public function __construct()
    {
        Carbon::setLocale('es');
        $this->deuda_maxima = 100000;
    }

    public function reset(Request $request){
 
    }

    public function index(Request $request){

        $this->user = $request->user();
        if($this->user->hasRole('tesoreria')){
            return view('tesoreria/mensual');
        }
        return $this->jugador();
    }

    public function index2(Request $request){

            return view('tesoreria/dashboard');
        
    }

    public function players(){

        $players = Player::where('status', '<>', PlayerStatusEnum::INACTIVO )->with(['pendingPayments'])->orderBy('name')->get();
        $pagosJugadores = [];
        $period_year = CarbonPeriod::create(Carbon::today()->addYear()->firstOfYear(), '1 month', Carbon:today()->addYear()->lastOfYear());

        foreach ($players as $player) {
            $pagosJugadores[$player->id] = [
                    'id' => $player->id,
                    'equipo' => $player->equipo_id,
                    'name' => $player->name,
                    'data' => [],
                    'deuda_total' => 0,
                    'order_deuda' => 0,
            ];
            $deuda_total = 0;
            foreach ($period_year as $month) {

                $pending = $player->pendingPayments->where('fecha_corresponde', $month->format('Y-m-d'));
                $status = 0;
                $amount = 0;

                if(!is_null($pending)){
                    if($pending->count() > 1){
                        if($pending->where('status', 1)->count() >= 1){
                            $status = 1;
                            foreach($pending->where('status', 1) as $pending){
                                $amount += $pending->monto;
                            }
                            $deuda_total += $amount;
                        }else{
                            $status = 2;
                        }
                    }else{
                        $status = $pending->first()?->status;
                        if($status == 1){
                            $amount = $pending->first()?->monto;
                            $deuda_total += $amount;
                        }
                    }
                }

                $pagosJugadores[$player->id]['data'][$month->month] = [
                    'month' => $month->monthName,
                    'month_' => $month->month,
                    'amount' => '$ '.number_format($amount, 0, ',', '.'),
                    'status' => is_null($pending) ? 0 : $status,
                ];
            }

            $pagosJugadores[$player->id]['deuda_total'] = '$ '.number_format($deuda_total, 0, ',', '.');
            $pagosJugadores[$player->id]['order_deuda'] = $deuda_total;
        }

        //$pagosJugadores = collect($pagosJugadores)->sortByDesc('order_deuda')->values()->all();

        $data_masculino = collect($pagosJugadores)->where('equipo', 1)->values()->all();
        $data_femenino = collect($pagosJugadores)->where('equipo', 2)->values()->all();
        $data_juvenil = collect($pagosJugadores)->where('equipo', 3)->values()->all();
        //$pagosJugadores = collect($pagosJugadores)->values()->all();

        return response()->json(['masculino' => $data_masculino, 'femenino' => $data_femenino, 'juvenil' => $data_juvenil]);
        
    }

    private function jugador(){

        $player = Player::where('user_id', $this->user->id)->with(['games' => function($query){
            $query->where('fecha', '>=', Carbon::today());
            $query->limit(1);
        },'pendingpayments' => function($query){
            $query->where('fecha_corresponde', '>=', Carbon::today()->firstOfYear());
            $query->where('status', 1);
            $query->orderBy('fecha_corresponde');
            $query->with('payment.player');
        }])->first();
        
        $deuda_total = 0;
        foreach($player->pendingpayments as $pending){
            $deuda_total += $pending->monto;
        }

        $player->deuda = $deuda_total;
        $player->deuda_format = '$ '.number_format($deuda_total, 0, ',', '.');
        $player->deuda_maxima = $this->deuda_maxima;

        $player->games->map(function($obj){
            $obj->setAppends(['fechaFormat']);
            $obj->hora = ($obj->hora == '00:00:00') ? null : Carbon::parse($obj->hora)->format('h:i A');
        });

        $player->publicos = PendingPayment::where('publico',1)->where('fecha_corresponde', '>=', Carbon::today()->firstOfYear())->with('player')->orderBy('status', 'ASC')->get();
        $player->pendingPayments = $player->pendingPayments->sortBy('fecha_corresponde');

        return view('profile/detail')->with('player', $player);
    }

    public function player_pending($player_id, $status = null)
    {
        $player = Player::where('id', $player_id)->with(['pendingpayments' => function($query) use ($status){
            $query->where('fecha_corresponde', '>=', Carbon::today()->firstOfYear());
            if(!is_null($status)){
                $query->where('status', $status);
            }
            $query->with('payment');
            $query->orderBy('fecha_corresponde');
        }])->first();

        $player->pendingpayments->map(function($obj){
            $obj->setAppends(['montoFormat', 'month', 'tipodesc']);
            if($obj->payment){
                $obj->payment->setAppends(['fechaFormat']);
            }
        });

        return response()->json(['data' => $player]);
    }

    public function player_pending_edit(Request $request, $pending_id)
    {

        $pending = PendingPayment::where('id', $pending_id)->first();

        if(is_null($pending->payment_id)){
            $pending->monto = $request->get('monto');
            $pending->save();
            return response()->json(['message' => 'Cupón de pago modificado con exito']);
        }

        return response()->json(['error' => 'No se puede editar el cupón de pago, ya tiene un pago asociado']);
    }

    public function  player_pending_divide(Request $request, $pending_id)
    {
        $pending = PendingPayment::where('id', $pending_id)->first();

        if(is_null($pending->payment_id)){

            if(($pending->monto - $request->get('monto')) > 0 ){
                PendingPayment::create([
                    'monto' => $request->get('monto'),
                    'tipo' => $pending->tipo,
                    'player_id' => $pending->player_id,
                    'fecha_corresponde' => $pending->fecha_corresponde,
                    'status' => $pending->status,
                    'payment_id' => null,
                ]); 
                
                $pending->monto = ($pending->monto - $request->get('monto'));
                $pending->save();
                return response()->json(['message' => 'Cupón de pago modificado con exito']);
            }

        }

        return response()->json(['error' => 'No se puede editar el cupón de pago, ya tiene un pago asociado']);
    }

    public function player_payment_save(Request $request, $player_id)
    {
        $pending_payments = PendingPayment::whereIn('id', $request->get('pending'))->where('player_id', $player_id)->get();

        if($pending_payments){
            $payer = Player::where('id', $request->get('payer'))->firstOrFail();

            $payment = Payment::create([
                'monto' => $request->get('monto'),
                'player_id' => $payer->id,
                'canal' => 1,
                'fecha_pago' => Carbon::today(),
                'estado' => 1,
            ]);

            foreach($pending_payments as $pp){
                $pp->status = 2;
                $pp->payment_id = $payment->id;
                $pp->save();
            }

            return response()->json(['message' => 'Pago registrado con exito']);
        }

        return response()->json(['error' => 'No fue posible registrar el pago']);
    }

    public function player_pending_delete($pending_id)
    {

        $pending = PendingPayment::where('id', $pending_id)->first();

        if(is_null($pending->payment_id)){
            $pending->delete();
            return response()->json(['message' => 'Cupón de pago eliminado']);
        }

        return response()->json(['error' => 'No se puede eliminar el cupón de pago, ya tiene un pago asociado']);
    }

    public function public_pending(){
        $pending_payments = PendingPayment::where('publico',1)->where('fecha_corresponde', '>=', Carbon::today()->firstOfYear())->with(['player', 'payment'])->orderBy('status', 'ASC')->get();

        $pending_payments->map(function($p){
            $date = Carbon::parse($p->fecha_corresponde);
            $p->month = $date->monthName;
            $p->setAppends(['fechaFormat', 'montoFormat', 'tipoDesc', 'statusDesc']);
            (is_null($p->payment)) ?: $p->payment->setAppends(['fechaFormat']);
        });
        $pending_payments = $pending_payments->sortBy('fecha_corresponde')->groupBy('month');

        return response()->json(['data' => $pending_payments, 'count' => $pending_payments->count()]);
    }

    public function player_pending_save(Request $request){

        
        $players = Player::whereIn('id', $request->get('players'))->where('status', 1)->get();

        foreach($players as $p){

            $payment = PendingPayment::create([
                'monto' => $request->get('monto'),
                'tipo' => $request->get('tipo'),
                'player_id' => $p->id,
                'fecha_corresponde' => Carbon::parse($request->get('fecha'))->firstOfMonth(),
                'status' => 1,
                'payment_id' => null,
                'publico' => $request->get('publico'),
            ]);

            $payment->save();
            
        }

        return response()->json(['message' => 'Cobro/s registrados con exito']);

    }
    
}
