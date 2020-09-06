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
    return view('home');
})->name('home');

Route::get('/security/new', function () {
    return view('security')->with('page', 'new');
})->name('security-new');

Route::get('/security/current', 'SecurityController@current')->name('security-current');
Route::post('/security/submit', 'SecurityController@submit')->name('security-add-form');

Route::get('/visitor/new', function () {
    return view('visitor')->with('page', 'new');
})->name('visitor-new');

Route::post('/visitor/submit', 'VisitorController@store')->name('visitor-add-form');
Route::get('/visitor/index', 'VisitorController@index')->name('visitor-index');
Route::get('/visitor/printBlank', function () {
    return view('includes/visitor/reportBlank');
})->name('visitor-printBlank');

Route::get('/car/new', function () {
    return view('car')->with('page', 'new');
})->name('car-new');

Route::post('/car/submit', 'CarController@store')->name('car-add-form');
Route::get('/car/index', 'CarController@index')->name('car-index');
Route::get('/car/printBlank', function () {
    return view('includes/car/reportBlank');
})->name('car-printBlank');