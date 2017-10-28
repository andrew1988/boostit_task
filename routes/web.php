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
Route::post('add-city',['as'=>'add-city','uses'=>'HomeController@addCity']);
Route::post('edit-city',['as'=>'edit-city','uses'=>'HomeController@editCity']);
Route::get('delete-city/{id}',['as'=>'delete-city','uses'=>'HomeController@deleteCity']);
//Route::post('/addCity', 'HomeController@addCity')->name('addCity');
