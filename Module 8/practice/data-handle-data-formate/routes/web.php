<?php

use App\Http\Controllers\DataformateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/demo1', [DataformateController::class, 'demo1'])->name('demo1');
Route::get('/demo3', [DataformateController::class, 'demo3'])->name('demo3');
Route::get('/demo4', [DataformateController::class, 'demo4'])->name('demo4');
Route::get('/demo5', [DataformateController::class, 'demo5'])->name('demo5');
Route::get('/demo6', [DataformateController::class, 'demo6'])->name('demo6');
Route::get('/demo7', [DataformateController::class, 'demo7'])->name('demo7');
Route::get('/demo8', [DataformateController::class, 'demo8'])->name('demo8');
Route::get('/demo9', [DataformateController::class, 'demo9'])->name('demo9');
Route::get('/demo10', [DataformateController::class, 'demo10'])->name('demo10');


//Task 1:
Route::post('/form-submit', function(Request $request) {
    
    $email=$request->input('email');

    if($email) {
        
        return response()->json([
            'status' => 'success',
            'message' => 'Form submitted successfully.',
            'email' => $email
        ]);
    } 
    else {
       
        return response()->json([
            'status' => 'failed',
            'message' => 'Form submission failed.'
        ]);
    }
});

//Task 2:
Route::get('/user-agent', function(Request $request) {

    $userAgent = $request->header('User-Agent');

    return response()->json($userAgent);
});



//profile 
Route::get('/profile/{id?}', [ProfileController::class, 'index']);