<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function index(){
        return view('backend.contact.index');
    }
    function ContactList(Request $request){
        try{
            $user_id=Auth::id();
            $rows= Contact::get();
            //$rows= Contact::first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function edit(Request $request)
    {
        try{    
            $contact_id=$request->input('id');
            $rows=Contact::where('id', $contact_id)->first();
            //$rows=Category::where('id',$category_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string|min:1',
                'address' => 'required|string|min:2',
                'email' => 'required|string|min:2',
                'phone' => 'required|string|min:2',
                //'google_map' => 'required|string|min:2'
            ]);

            $contact_id=$request->input('id');
            $updated_by=Auth::id();
            Contact::where('id',$contact_id)->update([
                'address'=>$request->input('address'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'google_map'=>$request->input('google_map'),
                //'updated_by'=>$updated_by,
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
