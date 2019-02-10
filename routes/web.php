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
    Route::get('/surat-masuk/day', 'SuratMasukController@day')->name('suratmasuk.day');
    Route::get('/surat-masuk/month', 'SuratMasukController@month')->name('suratmasuk.month');
    Route::get('/surat-masuk/tambah-data', 'SuratMasukController@create')->name('suratmasuk.create');
    Route::post('/surat-masuk/tambah-data', 'SuratMasukController@store')->name('suratmasuk.store');
    Route::get('/surat-masuk/rincian/{suratmasuk}', 'SuratMasukController@details')->name('suratmasuk.detail');
    Route::get('/{suratmasuk}/lihat/download', 'SuratMasukController@response')->name('suratmasuk.response');
    Route::get('/surat-masuk/{suratmasuk}/ubah-data', 'SuratMasukController@edit')->name('suratmasuk.edit');
    Route::patch('/surat-masuk/{suratmasuk}/ubah-data', 'SuratMasukController@update')->name('suratmasuk.update');
    Route::delete('/surat-masuk/{suratmasuk}/hapus', 'SuratMasukController@destroy')->name('suratmasuk.destroy');
    Route::get('/surat-masuk-pdf', 'SuratMasukController@pdf')->name('suratmasuk.pdf');
    Route::get('/surat-masuk-pdf/bulanan', 'SuratMasukController@pdfmonth')->name('suratmasuk.pdfmonth');
    Route::get('/surat-masuk-pdf/harian', 'SuratMasukController@pdfday')->name('suratmasuk.pdfday');

    Route::get('/disposisi' , 'DisposisiController@index')->name('disposisi.index');
    Route::get('/disposisi/tambah-data' , 'DisposisiController@create')->name('disposisi.create');
    Route::post('/disposisi/tambah-data' , 'DisposisiController@store')->name('disposisi.store');
    Route::get('/disposisi/{disposisi}/ubah-data' , 'DisposisiController@edit')->name('disposisi.edit');
    Route::patch('/disposisi/{disposisi}/ubah-data' , 'DisposisiController@update')->name('disposisi.update');
    Route::delete('/disposisi/{disposisi}/hapus-data' , 'DisposisiController@destroy')->name('disposisi.destroy');

    Route::get('/data-instansi', 'InstansiController@index')->name('instansi.index');
    Route::get('/tambah-data/instansi', 'InstansiController@create')->name('instansi.create');
    Route::post('/tambah-data/instansi', 'InstansiController@store')->name('instansi.store');
    Route::get('/ubah-data/instansi/{instansi}', 'InstansiController@edit')->name('instansi.edit');
    Route::patch('/ubah-data/instansi/{instansi}', 'InstansiController@update')->name('instansi.update');
    Route::delete('/hapus-data/instansi/{instansi}', 'InstansiController@destroy')->name('instansi.destroy');
    Route::get('/instansi-pdf', 'InstansiController@pdf')->name('instansi.pdf');

    Route::get('/surat-keluar', 'SuratKeluarController@index')->name('suratkeluar.index');
    Route::get('/surat-keluar/day', 'SuratKeluarController@day')->name('suratkeluar.day');
    Route::get('/surat-keluar/month', 'SuratKeluarController@month')->name('suratkeluar.month');
    Route::get('/surat-keluar/tambah-data', 'SuratKeluarController@create')->name('suratkeluar.create');
    Route::post('/surat-keluar/tambah-data', 'SuratKeluarController@store')->name('suratkeluar.store');
    Route::get('/surat-keluar/rincian/{suratkeluar}', 'SuratKeluarController@details')->name('suratkeluar.detail');
    Route::get('/{suratkeluar}/lihat/download', 'SuratKeluarController@response')->name('suratkeluar.response');
    Route::get('/surat-keluar/{suratkeluar}/ubah-data', 'SuratKeluarController@edit')->name('suratkeluar.edit');
    Route::patch('/surat-keluar/{suratkeluar}/ubah-data', 'SuratKeluarController@update')->name('suratkeluar.update');
    Route::delete('/surat-keluar/{suratkeluar}/hapus', 'SuratKeluarController@destroy')->name('suratkeluar.destroy');
    Route::get('/surat-keluar-pdf', 'SuratKeluarController@pdf')->name('suratkeluar.pdf');
    Route::get('/surat-keluar-pdf/bulanan', 'SuratKeluarController@pdfmonth')->name('suratkeluar.pdfmonth');
    Route::get('/surat-keluar-pdf/harian', 'SuratKeluarController@pdfday')->name('suratkeluar.pdfday');   
});