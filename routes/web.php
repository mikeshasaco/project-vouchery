<?php

route::get('/404', 'AskEmailController@pagenotfound')->name('notfound');

// Route::get('/advertisement/createAd', 'AdvertisementsController@createAd');
// Route::post('/advertisement/createAd', 'AdvertisementsController@store')->name('adsubmissions.store');

Route::get('/help/questions', 'AskEmailController@askemail')->name('help.quest');
Route::post('/help/questions', 'AskEmailController@store')->name('help.store');
Route::get('help/FAQ', 'AskEmailController@FAQ')->name('faqroute');
Route::get('/legal/privacypolicy', 'AskEmailController@privacypolicy')->name('privacy');
Route::get('/legal/termsofservice', 'AskEmailController@termofservice')->name('termsof');

//put that in the all middleware down below
// Route::get('/', 'PagesController@index')->name('homepage')->middleware('all');

Route::get('/', 'PagesController@index')->name('homepage');
Auth::routes();

Route::group(['middleware'=>'all'],function(){
    // Route::get('/home', 'HomeController@index')->name('home');
    Route::post('product', 'ProductsController@store')->name('product.store');
    Route::get('/businesses/all', 'ProductsController@allbusinesses')->name('AllBusinesses');
    Route::get('/businesses/{slug}', 'ProductsController@catbusiness')->name('catBusinesses');

    // search filter
    Route::get('/search', 'SearchController@search')->name('search');

    // vue filter
    Route::post('/get', 'PagesController@getData');
    Route::post('/filter', 'PagesController@filterData');

    // Subscribe
    Route::post('/account/{slug}/subscribe', 'AccountsController@subscribe')->name('account.subscribe');
    Route::get('/account/{slug}/cancel', 'AccountsController@subscribecancel')->name('subscription.cancel');
    Route::get('/account/{slug}/setsubscription', 'AccountsController@setsubscription')->name('setsubscription')->middleware('auth');
    Route::post('/account/{slug}/setsubscription/setting', 'AccountsController@subscriptionsetting')->name('subscription.setting')->middleware('auth');
    Route::get('/account/{slug}/subscription/earnings', 'AccountsController@subscriptionstatistic')->name('subscription.statistic')->middleware('auth');
    //subscription coupons
    Route::get('/{slug}/subscriptioncoupons', 'AccountsController@subscriptioncoupons')->name('subscription.coupons');

    // account page
    Route::get('/account/{slug}/setting/referral/{id}', 'AccountsController@adcart');
    Route::post('/edit/update', 'AccountsController@update')->name('update.edit');
    Route::post('/account/setting/updateaccount', 'AccountsController@update')->name('update.edit');
    Route::get('/account/{slug}', 'AccountsController@index')->name('myaccount');

    Route::get('/account/{slug}/follow', 'AccountsController@follow');
    Route::get('/account/{slug}/unfollow', 'AccountsController@unfollow');

    Route::post('/account/{slug}/{id}', 'AccountsController@store')->name('ad.store');
    Route::get('/account/{slug}/setting', 'AccountsController@adcart')->name('myads')->middleware('auth');
    Route::post('/account/{slug}/setting/changepassword', 'AccountsController@changepassword');

    // delete post
    Route::DELETE('/account/{slug}/{id}', 'AccountsController@destroy');

    Route::post('/product/{id}/click', 'ClicksController@postClicks');

    // welcome page
    Route::get('/welcome/voucheryhub', 'PagesController@loading')->middleware('auth');
});
//old admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {

    Route::get('/', 'AdminsController@index')->name('admin.dashboard');
    Route::get('/submission/create', 'SubmissionsController@create')->name('submission.create');
    Route::post('/submission/create', 'SubmissionsController@store')->name('submission.store');

    Route::get('/products/all', 'AdminsController@adminproducts')->name('adproduct');
    Route::DELETE('/products/all/{id}', 'AdminsController@productdestroy');

    Route::DELETE('/users/all/{id}', 'AdminsController@userdestroy');
    Route::get('/users/all', 'AdminsController@adminusers')->name('aduser');

    Route::get('/customers/all', 'AdminsController@admincustomers')->name('adcustomer');
    Route::DELETE('/customers/all/{id}', 'AdminsController@customerdestroy');

    Route::get('/instantad', 'AdminsController@Instantadcount')->name('adcount');
    Route::get('/category/create', 'CategoryController@create')->name('category.create')->middleware('auth');
    Route::post('/category/create', 'CategoryController@store')->middleware('auth');
    Route::get('subscribe/payout', 'AdminsController@subscriptionpayout')->name('subscription.payout');

});

Route::group(['prefix'=> 'customer'], function () {

// Login Routes...
    // Route::get('login', ['as' => 'customer.login', 'uses' => 'CustomerAuth\LoginController@showLoginForm']);
    Route::post('login', [ 'uses' => 'CustomerAuth\LoginController@customerLogin'])->name('customer.login');

    // Route::post('logout', ['as' => 'customer.logout', 'uses' => 'CustomerAuth\LoginController@logoutcustomer']);
    Route::post('logout', 'CustomerAuth\LoginController@logoutcustomer')->name('customer.logout');

    // Registration Routes...
    // Route::get('register', ['as' => 'customer.register', 'uses' => 'CustomerAuth\RegisterController@showRegistrationForm']);
    Route::post('register', 'CustomerAuth\RegisterController@register')->name('customer.register');

    // Password Reset Routes...
    // Route::get('password/reset', ['as' => 'customer.password.reset', 'uses' => 'CustomerAuth\ForgotPasswordController@showLinkRequestForm'])->name('customer.password.request');
    // Route::post('password/email', ['as' => 'customer.password.email', 'uses' => 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail'])->name('customer.password.email');
    // Route::get('password/reset/{token}', ['as' => 'customer.password.reset.token', 'uses' => 'CustomerAuth\ResetPasswordController@showResetForm'])->name('customer.password.reset');
    // Route::post('password/reset', [ 'uses' => 'CustomerAuth\ResetPasswordController@reset']);

    Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('customer.password.request');
    Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm')->name('customer.password.reset');

    // Customer profile update profile and update
    Route::group(['middleware'=> 'customer'], function(){
        Route::get('/{customerslug}', 'CustomerController@index')->name('customerprofile');
        Route::post('/{customerslug}/updatecustomer', 'CustomerController@update')->name('update.customer');

        Route::get('/{customerslug}/customerunfollow/{id}', 'CustomerController@customerunfollow');
    });
});

// verify merchant email verification
Route::get('/account/merchant/verify/{token}', 'Auth\RegisterController@verifyMerchant');

// verify customer email verification
Route::get('/account/customer/verify/{token}', 'CustomerAuth\RegisterController@verifyCustomer');

