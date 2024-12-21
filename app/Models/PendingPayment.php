<?php

namespace App\Models;

use App\Enums\PendingPaymentsStatusEnum;
use App\Enums\PendingPaymentsTypoEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingPayment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function getMonthAttribute()
    {
        return Carbon::parse($this->fecha_corresponde)->monthName;
    }

    public function getTipoDescAttribute()
    {
        return PendingPaymentsTypoEnum::from($this->tipo)->getDesc();
    }

    public function getStatusDescAttribute()
    {
        return PendingPaymentsStatusEnum::from($this->status)->getDesc();
    }

    public function getMontoFormatAttribute()
    {
        return '$ '.number_format($this->monto, 0, ',', '.');
    }

    public function getFechaFormatAttribute()
    {
        return Carbon::parse($this->fecha_corresponde)->format('d/m/Y');
    }

}
