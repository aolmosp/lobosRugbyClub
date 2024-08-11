<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tesoreria extends Controller
{
    public function index(){
        return view('tesoreria/dashboard');
    }
}
