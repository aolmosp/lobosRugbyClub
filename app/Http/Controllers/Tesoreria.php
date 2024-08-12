<?php

namespace App\Http\Controllers;

use App\Enums\PlayerStatusEnum;
use App\Models\Player;
use Illuminate\Http\Request;

class Tesoreria extends Controller
{
    public function index(){
        $players = Player::where('status', '<>', PlayerStatusEnum::INACTIVO )->get();

        return view('tesoreria/dashboard')->with('players', $players);
    }
}
