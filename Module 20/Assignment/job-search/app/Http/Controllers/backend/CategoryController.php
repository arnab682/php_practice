<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
       return view('backend.category.index');
    }

    function CategoryList(Request $request){
        try{
            $user_id=Auth::id();
            //$rows= Category::where('user_id',$user_id)->get();
            $rows= Category::get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
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
                'name' => 'required|string|min:2'
            ]);
            $user_id=Auth::id();
            Category::create([
                'name'=>$request->input('name'),
                'created_by'=>$user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
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
            $category_id=$request->input('id');
            $rows=Category::where('id', $category_id)->first();
            //$rows=Category::where('id',$category_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (Exception $e){
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
                'name' => 'required|string|min:2'
            ]);

            $category_id=$request->input('id');
            $updated_by=Auth::id();
            Category::where('id',$category_id)->update([
                'name'=>$request->input('name'),
                'updated_by'=>$updated_by,
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (Exception $e){
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
            $category_id=$request->input('id');
            Category::where('id',$category_id)->delete();
            //Category::where('id',$category_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
