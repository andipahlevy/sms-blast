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
    // return view('login');
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'data'], function () {
				
	Route::get('/kelompok', ['as'=>'data.kelompok', 'uses'=>'HomeController@view_kelompok']);
	Route::get('/kelompok/add', ['as'=>'data.kelompok.add', 'uses'=>'HomeController@form_kelompok']);
	Route::post('/kelompok/save', ['as'=>'data.kelompok.save', 'uses'=>'HomeController@save_kelompok']);
	Route::get('/kelompok/delete', ['as'=>'data.kelompok.delete', 'uses'=>'HomeController@delete_kelompok']);
	Route::get('/kelompok/edit/{id}', ['as'=>'data.kelompok.edit', 'uses'=>'HomeController@edit_kelompok']);
	Route::post('/kelompok/update', ['as'=>'data.kelompok.update', 'uses'=>'HomeController@update_kelompok']);
	
	//nomor
	Route::get('/{id}/nomor', ['as'=>'data.nomor', 'uses'=>'HomeController@view_nomor']);
	Route::get('/{id}/nomor/add', ['as'=>'data.nomor.add', 'uses'=>'HomeController@form_nomor']);
	Route::post('/{id}/nomor/save', ['as'=>'data.nomor.save', 'uses'=>'HomeController@save_nomor']);
	Route::get('/{id_kelompok}/nomor/delete/{id}', ['as'=>'data.nomor.delete', 'uses'=>'HomeController@delete_nomor']);
	Route::get('/nomor/edit/{id}', ['as'=>'data.nomor.edit', 'uses'=>'HomeController@edit_nomor']);
	Route::post('/nomor/update', ['as'=>'data.nomor.update', 'uses'=>'HomeController@update_nomor']);
	
});
Route::group(['prefix'=>'sms'], function () {
				
	Route::get('/', ['as'=>'sms', 'uses'=>'SMSController@list']);
	
});

