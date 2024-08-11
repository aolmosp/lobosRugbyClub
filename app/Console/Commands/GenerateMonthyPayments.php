<?php

namespace App\Console\Commands;

use App\Enums\PaymentsEnum;
use App\Enums\PlayerStatusEnum;
use App\Jobs\GeneratePendingPayments as JobsGeneratePendingPayments;
use App\Models\Player;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class GenerateMonthyPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate_monthy_payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera un nuevo pago para los jugadores seleccionados';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::select('id')->whereHas('player', function (Builder $query) {
            $query->where('status', PlayerStatusEnum::ACTIVO);
        })->get();

        JobsGeneratePendingPayments::dispatch($users, PaymentsEnum::MENSUALIDAD->value, PaymentsEnum::MENSUALIDAD->getAmount())->onQueue('payments');
    }
}
