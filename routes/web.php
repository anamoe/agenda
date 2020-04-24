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
// Route::get('data','pegawaicontroller@index');
// Route::post('tambahdata','pegawaicontroller@create');
// Route::get('hapusdata','pegawaicontroller@delete');
Route::get('/upload', 'uploadcontroller@upload');
Route::post('/upload/proses', 'uploadcontroller@proses_upload')->name('upload_proses');
// Route::get('/point', 'penukaran@poin');
