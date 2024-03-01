<?php

use App\Http\Controllers\banckend\CategoryController;
use App\Http\Controllers\ProfileController;
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



Route::get('/dashboard', function () {
    return view('backend.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('category', [CategoryController::class, 'index']);
    Route::get("list-category",[CategoryController::class,'CategoryList']);
    Route::post('category', [CategoryController::class, 'store']);
    Route::post('category/edit', [CategoryController::class, 'edit']);
    Route::post('category/update', [CategoryController::class, 'update']);
    Route::post('category/delete', [CategoryController::class, 'destroy']);
    
});

require __DIR__.'/auth.php';
//Route::get('category/edit', [CategoryController::class, 'edit']);

// Route::post('category/edit', function (App\Models\Category $category) {
//     //$user_id=Auth::id();
//     $rows=App\Models\Category::where('id', 1)->first();
//     //$rows=Category::where('id',$category_id)->first();
//     return response()->json(['status' => 'success', 'rows' => $rows]);
// });
