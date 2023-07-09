<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['authcheck'])->group(function () {
	Route::get('/login-admin', 'LoginController@coba');
	Route::get('/login', 'LoginController@index');
	Route::post('/login/dologin', 'LoginController@doLogin');

	Route::get('/register', 'LoginController@register');
	Route::post('/login/doregister', 'LoginController@doRegister');
});
Route::get('logout', 'LoginController@logout');
Route::middleware(['authlogedin'])->group(function () {
	Route::get('/', 'HomeController@index');
	Route::get('/profile/{id}', 'HomeController@profile');
	Route::post('/update-profile/{id}', 'HomeController@update');

	// User
	Route::get('/user', 'UserController@index');
	Route::get('/tambah-user', 'UserController@create');
	Route::post('/do-add-user', 'UserController@store');
	Route::get('/edit-user/{id}', 'UserController@show');
	Route::post('/do-update-user/{id}', 'UserController@update');
	Route::get('/delete-user/{id}', 'UserController@destroy');

	// Penilaian
	Route::get('/penilaian', 'PenilaianController@index');
	Route::get('/tambah-penilaian', 'PenilaianController@create');
	Route::post('/do-add-penilaian', 'PenilaianController@store');
	Route::get('/edit-penilaian/{id}', 'PenilaianController@show');
	Route::post('/do-update-penilaian/{id}', 'PenilaianController@update');
	Route::get('/delete-penilaian/{id}', 'PenilaianController@destroy');
	Route::get('/dokumen/{id}/{id_penilaian}', 'PenilaianController@dokumen');
	Route::post('/upload-dokumen', 'PenilaianController@uploadDokumen');

	// NIlai Rendah
	Route::get('/nilai-rendah', 'NilaiRendahController@index');
	Route::get('/tambah-nilai-rendah', 'NilaiRendahController@create');
	Route::post('/do-add-nilai-rendah', 'NilaiRendahController@store');
	Route::get('/edit-nilai-rendah/{id}', 'NilaiRendahController@show');
	Route::post('/do-update-nilai-rendah/{id}', 'NilaiRendahController@update');
	Route::get('/delete-nilai-rendah/{id}', 'NilaiRendahController@destroy');
	Route::get('/penilaian-nilai-rendah/{id}', 'NilaiRendahController@nilai_rendah');
	Route::get('/asign-to/{id}', 'NilaiRendahController@asignTo');


	// Penugasan
	Route::get('/penugasan', 'PenugasanController@index');
	Route::get('/edit-penugasan/{id}', 'PenugasanController@show');
	Route::post('/do-update-penugasan', 'PenugasanController@update');

	// Akreditasi
	Route::get('/akreditasi', 'AkreditasiController@index');
	Route::get('/tambah-akreditasi', 'AkreditasiController@create');
	Route::post('/do-add-akreditasi', 'AkreditasiController@store');
	Route::get('/edit-akreditasi/{id}', 'AkreditasiController@show');
	Route::post('/do-update-akreditasi/{id}', 'AkreditasiController@update');
	Route::get('/delete-akreditasi/{id}', 'AkreditasiController@destroy');
	Route::post('/simpan-nilai-akreditasi', 'AkreditasiController@simpan_nilai_akreditasi');
	Route::get('/hasil-penilaian-akreditasi/{id}', 'AkreditasiController@hasil');

	Route::get('/penilaian-akreditasi/{id}/{id_lembaga}', 'AkreditasiController@penilaian_akreditas');
	Route::get('/detail-penilaian/', 'AkreditasiController@detail_penilaian_akreditas');

	Route::get('/add-indikator-penilaian/{id}', 'ElemenController@index');
	Route::post('/do-add-elemen', 'ElemenController@store');
	Route::post('/do-update-elemen/{id}', 'ElemenController@update');
	Route::get('/delete-elemen-indikator/{id}/{id_lembaga}', 'ElemenController@hapus');
	Route::get('/do-add-indikator/{id}', 'ElemenController@indikator');
	Route::get('/detail-elemen', 'ElemenController@detail_elemen');
	Route::post('/do-add-indikator-penilaian', 'ElemenController@storeIndikatorPenilaian');
	Route::post('/do-update-indikator-penilaian/{id}', 'ElemenController@UpdateIndikatorPenilaian');
	Route::get('/delete-indikator-penilaian/{id}/{id_elemen}', 'ElemenController@destroy');


	Route::get('/penilaian-indikator-add/{id}', 'ElemenController@penilaianindikator');
	Route::get('/penilaian-detail-elemen', 'ElemenController@penilaiandetail_elemen');
	Route::post('/penilaian-do-add-indikator-penilaian', 'ElemenController@penilaianstoreIndikatorPenilaian');
	Route::post('/penilaian-do-update-indikator-penilaian/{id}', 'ElemenController@penilaianUpdateIndikatorPenilaian');
	Route::get('/penilaian-delete-indikator-penilaian/{id}/{id_indikator}', 'ElemenController@penilaiandestroy');


	// Informasi
	Route::get('/informasi', 'HomeController@informasi');

	// Laporan
	Route::get('/laporan', 'LaporanController@index');
	Route::get('/tambah-laporan/{id}', 'LaporanController@create');
	Route::post('/do-add-laporan', 'LaporanController@store');
	Route::get('/delete-laporan-penilaian/{id}', 'LaporanController@delete');
});
