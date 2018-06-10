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

//user registration
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//login/out
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.get');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//octopath main
Route::get('/', 'OctopathsController@index')->name('octopaths.index');

Route::get('/dashboard', 'OctopathsController@show_dashboard')->name('octopaths.dashboard');

Route::get('/create', 'OctopathsController@create')->name('octopaths.create');

Route::get('/{octopath}/edit', 'OctopathsController@edit')->name('octopaths.edit');

Route::get('/{octopath}/result', 'OctopathsController@result')->name('octopaths.result');

Route::get('/{octopath}', 'OctopathsController@show')->name('octopaths.show');

Route::put('/{octopath}', 'OctopathsController@update')->name('octopaths.update');

Route::post('/store', 'OctopathsController@store')->name('octopaths.store');