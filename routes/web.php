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
    Route::get('/disposisi-pdf', 'DisposisiController@pdf')->name('disposisi.pdf');

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
//start
    Route::get('/surat-keluar/januari', 'SuratKeluarController@januari')->name('suratkeluar.jan');
    Route::get('/surat-keluar-pdf/januari', 'SuratKeluarController@pdfjanuari')->name('suratkeluar.pdfjan');
//end
    Route::get('/surat-keluar/februari', 'SuratKeluarController@februari')->name('suratkeluar.feb');
    Route::get('/surat-keluar-pdf/februari', 'SuratKeluarController@pdffebruari')->name('suratkeluar.pdffeb');

    Route::get('/surat-keluar/maret', 'SuratKeluarController@maret')->name('suratkeluar.mar');
    Route::get('/surat-keluar-pdf/maret', 'SuratKeluarController@pdfmaret')->name('suratkeluar.pdfmar');

    Route::get('/surat-keluar/april', 'SuratKeluarController@april')->name('suratkeluar.apr');
    Route::get('/surat-keluar-pdf/april', 'SuratKeluarController@pdfapril')->name('suratkeluar.pdfapr');

    Route::get('/surat-keluar/mei', 'SuratKeluarController@mei')->name('suratkeluar.mei');
    Route::get('/surat-keluar-pdf/mei', 'SuratKeluarController@pdfmei')->name('suratkeluar.pdfmei');

    Route::get('/surat-keluar/juni', 'SuratKeluarController@juni')->name('suratkeluar.jun');
    Route::get('/surat-keluar-pdf/juni', 'SuratKeluarController@pdfjuni')->name('suratkeluar.pdfjun');

    Route::get('/surat-keluar/juli', 'SuratKeluarController@juli')->name('suratkeluar.jul');
    Route::get('/surat-keluar-pdf/juli', 'SuratKeluarController@pdfjul')->name('suratkeluar.pdfjul');

    Route::get('/surat-keluar/agustus', 'SuratKeluarController@agustus')->name('suratkeluar.ags');
    Route::get('/surat-keluar-pdf/agustus', 'SuratKeluarController@pdfags')->name('suratkeluar.pdfags');

    Route::get('/surat-keluar/september', 'SuratKeluarController@september')->name('suratkeluar.sep');
    Route::get('/surat-keluar-pdf/september', 'SuratKeluarController@pdfsep')->name('suratkeluar.pdfsep');

    Route::get('/surat-keluar/oktober', 'SuratKeluarController@oktober')->name('suratkeluar.okt');
    Route::get('/surat-keluar-pdf/oktober', 'SuratKeluarController@pdfokt')->name('suratkeluar.pdfokt');

    Route::get('/surat-keluar/november', 'SuratKeluarController@november')->name('suratkeluar.nov');
    Route::get('/surat-keluar-pdf/november', 'SuratKeluarController@pdfnov')->name('suratkeluar.pdfnov');

    Route::get('/surat-keluar/desember', 'SuratKeluarController@desember')->name('suratkeluar.des');
    Route::get('/surat-keluar-pdf/desember', 'SuratKeluarController@pdfdes')->name('suratkeluar.pdfdes');

    Route::get('/surat-keluar-pdf/harian', 'SuratKeluarController@pdfday')->name('suratkeluar.pdfday');




    //start
    Route::get('/surat-masuk/januari', 'SuratMasukController@januari')->name('suratmasuk.jan');
    Route::get('/surat-masuk-pdf/januari', 'SuratMasukController@pdfjanuari')->name('suratmasuk.pdfjan');
//end
    Route::get('/surat-masuk/februari', 'SuratMasukController@februari')->name('suratmasuk.feb');
    Route::get('/surat-masuk-pdf/februari', 'SuratMasukController@pdffebruari')->name('suratmasuk.pdffeb');

    Route::get('/surat-masuk/maret', 'SuratMasukController@maret')->name('suratmasuk.mar');
    Route::get('/surat-masuk-pdf/maret', 'SuratMasukController@pdfmaret')->name('suratmasuk.pdfmar');

    Route::get('/surat-masuk/april', 'SuratMasukController@april')->name('suratmasuk.apr');
    Route::get('/surat-masuk-pdf/april', 'SuratMasukController@pdfapril')->name('suratmasuk.pdfapr');

    Route::get('/surat-masuk/mei', 'SuratMasukController@mei')->name('suratmasuk.mei');
    Route::get('/surat-masuk-pdf/mei', 'SuratMasukController@pdfmei')->name('suratmasuk.pdfmei');

    Route::get('/surat-masuk/juni', 'SuratMasukController@juni')->name('suratmasuk.jun');
    Route::get('/surat-masuk-pdf/juni', 'SuratMasukController@pdfjuni')->name('suratmasuk.pdfjun');

    Route::get('/surat-masuk/juli', 'SuratMasukController@juli')->name('suratmasuk.jul');
    Route::get('/surat-masuk-pdf/juli', 'SuratMasukController@pdfjul')->name('suratmasuk.pdfjul');

    Route::get('/surat-masuk/agustus', 'SuratMasukController@agustus')->name('suratmasuk.ags');
    Route::get('/surat-masuk-pdf/agustus', 'SuratMasukController@pdfags')->name('suratmasuk.pdfags');

    Route::get('/surat-masuk/september', 'SuratMasukController@september')->name('suratmasuk.sep');
    Route::get('/surat-masuk-pdf/september', 'SuratMasukController@pdfsep')->name('suratmasuk.pdfsep');

    Route::get('/surat-masuk/oktober', 'SuratMasukController@oktober')->name('suratmasuk.okt');
    Route::get('/surat-masuk-pdf/oktober', 'SuratMasukController@pdfokt')->name('suratmasuk.pdfokt');

    Route::get('/surat-masuk/november', 'SuratMasukController@november')->name('suratmasuk.nov');
    Route::get('/surat-masuk-pdf/november', 'SuratMasukController@pdfnov')->name('suratmasuk.pdfnov');

    Route::get('/surat-masuk/desember', 'SuratMasukController@desember')->name('suratmasuk.des');
    Route::get('/surat-masuk-pdf/desember', 'SuratMasukController@pdfdes')->name('suratmasuk.pdfdes');   
});