<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
       return view('backend.blog.index');
    }

    function BlogList(Request $request){
        try{
            $user_id=Auth::id();
            //$rows= Category::where('user_id',$user_id)->get();
            $rows= Blog::get();
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
        try{
            $request->validate([
                'title' => 'required|string|min:2',
                'tag' => 'required|string|min:2',
                'description' => 'required|string|min:2'
            ]);
            $user_id=Auth::id();
            Blog::create([
                'title'=>$request->input('title'),
                'category_id'=>1,
                'tag'=>$request->input('tag'),
                'description'=>$request->input('description'),
                'created_by'=>$user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
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
            $blog_id=$request->input('id');
            $rows=Blog::where('id', $blog_id)->first();
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
            // $request->validate([
            //     'id' => 'required|string|min:1',
            //     'title' => 'required|string|min:2',
            //     'tag' => 'required|string|min:2',
            //     'description' => 'required|string|min:2'
            // ]);

            $blog_id=$request->input('id');
            $updated_by=Auth::id();
            Blog::where('id',$blog_id)->update([
                'title'=>$request->input('title'),
                'tag'=>$request->input('tag'),
                'description'=>$request->input('description'),
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
    public function destroy(Request $request)
    {
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            //$user_id=Auth::id();
            $blog_id=$request->input('id');
            Blog::where('id',$blog_id)->delete();
            //Category::where('id',$category_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
