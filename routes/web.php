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

// Auth Routes
Route::get('login', 'Auth\LoginController@index');
Route::post('login', 'Auth\LoginController@attempt');
Route::get('register', 'Auth\RegisterController@index');
Route::post('register', 'Auth\RegisterController@store');


// Notes Routes
Route::get('notes', 'Notes\NotesController@index');
Route::resource('notes', 'Notes\NotesController')->except('edit');
