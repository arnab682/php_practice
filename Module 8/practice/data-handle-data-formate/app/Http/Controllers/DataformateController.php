<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataformateController extends Controller
{
    public function demo1():string|int|null|bool{ //it is basically defind a type for return value
        //return "Hello";
        //return response()->json("Hello");
        return "string|int|null|bool";
    }

    public function demo2(){
        $arr = ["A","B","C","D","E","F"];
        $arr2 = [
            "A" => "Arnab",
            "B" => "Bablu",
            "C" => "Choton",
            "D" => "Dhiman",
            "E" => "Emon",
            "F" => "Fahim"
        ];
        //associative array 
        $assc = array(['name'=>'Antika', 'age'=>'30'], ['name'=>'Tanmoy', 'age'=>'29']);
        return $assc;
        //return response()->json("Hello");
    }

    public function demo3(){
        $arr = array(['Arnab', 'Anik', 'Tanmoy']);
        $assc = array(['name'=>'Antika', 'age'=>'30'], ['name'=>'Tanmoy', 'age'=>'29']);
        return response()->json($arr); //make object
    }


    public function demo4(){
        $arr = array(['Arnab', 'Anik', 'Tanmoy']);
        $assc = array(['name'=>'Antika', 'age'=>'30'], ['name'=>'Tanmoy', 'age'=>'29']);
        return response()->json("Hello");
    }


    public function demo5(){
        //return "Hello";
        return response()->json("Hello");
    }


    public function demo6(){
        //return "Hello";
        return response()->json("Hello");
    }


    public function demo7(){
        //return "Hello";
        return response()->json("Hello");
    }


    public function demo8(){
        //return "Hello";
        return response()->json("Hello");
    }


    public function demo9(){
        //return "Hello";
        return response()->json("Hello");
    }


    public function demo10(){
        //return "Hello";
        return response()->json("Hello");
    }
}
