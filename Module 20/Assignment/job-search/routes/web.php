<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CompanyController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
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
    // return redirect(route('login'));
})->name('welcome');




    Route::get('/login/{social}', [SocialController::class, 'socialLogin'])->where('social','google');
    Route::get('/login/{social}/callback', [SocialController::class, 'handleProviderCallback'])->where('social','google');
    //Route::get('/social/register/{social}', [SocialController::class, 'createUser'])->where('social','google');

Route::get('/employers/account', [FrontendController::class, 'employersAccount']);
Route::post('/employers/register', [RegisteredUserController::class, 'store']);

Route::get('/candidate/account', [FrontendController::class, 'candidateAccount'])->name('candidate.account');
Route::post('/candidate/register', [RegisteredUserController::class, 'store']);
Route::get('/contact', [FrontendController::class, 'contact']);



// Route::get('/dashboard', function () {
//     return view('backend.home');
// })->middleware(['auth', 'verified'])->name('dashboard');



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

    Route::get('company', [CompanyController::class, 'index']);
    Route::get("list-company",[CompanyController::class,'CategoryList']);
    Route::post('company', [CompanyController::class, 'store']);
    Route::post('company/edit', [CompanyController::class, 'edit']);
    Route::post('company/update', [CompanyController::class, 'update']);
    Route::post('company/delete', [CompanyController::class, 'destroy']);

    Route::get('blog', [BlogController::class, 'index']);
    Route::get("list-blog",[BlogController::class,'BlogList']);
    Route::post('blog', [BlogController::class, 'store']);
    Route::post('blog/edit', [BlogController::class, 'edit']);
    Route::post('blog/update', [BlogController::class, 'update']);
    Route::post('blog/delete', [BlogController::class, 'destroy']);
    
    Route::get('/contact/list', [ContactController::class, 'index']);
    Route::get("list-contact",[ContactController::class,'ContactList']);
    Route::post('contact/edit', [ContactController::class, 'edit']);
    Route::post('contact/update', [ContactController::class, 'update']);

    Route::get('banner', [BannerController::class, 'index']);
    Route::get("list-banner",[BannerController::class,'BannerList']);
    Route::post('banner', [BannerController::class, 'store']);
    Route::post('banner/edit', [BannerController::class, 'edit']);
    Route::post('banner/update', [BannerController::class, 'update']);
    Route::post('banner/delete', [BannerController::class, 'destroy']);




Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
Route::prefix('candidate')->group(function(){
    Route::get('/welcome', function () {
        return view('welcome');
        // return redirect(route('login'));
    })->name('candidateDashboard');
});

Route::prefix('employers')->group(function(){
    Route::get('/welcome', function () {
        return view('welcome');
        // return redirect(route('login'));
    })->name('employersDashboard');
});

Route::prefix('superadmin')->group(function(){
    Route::get('/', function () {
        return view('backend.home');
        // return redirect(route('login'));
    })->name('superadminDashboard');
});

Route::get('/user/logout', [ProfileController::class, 'logout'])->name('logout');

});

require __DIR__.'/auth.php';
//Route::get('category/edit', [CategoryController::class, 'edit']);

// Route::post('category/edit', function (App\Models\Category $category) {
//     //$user_id=Auth::id();
//     $rows=App\Models\Category::where('id', 1)->first();
//     //$rows=Category::where('id',$category_id)->first();
//     return response()->json(['status' => 'success', 'rows' => $rows]);
// });
