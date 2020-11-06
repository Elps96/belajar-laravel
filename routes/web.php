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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'IndexController@index');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/karyawan/login', 'Karyawan\karyawanLoginController@showLoginForm')->name('karyawan.loginform');

// Route::post('/karyawan/login', 'Karyawan\karyawanLoginController@login')->name('karyawan.login');

// Route::post('/karyawan/logout', 'Karyawan\karyawanLoginController@logout')->name('karyawan.logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function(){

    Route::resource('karyawan', 'Karyawan\KaryawanController');
    //Route::resource('grade', 'GradeController');
    //Route::resource('produk', 'ProdukController');

    // Route::get('/karyawan', 'Karyawan\KaryawanController@index')->name('karyawan');
    // Route::get('/karyawan/create', 'Karyawan\KaryawanController@create');
    // Route::get('/karyawan/{karyawan}', 'Karyawan\KaryawanController@show');
    // Route::post('/karyawan', 'Karyawan\KaryawanController@store');
    // Route::delete('/karyawan/{karyawan}', 'Karyawan\KaryawanController@destroy');
    // Route::get('/karyawan/{karyawan}/destroy', 'Karyawan\KaryawanController@destroy');
    // Route::get('/karyawan/{karyawan}/edit', 'Karyawan\KaryawanController@edit');
    // Route::patch('/karyawan/{karyawan}', 'Karyawan\KaryawanController@update');

    Route::get('/grade', 'GradeController@index');
    Route::get('/grade/create', 'GradeController@create');
    Route::post('/grade', 'GradeController@store');
    Route::get('/grade/{grade}/edit', 'GradeController@edit');
    Route::patch('/grade/{grade}', 'GradeController@update');
    
    Route::get('/produk', 'ProdukController@index');
    Route::get('/produk/create', 'ProdukController@create');
    Route::post('/produk', 'ProdukController@store');
});
    
    
Route::group(['middleware' => ['auth','checkRole:admin,karyawan']], function(){

    Route::get('/penduduk', 'PendudukController@index');
    Route::get('/penduduk/export_excel', 'PendudukController@export_excel');
    Route::post('/penduduk/import_excel', 'PendudukController@import_excel');
});

Route::get('getdatakaryawan', [
    'uses'  =>'Karyawan\KaryawanController@getdatakaryawan',
    'as'    =>'ajax.get.data.karyawan',
]);


