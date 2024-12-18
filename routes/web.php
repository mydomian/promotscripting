<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Admin\PromptController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StripeController as AdminStripeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\NotificationSettingController;
use App\Http\Controllers\RegisterController;
use App\Models\SubCategory;
use App\Http\Controllers\SellController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function(){
     Route::get('/','home')->name('home');
     Route::match(['get','post'],'/contact-us','contactus')->name('contactus');
     Route::get('/about-us','aboutUs')->name('aboutus');
     Route::get('/blogs','blog')->name('blogs');
     Route::get('/blog-load/{blog}','blogSeeMoreLoad')->name('blogSeeMoreLoad');

     Route::get('hire','hire')->name('hire');
     Route::get('/public-profile/{user}','publicProfile')->name('public.profile');
     Route::get('/prompt-favourite/{product}/{type?}','userFavourite')->name('userFavourite');
     Route::get('/user-favourite/{person}','personFavourite')->name('person.favourite');

     Route::get('/terms-of-service', 'terms')->name('terms');
     Route::match(['get','post'],'/search', 'search')->name('search');
     
});

Route::controller(DashboardController::class)->group(function(){
    //cart
    Route::get('/add-cart','cart')->name('add.cart');
    Route::get('/cart','cartList')->name('cart.list');
    Route::get('/cart-delete/{cart}','cartdelete')->name('cart.delete');
});
//======================EmailVerification========================
Route::get('/email/verify', function () { return view('auth.verify-email');})->middleware('auth')->name('verification.notice');

// ======================Marketplace=============================
Route::controller(MarketplaceController::class)->group(function(){
    Route::match(['get','post'],'/marketplace','marketplace')->name('marketplace');
    Route::get('/marketplace/{slug}/{product}','marketplaceDetails')->name('marketplaceDetails');
    Route::get('/marketplace-filter/{name}','filter')->name('tag.filter');
   
});

//============================Sell===========================
Route::post('sell/subcategory',[SellController::class,'subcategory'])->name('sell.subcategory');
Route::get('/sell/country',[SellController::class,'country'])->name('sell.country');
Route::resource('sell', SellController::class);

//=========================Login/Register=========================
Route::controller(RegisterController::class)->group(function(){
    Route::match(['get', 'post'], '/login', 'login')->name('user.login');
    Route::match(['get', 'post'], '/register', 'register')->name('user.register');
    Route::match(['get', 'post'], '/forget-password', 'forgetPassword')->name('user.forgetPassword');
});

//=====================LoginWithGoogle=======================
Route::get('authorized/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {});

//=======================Dashboard===========================
Route::middleware(['user','verified'])->group(function () {
   Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('user.dashboard');
        Route::match(['get','post'],'/profile/{user}','profile')->name('user.profile');
        Route::get('/delete', 'accountDelete')->name('account.delete');
        Route::get('/settings','settings')->name('user.settings');
        Route::get('/prompt/{id}','getPrompt')->name('get.prompt');
        Route::match(['get','post'],'/prompts','prompts')->name('user.prompts');
        Route::get('/sales','sales')->name('user.sales');
        Route::get('/purchases','purchases')->name('user.purchases');
        Route::match(['get','post'],'/prompts-edit/{product}','promptsEdit')->name('user.promptsEdit');
        //hire developer
        Route::match(['get','post'],'/hire-developer','hireDeveloper')->name('user.hireDeveloper');
        Route::match(['get','post'],'/hire-developer-store','hireDeveloperStore')->name('user.hireDeveloperStore');
        Route::match(['get','post'],'/hire-developer-lists','hireDeveloperLists')->name('user.hireDeveloperLists');
        //favourite
        Route::match(['get','post'],'/favourites','favourites')->name('user.favourites');
        //custom order
        Route::match(['get','post'],'/custom-orders','customOrderLists')->name('user.customOrderLists');
        Route::match(['get','post'],'/prompt-custom-order','promptCustomOrder')->name('user.promptCustomOrder');
        Route::get('/custom-order/success','CustomOrderSuccess');
        Route::get('/message-copytoclickboard/{id}','copyToClickBoard')->name('user.copyToClickBoard');
        //rating
        Route::match(['get','post'],'/user-rating','userRating')->name('user.rating');
        //data downloads
        Route::get('file-dawonloads/{product}','fileDawonload')->name('user.fileDawonload');

        // deleted route
        Route::get('prompt-delete/{product}','promptDelete')->name('user.promptDelete');
       
       //skills
       Route::post('/skill-add','skill')->name('skills');
       Route::get('/remove-skill','removeSkill')->name('remove.skill');

       
        Route::get('/logout','logout')->name('user.logout');
   });

   Route::controller(NotificationSettingController::class)->group(function(){
        Route::post('/change-satting','change')->name('change.setting');
   });

   Route::controller(StripeController::class)->group(function(){
       
        Route::post('/connect-acc','createAcc')->name('create.acc'); 
        Route::get('/prompt/{id}','getPrompt')->name('get.prompt');
        Route::get('/success','success')->name('success');
        Route::get('/cart-checkout-success','cartSuccess')->name('cart.checkout');
        Route::get('/onboarding-completed/{id}','completed')->name('onboarding.completed');
        Route::get('/delete-stripe','destroy')->name('account.stripe.delete');
        Route::get('/payout','payout')->name('user.payout');

        //cart checkout
        Route::get('/chckout','cartCheckout')->name('cart.checkout');
   });
});

//=========================Admin=========================
Route::prefix('/admin')->group(function (){
    Route::match(['get','post'], '/login', [AuthController::class, 'login'])->name('admin.login');
    Route::match(['get','post'], '/forget-password', [AuthController::class, 'forgetPassword'])->name('admin.forgetPassword');
        Route::group(['middleware'=>['admin','verified']], function () {
        Route::get('/dashboard', function () { return view('admin.index'); })->name('admin.dashboard');
   
        Route::resources([
            '/categories' => CategoryController::class,
            '/subcategories' => SubCategoryController::class,
            '/blogs' => BlogController::class,
        ]);

        //prompts
        Route::match(['get','post'],'/prompts',[PromptController::class,'prompts'])->name('admin.prompts');
        Route::match(['get','post'],'/prompt-status/{product}/{type?}',[PromptController::class,'promptStatusChecked'])->name('admin.promptStatusChecked');

        //orders
        Route::match(['get','post'],'/orders',[PromptController::class,'orders'])->name('admin.orders');
        Route::match(['get','post'],'/order-status/{order}/{type?}',[PromptController::class,'promptStatusUpdate'])->name('admin.promptStatusUpdate');
        //profile
        Route::match(['get','post'],'/profile/{user}',[AuthController::class,'profile'])->name('admin.adminProfile');
        //charge
        Route::post('/charge',[ChargeController::class,'charge'])->name('apply.charge');
        //Stripe
        Route::get('/payment/info',[AdminStripeController::class,'info'])->name('admin.payment');
        Route::post('/payment/info/update',[AdminStripeController::class,'update'])->name('admin.paymentInfoUpdate');
        //contact us
        Route::get('/contact-messages', [ContactusController::class, 'contactmessages'])->name('admin.contactmessages');
        Route::get('/contact-us-seen/{contact}',[ContactusController::class, 'contactUsSeen'])->name('admin.contactUsSeen');
        //about us
        Route::match(['get','post'],'/about-us',[AboutUsController::class,'aboutUs'])->name('admin.aboutUs');
        //settings
        Route::match(['get','post'],'/settings',[SettingController::class,'setting'])->name('admin.setting');
        //status route
        Route::get('/category-status-active/{category}',[CategoryController::class,'categoryStatusActive'])->name('admin.categoryStatusActive');
        Route::get('/category-status-inactive/{category}',[CategoryController::class,'categoryStatusInactive'])->name('admin.categoryStatusInactive');
        Route::get('/blog-status/{blog}',[BlogController::class,'blogStatus'])->name('admin.blogStatus');
        //transactions
        Route::get('/checkouts',[AdminStripeController::class,'checkouts'])->name('admin.checkouts');
        Route::get('/charges',[AdminStripeController::class,'charges'])->name('admin.charges');
        
        //deleted route
        Route::get('/category-delete/{category}',[CategoryController::class,'destroy'])->name('admin.categoryDestroy');
        Route::get('/sub-category-delete/{subcategory}',[SubCategoryController::class,'destroy'])->name('admin.subCategoryDestroy');
       
        Route::get('/blog-delete/{blog}',[BlogController::class,'destroy'])->name('admin.blogDestroy');
        

        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});

Route::get('/clear', function () {
    Artisan::call('cache:clear'); Artisan::call('config:clear'); Artisan::call('config:cache'); Artisan::call('view:clear'); Artisan::call('route:clear'); Artisan::call('optimize:clear'); Artisan::call('storage:link');
    return "Cleared!";
});

