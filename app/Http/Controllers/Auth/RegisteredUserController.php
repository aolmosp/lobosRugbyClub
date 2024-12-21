<?php

namespace App\Http\Controllers\Auth;

use App\Enums\PendingPaymentsStatusEnum;
use App\Enums\PendingPaymentsTypoEnum;
use App\Http\Controllers\Controller;
use App\Models\PendingPayment;
use App\Models\Player;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request)
    {

        $user = $request->user();
        if($user->hasRole('admin')){
            return view('auth.register');
        }
        return redirect("/");
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'equipo' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $player = Player::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'equipo_id' => $request->equipo,
            'status' => 1,
        ]);

        PendingPayment::create([
            'monto' => ($request->equipo == 3) ? 20000 : 40000,
            'tipo' => PendingPaymentsTypoEnum::MATRICULA,
            'player_id' => $player->id,
            'fecha_corresponde' => Carbon::today()->addMonth()->firstOfMonth(),
            'status' => PendingPaymentsStatusEnum::PENDIENTE->value,
            'publico' => 0,
        ]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
