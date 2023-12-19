<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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


Route::get('/dashboard', function () {
    $total = DB::table('products')->count();
    $today = DB::table('products')->whereDate('created_at', Carbon::now())->count();
    $yesterday = DB::table('products')->whereDate('created_at', Carbon::yesterday())->count();
    $month = DB::table('products')->whereMonth('created_at', Carbon::now())->count();
    $lastmonth = DB::table('products')->whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
    //dd($lastmonth);
    return view('backend/pages/dashboard', compact('total', 'today', 'yesterday', 'month', 'lastmonth'));
});

Route::get('/product', function () {
    return view('backend/pages/product/index');
});

Route::resource('products', ProductController::class);