<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    $products = DB::table('products')
    ->select('Categories', DB::raw('COUNT(*) as price'))
    //->groupBy('Categories')
    ->havingRaw('COUNT(*) > 5')
    ->get();

    return $products;
});