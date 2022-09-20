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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Route::get('/user', function () {
    return view('user.index');
})->name('user');

Route::get('/user/data', 'KaryawanController@index')->name('user.data');
Route::post('user/data/pasfoto/save', 'KaryawanController@pasFoto')->name('user.save.pasfoto');
Route::post('user/data/fotoserbadan/save', 'KaryawanController@fotoSerBadan')->name('user.save.fotoserbadan');
Route::post('user/data/fotoktp/save', 'KaryawanController@fotoKTP')->name('user.save.fotoktp');
Route::post('user/data/fotokk/save', 'KaryawanController@fotoKK')->name('user.save.fotokk');
Route::post('user/data/save', 'KaryawanController@store')->name('user.savedata');
Route::post('user/data/keluarga/save', 'KaryawanController@inputKeluargaLingkungan')->name('user.savedatakeluarga');
Route::post('user/data/anak/save', 'KaryawanController@anak')->name('user.savedataanak');
Route::post('user/data/suskel/save', 'KaryawanController@susunanKeluarga')->name('user.savedatasusunankel');
Route::post('user/data/pendfor/save', 'KaryawanController@pendidikanFormal')->name('user.savedatapendfor');
Route::post('user/data/nonformal/save', 'KaryawanController@pendidikanNonFormal')->name('user.savedatanonformal');
Route::post('user/data/organisasi/save', 'KaryawanController@pengalamanOrganisasi')->name('user.savedataorganisasi');
Route::post('user/data/bahasa/save', 'KaryawanController@bahasa')->name('user.savedatabahasa');
Route::post('user/data/kerja/save', 'KaryawanController@pengalamanKerja')->name('user.savedatakerja');
Route::post('user/data/minat/save', 'KaryawanController@minat')->name('user.savedataminat');
Route::post('user/data/sosial/save', 'KaryawanController@aktivitasSosial')->name('user.savedatasosial');
Route::post('user/data/lainnya/save', 'KaryawanController@lainnya')->name('user.savedatalainnya');
Route::post('user/data/darurat/save', 'KaryawanController@nomorDarurat')->name('user.savedatadarurat');
