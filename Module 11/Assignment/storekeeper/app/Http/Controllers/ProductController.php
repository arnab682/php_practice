<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products = DB::table('products')->get();
       return view('backend/pages/product/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend/pages/product/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new['title'] = $request->title;
        $new['quantity'] = $request->quantity;
        $new['price'] = $request->price;
        $new['short_des'] = "";
        $new['description'] = "";
        $new['discount'] = 0;
        $new['discount_price'] = 0;
        $new['image'] = "";
        $new['stock'] = 40;
        $new['star'] = 4;
        $new['remark'] = 'popular';
        $new['category_id'] = 1;
        $new['brand_id'] = 1;

        DB::table('products')->insert($new);
        return redirect()->route('products.index');
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
    public function edit(string $id)
    {
        $product = DB::table('products')->find($id);
        //dd($product);
        return view('backend/pages/product/edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $new['title'] = $request->title;
        $new['quantity'] = $request->quantity;
        $new['price'] = $request->price;
        $update = DB::table('products')->where('id', $id)->update($new);
        //$update->update($request->all());
        // dd($update);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {dd($id);
        $delete = DB::table('products')->delete();
        return redirect()->route('products.index');
    }
}
