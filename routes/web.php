<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\RegisterController;
use App\Models\SubCategory;
use App\Http\Controllers\SellController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function(){
     Route::get('/','home')->name('home');
     Route::match(['get','post'],'/contact-us','contactus')->name('contactus');
     Route::get('/about-us','aboutUs')->name('aboutus');
     
});


// ======================Marketplace=============================
Route::controller(MarketplaceController::class)->group(function(){
    Route::match(['get','post'],'/marketplace','marketplace')->name('marketplace');
});

//============================Sell===========================
Route::post('sell/subcategory',[SellController::class,'subcategory'])->name('sell.subcategory');
Route::post('/sell/country',[SellController::class,'country'])->name('sell.country');
Route::resource('sell', SellController::class);



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





//=========================Admin=========================
Route::prefix('/admin')->group(function (){
    Route::match(['get','post'], '/login', [AuthController::class, 'login'])->name('admin.login');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', function () { return view('admin.index'); })->name('admin.dashboard');
   
        Route::resources([
            '/categories' => CategoryController::class,
            '/subcategories' => SubCategoryController::class,
            '/subsubcategories' => SubSubCategoryController::class,
            '/blogs' => BlogController::class,
     
        ]);


        
        //contact us
        Route::get('/contact-messages', [ContactusController::class, 'contactmessages'])->name('admin.contactmessages');
        Route::get('/contact-us-seen/{contact}',[ContactusController::class, 'contactUsSeen'])->name('admin.contactUsSeen');
        //about us
        Route::match(['get','post'],'/about-us',[AboutUsController::class,'aboutUs'])->name('admin.aboutUs');
        //status route
        Route::get('/category-status-active/{category}',[CategoryController::class,'categoryStatusActive'])->name('admin.categoryStatusActive');
        Route::get('/category-status-inactive/{category}',[CategoryController::class,'categoryStatusInactive'])->name('admin.categoryStatusInactive');
        //deleted route
        Route::get('/category-delete/{category}',[CategoryController::class,'destroy'])->name('admin.categoryDestroy');
        Route::get('/sub-category-delete/{subcategory}',[SubCategoryController::class,'destroy'])->name('admin.subCategoryDestroy');
        Route::get('/sub-sub-category-delete/{subsubcategory}',[SubSubCategoryController::class,'destroy'])->name('admin.subSubCategoryDestroy');

        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
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

