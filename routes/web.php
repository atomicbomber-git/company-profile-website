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

Route::view("/", "welcome");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("/admin")->group(function() {
    Route::get("/", "AdminController@index")->name("admin");

    Route::prefix("/photo")->group(function() {
        Route::get("/create", "PhotoController@create")->name("photo.create");
        Route::post("/store", "PhotoController@store")->name("photo.store");
        Route::get("/{photo}", "PhotoController@show")->name("photo.show");
    });

});
