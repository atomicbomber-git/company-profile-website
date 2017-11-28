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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/", "MainController@welcome")->name("welcome");
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
        Route::get("/edit/{slide}", "SlideController@edit")->name("slide.edit");
        Route::patch("/edit/{slide}", "SlideController@update")->name("slide.update");
    });

    Route::prefix("/promotion")->group(function() {
        Route::get("/", "PromotionController@index")->name("promotion.index");
        Route::get("/edit/{promotional_text}", "PromotionController@edit")->name("promotion.edit");
        Route::patch("/edit/{promotional_text}", "PromotionController@update")->name("promotion.update");
    });

    Route::prefix("/about")->group(function() {
        Route::get("/edit", "AboutController@edit")->name("about.edit");
        Route::patch("/update_welcome/{welcome_text}", "AboutController@updateWelcome")->name("about.update_welcome");
    });
});

Route::get("/photo/{photo}", "PhotoController@show")->name("photo.show");
Route::get("/photo/thumbnail/{photo}", "PhotoController@thumbnail")->name("photo.thumbnail");
Route::get("/slide/{slide}", "SlideController@show")->name("slide.show");