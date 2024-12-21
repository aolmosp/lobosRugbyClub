<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['user_id', 'name', 'equipo_id', 'status'];

    public function pendingPayments()
    {
        return $this->hasMany(PendingPayment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function games()
    {
        return $this->hasMany(Game::class, "equipo_id", "equipo_id");
    }

}
