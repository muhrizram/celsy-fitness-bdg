<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function firstTime(){
        return view('firstTime.index');
    }
}
