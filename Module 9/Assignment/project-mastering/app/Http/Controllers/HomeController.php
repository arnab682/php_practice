<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
        $active = 'home';
        return view("pages.home", compact('active'));
    }
}
