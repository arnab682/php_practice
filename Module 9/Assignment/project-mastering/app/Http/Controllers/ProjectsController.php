<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //
    public function project(){
        $active = "project";
        return view("pages.project", compact('active'));
    }
}
