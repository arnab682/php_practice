<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
       return view('backend.social_link.index');
    }

    function SocialLinkList(Request $request){
        try{
            //$user_id=Auth::id();
            $rows= SocialLink::get();
            //$rows= Contact::first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try{    
            $id=$request->input('id');
            $rows=SocialLink::where('id', $id)->first();
            //$rows=Category::where('id',$category_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string|min:1',
                'twitter' => 'required|string|min:2',
                'facebook' => 'required|string|min:2',
                'youtube' => 'required|string|min:2',
                'linkedin' => 'required|string|min:2'
            ]);

            $contact_id=$request->input('id');
            $updated_by=Auth::id();
            SocialLink::where('id',$contact_id)->update([
                'twitter'=>$request->input('twitter'),
                'facebook'=>$request->input('facebook'),
                'youtube'=>$request->input('youtube'),
                'linkedin'=>$request->input('linkedin'),
                'updated_by'=>$updated_by,
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
