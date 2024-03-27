<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\CandidateController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CompanyController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\SocialLinkController;
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

// Route::get('/', function () {
//     return view('welcome');
//     // return redirect(route('login'));
// })->name('welcome');

Route::get('/', [FrontendController::class, 'index'])->name('welcome');

// Route::post('/candidate/login', function () {
//     return view('welcome');
//     // return redirect(route('login'));
// })->name('welcome');
//Candidate
Route::get('/candidate/account', [FrontendController::class, 'candidateAccount'])->name('candidate.account');
Route::post('/candidate/register', [RegisteredUserController::class, 'store']);
Route::post('/candidate/login', [FrontendController::class, 'loginCandidate']);
Route::get('/login/{social}', [SocialController::class, 'socialLogin'])->where('social','google');
Route::get('/login/{social}/callback', [SocialController::class, 'handleProviderCallback'])->where('social','google');

   

//Company
Route::get('/employer/account', [FrontendController::class, 'employersAccount']);
Route::post('/employer/register', [RegisteredUserController::class, 'store']);
Route::post('/employer/login', [FrontendController::class, 'loginEmployer']);
//Route::post('/employers/forget-password', [PasswordResetLinkController::class, 'create']);



Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/about', [FrontendController::class, 'about'])->name('about');


// Route::get('/dashboard', function () {
//     return view('backend.home');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    


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
        Route::get('/dashboard', function () {
            return view('backend.home');
            // return redirect(route('login'));
        })->name('superadminDashboard');

        Route::get('category', [CategoryController::class, 'index']);
        Route::get("list-category",[CategoryController::class,'CategoryList']);
        Route::post('category', [CategoryController::class, 'store']);
        Route::post('category/edit', [CategoryController::class, 'edit']);
        Route::post('category/update', [CategoryController::class, 'update']);
        Route::post('category/delete', [CategoryController::class, 'destroy']);

        Route::get('candidate', [CandidateController::class, 'index']);
        Route::get("list-candidate",[CandidateController::class,'CandidateList']);

        Route::get('company', [CompanyController::class, 'index']);
        Route::get("list-company",[CompanyController::class,'CompanyList']);
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

        Route::get('/social-link/list', [SocialLinkController::class, 'index']);
        Route::get("list-social-link/",[SocialLinkController::class,'SocialLinkList']);
        Route::post('social-link/edit', [SocialLinkController::class, 'edit']);
        Route::post('social-link/update', [SocialLinkController::class, 'update']);

        Route::get('banner', [BannerController::class, 'index']);
        Route::get("list-banner",[BannerController::class,'BannerList']);
        Route::post('banner', [BannerController::class, 'store']);
        Route::post('banner/edit', [BannerController::class, 'edit']);
        Route::post('banner/update', [BannerController::class, 'update']);
        Route::post('banner/delete', [BannerController::class, 'destroy']);


        Route::get('post', [PostController::class, 'index']);
        Route::get("list-post",[PostController::class,'PostList']);

    });

//Route::get('/user/logout', [ProfileController::class, 'logout'])->name('logout');

});

require __DIR__.'/auth.php';
//Route::get('category/edit', [CategoryController::class, 'edit']);

// Route::post('category/edit', function (App\Models\Category $category) {
//     //$user_id=Auth::id();
//     $rows=App\Models\Category::where('id', 1)->first();
//     //$rows=Category::where('id',$category_id)->first();
//     return response()->json(['status' => 'success', 'rows' => $rows]);
// });
