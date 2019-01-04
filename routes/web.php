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

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/beranda', 'HomeController@index')->name('beranda');
    Route::get('surat-masuk', 'SuratMasukController@index')->name('suratmasuk.index');
    Route::get('/editprofile', 'UserController@index')->name('editprofile');
    Route::post('/editprofile', 'UserController@update')->name('updateprofil');





    Route::get('surat-masuk/tambah', 'SuratMasukController@create')->name('suratmasuk.create');





    Route::get('surat-keluar', 'SuratKeluarController@index')->name('suratkeluar.index');
    Route::get('surat-keluar-tambah', 'SuratKeluarController@create')->name('suratkeluar.create');
    Route::get('surat-keluar-pdf', 'SuratKeluarController@pdf')->name('suratkeluar.pdf');
    Route::get('surat-keluar-pdf', 'SuratMasukController@pdf')->name('suratmasuk.pdf');
     Route::post('surat-masuk-tambah', 'SuratMasukController@store')->name('suratmasuk.store');
});