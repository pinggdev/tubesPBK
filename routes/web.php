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
    return view('front-end.landingPage');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::resource('kelas', 'KelasController');
    Route::resource('materi', 'MateriController');
    Route::resource('user', 'UserController');
    Route::resource('kuis', 'KuisController');
    Route::resource('option', 'OptionController');
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => ['auth', 'checkRole:member']], function () {
    Route::get('/profil', 'ProfilController@kelas_saya');
    Route::get('/tutorial-homepage/{kelas}', 'ProfilController@tutorhp')->name('tutorhp');
    Route::get('/tutorial/{kelas}/{materi}', 'ProfilController@tutor');
    Route::get('/kuisbab/{kelas}/{babkuis}', 'ProfilController@kuisbab');
    Route::post('/storekuis', 'ProfilController@storekuis')->name('storekuis');
});

