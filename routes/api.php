<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data','pegawaicontroller@index');
Route::post('tambahdata','pegawaicontroller@create');
Route::get('hapusdata','pegawaicontroller@delete');
Route::post('register','pegawaicontroller@register');
Route::post('login','pegawaicontroller@login');
Route::post('nambah','pegawaicontroller@nambah');
Route::get('delok','pegawaicontroller@delok');
Route::get('/upload', 'uploadcontroller@upload');
Route::post('/upload/proses', 'uploadcontroller@proses_upload')->name('upload_proses');

Route::get('/lihatanimasi', 'animasicontroller@lihatanimasi');
Route::post('/tambahanimasi', 'animasicontroller@tambahanimasi');
Route::get('/lihatagenda', 'agendacontroller@lihatagenda');
Route::post('/tambahagenda', 'agendacontroller@tambahagenda');
Route::get('/lihatfeedback', 'feedbackcontroller@lihatfeedback');
Route::post('/tambahfeedback', 'feedbackcontroller@tambahfeedback');

Route::get('/point', 'penukaran@poinku');
Route::get('/hadiah', 'penukaran@hadiahku');
Route::get('/hapushadiah', 'hadiahcontroller@hapushadiah');
Route::post('/tambahhadiah', 'hadiahcontroller@tambahhadiah');

Route::get('/lihat', 'Monitoringcontroller@lihat');
Route::get('/masyarakat', 'penukaran@masyarakatku');
