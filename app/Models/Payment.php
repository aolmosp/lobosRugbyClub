<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function pendingPayments()
    {
        return $this->hasOne(PendingPayment::class);
    }

    public function getMontoFormatAttribute()
    {
        return '$ '.number_format($this->monto, 0, ',', '.');
    }

    public function getFechaFormatAttribute()
    {
        return Carbon::parse($this->fecha_pago)->format('d/m/Y');
    }
}
