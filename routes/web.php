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
    Route::get('/review', 'HomeController@showReviewForm');
    Route::get('/reviews', 'HomeController@showReview');
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


/********** ......Review Routes....... *****************/
Route::prefix('/reviews')->namespace('Dashboard')->group(function(){
    Route::get('/show', 'ReviewController@index');
    Route::post('/create', 'ReviewController@createReview');
    Route::get('/edit/{id}', 'ReviewController@showReviewEdit');
    Route::post('/edit', 'ReviewController@reviewUpdate');
    Route::get('/delete/{id}', 'ReviewController@reviewDelete');
    Route::get('/status/{id}/{status}', 'ReviewController@changeReviewStatus')->middleware('admin');

    Route::any('/import', 'ReviewController@importVendorData');
});


/********** ......User Routes....... *****************/
Route::prefix('/users')->namespace('Dashboard')->group(function(){

    Route::prefix('/')->middleware('admin')->group(function (){
        Route::get('/', 'UserController@index');
        Route::get('/edit/{id}', 'UserController@show');
        Route::put('/update', 'UserController@update');
        Route::get('/delete/{id}', 'UserController@destroy');
    });

    Route::get('/profile', 'UserController@showProfile');
    Route::post('/profile', 'UserController@updateProfile');
});


/********** ......Contact Routes....... *****************/
Route::prefix('/contacts')->namespace('Dashboard')->group(function(){
    Route::get('/', 'ContactController@index'); // show all
    Route::get('/create', 'ContactController@create'); // create form
    Route::post('/', 'ContactController@store'); // save
    Route::post('/replay', 'ContactController@replay'); // replay
    Route::get('/{id}', 'ContactController@show'); // show single
    Route::get('/{id}/edit', 'ContactController@edit'); // show edit
    Route::put('/{id}', 'ContactController@update'); // update
    Route::get('/{id}/delete', 'ContactController@destroy'); // delete

});