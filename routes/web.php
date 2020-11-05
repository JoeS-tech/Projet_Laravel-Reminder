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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/form', 'Form\FormController@form')->Middleware('auth')->name('form');
// Route::post('/form', 'Form\FormController@store')->name('form.store');

Route::get('/profile', 'User\ProfileController@profile')->name('user.profile');
Route::post('/profile', 'User\ProfileController@sendProfile')->name('user.sendProfile');
Route::get('/postit', 'User\PostitController@postit')->name('user.postit');
Route::get('/dashboard/{id?}', 'User\DashboardController@dashboard')->name('user.dashboard');
