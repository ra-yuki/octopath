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

/*
| To-Dos
| >> 1. create a proper shorten link
| 1.1 make sure the generated key is not used already just in case when OctopathsControlle->store()
| 2. create octopath_meta_datasets table having 'title', 'retention_period', and 'octopath'
|   more on how to connect table to model manually (https://laravel.com/docs/5.6/eloquent#defining-models)
| 3. dashboard (layout, edit function, (enabled/disabled function), and delete function)
| 3.1. custom link name
| 4. optimize table settings (string length...)
*/

Route::get('/', 'OctopathsController@index')->name('octopaths.index');

Route::get('/dashboard', 'OctopathsController@show_dashboard')->name('octopaths.dashboard');

Route::get('/create', 'OctopathsController@create')->name('octopaths.create');

Route::get('/{octopath}/edit', 'OctopathsController@edit')->name('octopaths.edit');

Route::get('/{octopath}', 'OctopathsController@show')->name('octopaths.show');

Route::post('/store', 'OctopathsController@store')->name('octopaths.store');