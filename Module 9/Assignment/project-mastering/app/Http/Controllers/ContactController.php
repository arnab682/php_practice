<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function contact(){
        $active = 'contact';
        return view("pages.contact", compact('active'));
    }
}
