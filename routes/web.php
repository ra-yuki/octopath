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

Route::get('/', 'OctopathsController@index')->name('octopaths.index');

Route::get('/dashboard', 'OctopathsController@show_dashboard')->name('octopaths.dashboard');

Route::get('/create', 'OctopathsController@create')->name('octopaths.create');

Route::get('/{octopath}/edit', 'OctopathsController@edit')->name('octopaths.edit');

Route::get('/{octopath}/result', 'OctopathsController@result')->name('octopaths.result');

Route::get('/{octopath}', 'OctopathsController@show')->name('octopaths.show');

Route::put('/{octopath}', 'OctopathsController@update')->name('octopaths.update');

Route::post('/store', 'OctopathsController@store')->name('octopaths.store');