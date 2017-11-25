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

Route::get("/", "HomeController@welcome")->name("welcome");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/gallery", "MainController@gallery")->name("gallery");

Route::get("/admin/login", "Auth\LoginController@showLoginForm")->name("login");
Route::post("/admin/login", "Auth\LoginController@login");
Route::post("/admin/logout", "Auth\LoginController@logout")->name("logout");

Route::prefix("/admin")->middleware("auth")->group(function() {
    Route::get("/", "AdminController@index")->name("admin");
    Route::prefix("/photo")->group(function() {
        Route::get("/create", "PhotoController@create")->name("photo.create");
        Route::post("/store", "PhotoController@store")->name("photo.store");
        Route::delete("/destroy/{photo}", "PhotoController@destroy")->name("photo.destroy");
        Route::get("/edit/{photo}", "PhotoController@edit")->name("photo.edit");
        Route::patch("/edit/{photo}", "PhotoController@update")->name("photo.update");
    });

    Route::prefix("/slide")->group(function() {
        Route::get("/create", "SlideController@create")->name("slide.create");
        Route::post("/store", "SlideController@store")->name("slide.store");
        Route::delete("/destroy/{slide}", "SlideController@destroy")->name("slide.destroy");
    });
});

Route::get("/photo/{photo}", "PhotoController@show")->name("photo.show");
Route::get("/slide/{slide}", "SlideController@show")->name("slide.show");