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

Route::get('/', 'HomeController@login')->name('awal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', function () {
    return view('user.index');
})->name('user');

Route::middleware('role:user')->get('/user/data', 'KaryawanController@index')->name('user.data');
Route::middleware('role:user')->post('user/data/pasfoto/save', 'KaryawanController@pasFoto')->name('user.save.pasfoto');
Route::middleware('role:user')->post('user/data/fotoserbadan/save', 'KaryawanController@fotoSerBadan')->name('user.save.fotoserbadan');
Route::middleware('role:user')->post('user/data/fotoktp/save', 'KaryawanController@fotoKTP')->name('user.save.fotoktp');
Route::middleware('role:user')->post('user/data/fotokk/save', 'KaryawanController@fotoKK')->name('user.save.fotokk');
Route::middleware('role:user')->post('user/data/save', 'KaryawanController@store')->name('user.savedata');
Route::middleware('role:user')->post('user/data/keluarga/save', 'KaryawanController@inputKeluargaLingkungan')->name('user.savedatakeluarga');
Route::middleware('role:user')->post('user/data/anak/save', 'KaryawanController@anak')->name('user.savedataanak');
Route::middleware('role:user')->post('user/data/suskel/save', 'KaryawanController@susunanKeluarga')->name('user.savedatasusunankel');
Route::middleware('role:user')->post('user/data/pendfor/save', 'KaryawanController@pendidikanFormal')->name('user.savedatapendfor');
Route::middleware('role:user')->post('user/data/nonformal/save', 'KaryawanController@pendidikanNonFormal')->name('user.savedatanonformal');
Route::middleware('role:user')->post('user/data/organisasi/save', 'KaryawanController@pengalamanOrganisasi')->name('user.savedataorganisasi');
Route::middleware('role:user')->post('user/data/bahasa/save', 'KaryawanController@bahasa')->name('user.savedatabahasa');
Route::middleware('role:user')->post('user/data/kerja/save', 'KaryawanController@pengalamanKerja')->name('user.savedatakerja');
Route::middleware('role:user')->post('user/data/minat/save', 'KaryawanController@minat')->name('user.savedataminat');
Route::middleware('role:user')->post('user/data/sosial/save', 'KaryawanController@aktivitasSosial')->name('user.savedatasosial');
Route::middleware('role:user')->post('user/data/lainnya/save', 'KaryawanController@lainnya')->name('user.savedatalainnya');
Route::middleware('role:user')->post('user/data/darurat/save', 'KaryawanController@nomorDarurat')->name('user.savedatadarurat');

Route::middleware('role:admin')->get('admin/', 'AdminController@index')->name('admin');
Route::middleware('role:admin')->post('admin/search', 'AdminController@search')->name('admin.search');
Route::middleware('role:admin')->get('admin/cetak/{nama_karyawan}', 'AdminController@cetak')->name('admin.cetak');

Route::middleware('role:admin')->post('/admin/data/{id_karyawan}', 'AdminController@lihatData')->name('admin.data');
