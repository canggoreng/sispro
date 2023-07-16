<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@home')->name('home');

Route::get('/auth/google', 'App\Http\Controllers\GoogleController@google')->name('google.login');
Route::get('/auth/google/callback', 'App\Http\Controllers\GoogleController@callback')->name('google.callback');

Route::get('/auth/facebook', 'App\Http\Controllers\FacebookController@facebook')->name('facebook.login');
Route::get('/auth/facebook/callback', 'App\Http\Controllers\FacebookController@callback')->name('facebook.callback');

Route::get('/auth/github', 'App\Http\Controllers\GithubController@github')->name('github.login');
Route::get('/auth/github/callback', 'App\Http\Controllers\GithubController@callback')->name('github.callback');

Route::get('/schedule/notif_login', 'App\Http\Controllers\FrontPageController@notif_login')->name('notif_login');
// ==============================================================================
Route::get('/clear','App\Http\Controllers\DashboardController@success');
Route::get('/errors/notfound','App\Http\Controllers\DashboardController@notfound');
// --------------------------------------
Route::get('/log_in', 'App\Http\Controllers\AuthController@log_in')->name('log_in');
Route::get('/sign_up', 'App\Http\Controllers\AuthController@sign_up');
Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::get('/forgot', 'App\Http\Controllers\AuthController@forgot');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
// --------------------------------------

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
    
    Route::get('/users', 'App\Http\Controllers\UserController@users');
    Route::post('/users/create', 'App\Http\Controllers\UserController@create');
    Route::get('/users/edit/{id}', 'App\Http\Controllers\UserController@edit');
    Route::get('/users/{id}/delete', 'App\Http\Controllers\UserController@delete');    
    Route::get('/users/password/{id}', 'App\Http\Controllers\UserController@password');
    Route::post('/users/{id}/update', 'App\Http\Controllers\UserController@update');
    Route::post('/users/update_password/{id}', 'App\Http\Controllers\UserController@update_password');

    Route::get('/data_pasien', 'App\Http\Controllers\DataPasienController@data_pasien');
    Route::post('/data_pasien/create', 'App\Http\Controllers\DataPasienController@create');
    Route::get('/data_pasien/edit/{id}', 'App\Http\Controllers\DataPasienController@edit');
    Route::post('/data_pasien/update/{id}', 'App\Http\Controllers\DataPasienController@update');
    Route::get('/data_pasien/delete/{id}', 'App\Http\Controllers\DataPasienController@delete');
    Route::post('/data_pasien/update_konferensi/{id}', 'App\Http\Controllers\DataPasienController@update_konferensi');

    Route::get('/hasil_konferensi', 'App\Http\Controllers\HasilKonferensiController@hasil_konferensi');
    Route::post('/hasil_konferensi/create', 'App\Http\Controllers\HasilKonferensiController@create');
    Route::get('/hasil_konferensi/edit/{id}', 'App\Http\Controllers\HasilKonferensiController@edit');
    Route::post('/hasil_konferensi/update/{id}', 'App\Http\Controllers\HasilKonferensiController@update');
    Route::get('/hasil_konferensi/delete/{id}', 'App\Http\Controllers\HasilKonferensiController@delete');
    Route::post('/hasil_konferensi/update_konferensi/{id}', 'App\Http\Controllers\HasilKonferensiController@update_konferensi');

    Route::get('/keputusan_pasien', 'App\Http\Controllers\KeputusanPasienController@keputusan_pasien');
    Route::post('/keputusan_pasien/create', 'App\Http\Controllers\KeputusanPasienController@create');
    Route::post('/keputusan_pasien/search', 'App\Http\Controllers\KeputusanPasienController@search');
    Route::get('/keputusan_pasien/edit/{id}', 'App\Http\Controllers\KeputusanPasienController@edit');
    Route::post('/keputusan_pasien/update/{id}', 'App\Http\Controllers\KeputusanPasienController@update');
    Route::get('/keputusan_pasien/delete/{id}', 'App\Http\Controllers\KeputusanPasienController@delete');
    Route::post('/keputusan_pasien/update_status_pasien/{id}', 'App\Http\Controllers\KeputusanPasienController@update_status_pasien');

    Route::get('/persiapan_operasi', 'App\Http\Controllers\PersiapanOperasiController@persiapan_operasi');
    Route::post('/persiapan_operasi/create', 'App\Http\Controllers\PersiapanOperasiController@create');
    Route::get('/persiapan_operasi/edit/{id}', 'App\Http\Controllers\PersiapanOperasiController@edit');
    Route::post('/persiapan_operasi/update/{id}', 'App\Http\Controllers\PersiapanOperasiController@update');
    Route::get('/persiapan_operasi/delete/{id}', 'App\Http\Controllers\PersiapanOperasiController@delete');
    Route::post('/persiapan_operasi/update_konsul_pasien/{id}', 'App\Http\Controllers\PersiapanOperasiController@update_konsul_pasien');

    Route::get('/persiapan_operasi/aktif_akun/{id}', 'App\Http\Controllers\PersiapanOperasiController@aktif_akun');
    Route::get('/persiapan_operasi/tidak_aktif_akun/{id}', 'App\Http\Controllers\PersiapanOperasiController@tidak_aktif_akun');

    Route::get('/selesai_operasi', 'App\Http\Controllers\SelesaiOperasiController@selesai_operasi');
    Route::post('/selesai_operasi/search', 'App\Http\Controllers\SelesaiOperasiController@search');

    Route::get('/master_unit', 'App\Http\Controllers\MasterUnitController@master_unit');
    Route::post('/master_unit/create/', 'App\Http\Controllers\MasterUnitController@create');
    Route::get('/master_unit/edit/{id}', 'App\Http\Controllers\MasterUnitController@edit');
    Route::post('/master_unit/update/{id}', 'App\Http\Controllers\MasterUnitController@update');
    Route::get('/master_unit/delete/{id}', 'App\Http\Controllers\MasterUnitController@delete');    

    Route::get('/master_dokter', 'App\Http\Controllers\MasterDokterController@master_dokter');
    Route::post('/master_dokter/create/', 'App\Http\Controllers\MasterDokterController@create');
    Route::get('/master_dokter/edit/{id}', 'App\Http\Controllers\MasterDokterController@edit');
    Route::post('/master_dokter/update/{id}', 'App\Http\Controllers\MasterDokterController@update');
    Route::get('/master_dokter/delete/{id}', 'App\Http\Controllers\MasterDokterController@delete');        

    Route::get('/gallerys', 'App\Http\Controllers\GalleryController@gallerys');
    Route::post('/gallery/create', 'App\Http\Controllers\GalleryController@create');
    Route::get('/gallery/edit/{id}', 'App\Http\Controllers\GalleryController@edit');
    Route::post('/gallery/{id}/update', 'App\Http\Controllers\GalleryController@update');
    Route::get('/gallery/{id}/delete', 'App\Http\Controllers\GalleryController@delete');    

    Route::get('/album', 'App\Http\Controllers\AlbumController@album');
    Route::post('/album/create', 'App\Http\Controllers\AlbumController@create');
    Route::get('/album/edit/{id}', 'App\Http\Controllers\AlbumController@edit');
    Route::post('/album/{id}/update', 'App\Http\Controllers\AlbumController@update');
    Route::get('/album/{id}/delete', 'App\Http\Controllers\AlbumController@delete');        

});

Route::group(['middleware' => ['auth', 'CheckRole:pasien']], function () {
    Route::get('/schedule/detail/{id}', 'App\Http\Controllers\FrontPageController@detail')->name('detail');    
});


Route::group(['middleware' => ['auth', 'CheckRole:user,admin']], function () {

    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard');

    Route::get('/schedule/details/{id}', 'App\Http\Controllers\DashboardController@detail')->name('detail2');

    Route::get('/profile', 'App\Http\Controllers\ProfileController@profile');
    Route::post('/profile/update/{id}', 'App\Http\Controllers\ProfileController@update');
    Route::get('/account', 'App\Http\Controllers\ProfileController@account');
    Route::post('/account/update_foto/{id}', 'App\Http\Controllers\ProfileController@update_foto');
    Route::post('/account/update_account/{id}', 'App\Http\Controllers\ProfileController@update_account');

    Route::get('/log', 'App\Http\Controllers\LogController@log');
    Route::get('/error', 'App\Http\Controllers\DashboardController@error');

});

