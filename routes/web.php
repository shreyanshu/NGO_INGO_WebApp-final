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



Route::get('/projects', 'ProjectController@index');

Route::post('/projects/create', 'ProjectController@store');

Route::get('/projects/delete/{project}', 'ProjectController@destroy');

Route::get('/donors', 'DonorController@index');

Route::get('/donors/delete/{donor}', 'DonorController@destroy');

Route::post('/donor/update/{donor}', 'DonorController@update');

Route::post('/donor/create', 'DonorController@store');

Route::get('/NGO_INGO', 'OrganizationController@index');

Route::get('/NGO_INGO/destroy/{organization}', 'OrganizationController@destroy');

Route::post('/NGO_INGO/create', 'OrganizationController@store');


