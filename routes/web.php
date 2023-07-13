<?php


use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SellController;
use Illuminate\Support\Facades\Artisan;
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
//     return view('user.website.index');
// });

Route::controller(HomeController::class)->group(function(){
     Route::get('/','home')->name('home');
});


// ======================Marketplace=============================
Route::controller(MarketplaceController::class)->group(function(){
    Route::match(['get','post'],'/marketplace','marketplace')->name('marketplace');
});

//=========================Login/Register=========================
Route::controller(RegisterController::class)->group(function(){
    Route::match(['get', 'post'], '/login', 'login')->name('user.login');
    Route::match(['get', 'post'], '/register', 'register')->name('user.register');
});


//=======================Dashboard===========================
Route::middleware(['user'])->group(function () {
   Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('user.dashboard');
        Route::get('/logout','logout')->name('user.logout');
   });
});


//============================Sell===========================
Route::resource('sell', SellController::class);



Route::prefix('/admin')->namespace('Admin')->group(function (){
    Route::match(['get','post'], '/login', [AuthController::class, 'login'])->name('admin.login');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
});

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('storage:link');
    return "Cleared!";
});

