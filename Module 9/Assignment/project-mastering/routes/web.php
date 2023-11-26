<?php

use App\Http\Controllers\CheckController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;
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

Route::get('/hello', function () {
    $check = new CheckController();
});

//Backend Template
Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
});

//Portfolio
Route::get("home",[HomeController::class,"home"])->name('home');
Route::get('aboutme', [AboutController::class, 'index'])->name('aboutme');
Route::get("project",[ProjectsController::class,"project"])->name('project');
Route::get("contact",[ContactController::class,"contact"])->name('contact');

