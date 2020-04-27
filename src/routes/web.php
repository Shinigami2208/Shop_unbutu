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
Route::get('/', function(){
    return view('welcome');
});

// Login with google
Route::get('/login-google', function(){
    return Socialite::with('Google')->redirect();
})->name('loginGoogle');
Route::get('/google-callback', 'Auth\SocialAuthController@loginGoogleCallback')->name('googleCallback');

// Login with facebook
Route::get('/login-facebook', function(){
    return Socialite::with('Facebook')->redirect();
})->name('loginFacebook');
Route::get('/facebook-callback', 'Auth\SocialAuthController@loginFacebookCallback')->name('facebookCallback');

// Login with Github
Route::get('login-github', function(){
    return Socialite::with('github')->redirect();
})->name('loginGithub');
Route::get('/github-callback', 'Auth\SocialAuthController@loginGithubCallback')->name('githubCallback');

// Admin route
Route::get('/admin', 'AdminController@home')->middleware('role:admin')->name('adminHome');

// Admin category routes
Route::resource('/admin/category', 'Admin\CategoryAdminController', ['names' => 'adminCategory'])->middleware('role:admin');

// Admin product routes
Route::resource('/admin/product', 'Admin\ProductAdminController', ['names' => 'adminProduct'])->middleware('role:admin');

// User Routes
Route::get('/profile', 'UserController@profile')->middleware('role:user')->name('profile');

Auth::routes();

Route::get('/{url}', function () {
    return view('welcome');
})->where('url', '[A-Za-z0-9\-]+');


