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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('home');
});

Route::get('/security/new', 'SecurityController@create')->name('security-new');
Route::get('/security/current', 'SecurityController@current')->name('security-current');
Route::post('/security/submit', 'SecurityController@submit')->name('security-add-form');
Route::get('/security/report', 'SecurityController@report')->name('security-report');
Route::post('/security/report', 'SecurityController@report')->name('security-report-post');


Route::get('/visitor/new', 'VisitorController@create')->name('visitor-new');
Route::post('/visitor/submit', 'VisitorController@store')->name('visitor-add-form');
Route::get('/visitor/index', 'VisitorController@index')->name('visitor-index');
Route::get('/visitor/print/{id}', 'VisitorController@print')->name('visitor-print');
Route::post('/visitor/exit', 'VisitorController@exit')->name('visitor-exit');
Route::post('/visitor/autoinsert', 'VisitorController@autoinsert');


Route::get('/car/new', 'CarController@create')->name('car-new');
Route::post('/car/submit', 'CarController@store')->name('car-add-form');
Route::get('/car/index', 'CarController@index')->name('car-index');
// Route::get('/car/printBlank', function () {
//     return view('printBlank')->with('page', 'car');
// })->name('car-printBlank');
Route::get('/car/print/{id}', 'CarController@print')->name('car-print');
Route::post('/car/autoinsert', 'CarController@autoinsert');

Route::get('/card/new', function () {
    return view('card')->with('page', 'new');
})->name('card-new');
Route::post('/card/submit', 'CardController@store')->name('card-add-form');
Route::get('/card/index', 'CardController@index')->name('card-index');


Route::get('/fault/new', function () {
    return view('fault')->with('page', 'new');
})->name('fault-new');
Route::post('/fault/submit', 'FaultController@store')->name('fault-add-form');
Route::get('/fault/index', 'FaultController@index')->name('fault-index');
Route::post('/fault/update/{id}', 'FaultController@update')->name('fault-update');

// Route::get('/incident/new', function () {
//     return view('incident')->with('page', 'new');
// })->name('incident-new');
Route::get('/incident/new', 'IncidentController@create')->name('incident-new');
Route::post('/incident/submit', 'IncidentController@store')->name('incident-add');
Route::get('/incident/index', 'IncidentController@index')->name('incident-index');
Route::get('/incident/update/{id}', 'IncidentController@update')->name('incident-update');
Route::get('/incident/show/{id}', 'IncidentController@show')->name('incident-show');
Route::post('/incident/update/{id}', 'IncidentController@update')->name('incident-update');
Route::get('/incident/destroy/{id}', 'IncidentController@destroy')->name('incident-destroy');

//Route для формы акта-допуска
Route::get('/act/act_form', 'CheckboxController@create')->name('act-form');
Route::post('/act/submit', 'CheckboxController@store')->name('act-store');