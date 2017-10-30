<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/********** ......Public Routes....... *****************/
Route::prefix('/')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::get('/gestionali-erp', 'HomeController@showGestionaliErp');
    Route::get('/business-intelligence', 'HomeController@showBusinessIntelligence');
    Route::get('/crm', 'HomeController@showCRM');
//    Route::get('/voting', 'HomeController@showVoting');
    Route::get('/chi-siamo', 'HomeController@showChiSiamo');
});


/********** ......Auth Routes....... *****************/
Route::prefix('/')->namespace('Auth')->group(function(){
    //Signup Routes...
    Route::get('signup', 'RegisterController@showRegistrationForm');
    Route::post('signup', 'RegisterController@register');

    //Login Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');

    //Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token?}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Verify User Email
    Route::get('verify-email', 'LoginController@sendVerifyEmail');
    Route::get('verify-email/{token}', 'LoginController@verifyEmail');
});


/********** ......Dashboard Routes....... *****************/
Route::prefix('/')->namespace('Dashboard')->group(function(){
    Route::get('/voting', 'ReviewController@showVoting');
    Route::post('/voting', 'ReviewController@voting');

    Route::prefix('reviews')->group(function (){
        Route::get('/', 'ReviewController@index');
        Route::get('/edit/{id}', 'ReviewController@showReviewEdit');
        Route::post('/edit', 'ReviewController@reviewUpdate');
        Route::get('/delete/{id}', 'ReviewController@reviewDelete');
    });

    Route::any('/import', 'ReviewController@importVendorData');
});