<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(){
       return view('backend.candidate.index');
    }

    function CandidateList(Request $request){
        try{
            //$user_id=Auth::id();
            //$rows= Category::where('user_id',$user_id)->get();
            $rows= User::join('roles', 'roles.user_id', '=', 'users.id')
                    ->where('roles.candidate', '=', 1)
                    ->join('profiles', 'profiles.user_id', '=', 'users.id')
                    ->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
