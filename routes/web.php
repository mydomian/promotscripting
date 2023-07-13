<?php


use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function(){
     Route::get('/','home')->name('home');
});

//=========================Login/Register=========================
Route::controller(RegisterController::class)->group(function(){
    Route::match(['get', 'post'], '/login', 'login')->name('user.login');
    Route::match(['get', 'post'], '/register', 'register')->name('user.register');
});


//=========================Front End=========================
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//=========================Admin=========================
Route::prefix('/admin')->group(function (){
    Route::match(['get','post'], '/login', [AuthController::class, 'login'])->name('admin.login');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', function () { return view('admin.index'); })->name('admin.dashboard');
   
        Route::resources([
            '/categories' => CategoryController::class,
            '/subcategories' => SubCategoryController::class,
        ]);


        //status route
        Route::get('/category-status-active/{category}',[CategoryController::class,'categoryStatusActive'])->name('admin.categoryStatusActive');
        Route::get('/category-status-inactive/{category}',[CategoryController::class,'categoryStatusInactive'])->name('admin.categoryStatusInactive');
        
        //deleted route
        Route::get('/category-delete/{category}',[CategoryController::class,'destroy'])->name('admin.categoryDestroy');
        Route::get('/sub-category-delete/{subcategory}',[SubCategoryController::class,'destroy'])->name('admin.subCategoryDestroy');
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

