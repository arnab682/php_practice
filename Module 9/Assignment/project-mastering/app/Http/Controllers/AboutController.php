<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index(){
        $active = "aboutme";
        return view("pages.aboutme", compact('active'));
    }
}
