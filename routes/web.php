<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\kadercontroller;
use App\Http\Controllers\NimbangController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//login dan register
Route::get('/register', 'AuthController@getregister')->name('register')->middleware('guest');
Route::post('/register', 'AuthController@postregister')->middleware('guest');
Route::get('/login', 'AuthController@getlogin')->name('login')->middleware('guest');
Route::post('/login', 'AuthController@postlogin')->middleware('guest');
Route::get('/logout', 'AuthController@logout')->middleware('auth')->name('logout');

// Route back history
Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;
});

Route::group(['middleware' => 'auth'], function()
{
    //All the routes that belongs to the group goes here

    //Route::get('/home', 'HomeController@index')->name('home');

   // Form Ibu
    Route::resource('/ibu','IbuController');
    Route::get('/ibu/create','IbuController@create');
    Route::post('/ibu/store','IbuController@store');
    Route::post('/ibu/edit/{id_ibu}','IbuController@update');
    Route::get('/cetakibu','IbuController@cetakibu');

    // Form Tugas
    Route::resource('/tugas','TugasController');
    Route::get('/tugas/create'.'TugasController@create');
    Route::post('/tugas/store','TugasController@store');
    Route::post('/tugas/edit/{id_tugas}','TugasController@update');

    // Form Nimbang
    Route::resource('/nimbang', 'NimbangController');
    Route::get('/nimbang/create','NimbangController@create');
    Route::post('/nimbang/store','NimbangController@store');
    Route::post('/nimbang/edit/{id}','NimbangController@update');
    Route::get('/cetaknimbang','NimbangController@cetaknimbang');
    Route::get('/api/fetchnamebalita', 'NimbangController@fetchNameBalita');

    //Form Imunisasi
    Route::resource('/imunisasi','ImunisasiController');
    Route::get('/imunisasi/create','ImunisasiController@create');
    Route::post('/imunisasi/store','ImunisasiController@store');
    Route::post('/imunisasi/edit/{id_imunisasi}','ImunisasiController@update');
    Route::get('/cetakimunisasi','ImunisasiController@cetakimunisasi');
    Route::get('/api/fetchbalita','ImunisasiController@fetchBalita');

    // Form Vaksin
    Route::resource('/vaksin','VaksinController');
    Route::get('/vaksin/create','VaksinController@create');
    Route::post('/vaksin/store','VaksinController@store');
    Route::get('/cetakvaksin','VaksinController@cetakvaksin');
    Route::post('/vaksin/edit/{id_vaksin}','VaksinController@update');

    // Form Kader
    Route::resource('/kader','kadercontroller');
    Route::get('/kader/create', 'kadercontroller@create');
    Route::post('/kader/store', 'kadercontroller@store');
    Route::post('/kader/edit/{id_kader}', 'kadercontroller@update');
    Route::get('/cetakkader','kadercontroller@cetakKader');

    // Form Pasien
    Route::resource('/pasien','PasienController');
    Route::get('/pasien/create', 'PasienController@create');
    Route::post('/pasien/store','PasienController@store');
    Route::post('/pasien/edit/{id_pasien}', 'PasienController@update');
    Route::get('/cetakpasien/{id}','PasienController@cetakPasien');
    Route::get('/cetakpasien','PasienController@cetakPasienall');
    Route::get('/api/fetchnameibu', 'PasienController@fetchNameIbu');

    // profile //
    Route::get('/auth/profile', 'AuthController@profile');
    Route::post('/auth/profile', 'AuthController@update_profile');
});



