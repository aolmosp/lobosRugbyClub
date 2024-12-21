<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['equipo_id', 'rival', 'fecha', 'lugar'];

    public function getFechaFormatAttribute()
    {
        return Carbon::parse($this->fecha)->format('d/m/Y');
    }

}
