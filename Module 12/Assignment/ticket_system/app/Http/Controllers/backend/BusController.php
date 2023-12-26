<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $buses = Bus::OrderBy('id', 'desc')->get();
        
        return view('backend.pages.bus.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.bus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //$data['created_by'] = Auth::user()->id;
        //$data['updated_by'] = Auth::user()->id;
        $store = Bus::create($data);
        

        return redirect()->route('buses.index');
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
        $bus = Bus::findOrFail($id);

        return view('backend.pages.bus.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all(); 
        $bus = Bus::findOrFail($id);

        //dd($data); die();
        $bus->update($data);

        return redirect()->route('buses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bus = Bus::findOrFail($id);

        $bus->delete();

        return redirect()->back();
    }
}