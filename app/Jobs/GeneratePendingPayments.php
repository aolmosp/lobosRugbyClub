<?php

namespace App\Jobs;

use App\Enums\PendingPaymentsStatusEnum;
use App\Enums\PlayerStatusEnum;
use App\Models\PendingPayment;
use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeneratePendingPayments implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $users;
    private $amount;
    private $tipo;

    /**
     * Create a new job instance.
     */
    public function __construct($users, $tipo, $amount)
    {
        $this->users = $users;
        $this->tipo = $tipo;
        $this->amount = $amount;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->users->each(function($user){
            PendingPayment::create([
                'monto' => $this->amount,
                'tipo' => $this->tipo,
                'user_id' => $user->id,
                'fecha_corresponde' => Carbon::today()->addMonth()->firstOfMonth(),
                'estado' => PendingPaymentsStatusEnum::PENDIENTE->value,
            ]);
        });
    }
}
