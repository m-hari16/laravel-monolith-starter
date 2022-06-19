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

// Welcome Page
Route::get('/', function () {
    return view('pages/welcome');
});

Route::group(['middleware'=>'auth'], function(){
    // Auth Routes
    Route::post('logout', 'Auth\LogoutController@logout');
    
    // Notes Routes
    Route::get('notes', 'Notes\NotesController@index');
    Route::post('notes', 'Notes\NotesController@store');
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('login', 'Auth\LoginController@index')->name('login');
    Route::post('login', 'Auth\LoginController@attempt');
    Route::get('register', 'Auth\RegisterController@index');
    Route::post('register', 'Auth\RegisterController@store');
});
