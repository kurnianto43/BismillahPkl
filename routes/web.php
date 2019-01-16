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
    return view('auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/beranda', 'HomeController@index')->name('beranda');
     Route::get('/setting', 'HomeController@setting')->name('home.set');

    Route::get('/profil', 'UserController@index')->name('profil.index');
    Route::get('/edit-profil', 'UserController@edit')->name('profil.edit');
    Route::get('/tambah-user', 'UserController@create')->name('user.create');

    Route::get('/data-surat-masuk', 'SuratMasukController@index')->name('suratmasuk.index');
    Route::get('/surat-masuk/tambah-data', 'SuratMasukController@create')->name('suratmasuk.create');
    Route::post('/surat-masuk/tambah-data', 'SuratMasukController@store')->name('suratmasuk.store');
    Route::get('/surat-masuk/rincian/{suratmasuk}', 'SuratMasukController@details')->name('suratmasuk.detail');
    Route::get('/{suratmasuk}/lihat/download', 'SuratMasukController@response')->name('suratmasuk.response');
    Route::get('/surat-masuk/{suratmasuk}/ubah-data', 'SuratMasukController@edit')->name('suratmasuk.edit');
    Route::patch('/surat-masuk/{suratmasuk}/ubah-data', 'SuratMasukController@update')->name('suratmasuk.update');
    Route::delete('/surat-masuk/{suratmasuk}/hapus', 'SuratMasukController@destroy')->name('suratmasuk.destroy');
    Route::get('/surat-masuk-pdf', 'SuratMasukController@pdf')->name('suratmasuk.pdf');

    Route::get('/data-surat-keluar', 'SuratKeluarController@index')->name('suratkeluar.index');
    Route::get('/surat-keluar/tambah-data', 'SuratKeluarController@create')->name('suratkeluar.create');
    Route::post('/surat-keluar/tambah-data', 'SuratKeluarController@store')->name('suratkeluar.store');
    Route::get('/surat-keluar-pdf', 'SuratKeluarController@pdf')->name('suratkeluar.pdf');
    Route::get('/surat-keluar/{suratkeluar}/ubah-data', 'SuratKeluarController@edit')->name('suratkeluar.edit');
    Route::patch('/surat-keluar/{suratkeluar}/ubah-data', 'SuratKeluarController@update')->name('suratkeluar.update');
    Route::delete('/surat-keluar/{suratkeluar}/hapus', 'SuratKeluarController@destroy')->name('suratkeluar.destroy');
    Route::get('/surat-keluar/rincian/{suratkeluar}', 'SuratKeluarController@details')->name('suratkeluar.detail');
    Route::get('/surat-keluar/{suratkeluar}/lihat/download', 'SuratKeluarController@response')->name('suratkeluar.response');
    Route::get('/surat-keluar-pdf', 'SuratKeluarController@pdf')->name('suratkeluar.pdf');
     
});