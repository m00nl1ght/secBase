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
Route::get('/security/edit', 'SecurityController@edit')->name('security-edit');
Route::post('/security/update/{id}', 'SecurityController@edit')->name('security-update');
Route::post('/security/store', 'SecurityController@store')->name('security-store');
Route::get('/security/report', 'SecurityController@report')->name('security-report');
Route::post('/security/report', 'SecurityController@report')->name('security-report-post');
Route::post('/security/autoinsert', 'SecurityController@autoinsert');
Route::get('/security/autoinsert', 'SecurityController@autoinsert');


Route::get('/visitor/new', 'VisitorController@create')->name('visitor-new');
Route::post('/visitor/submit', 'VisitorController@store')->name('visitor-add-form');
Route::get('/visitor/index', 'VisitorController@index')->name('visitor-index');
Route::get('/visitor/print/{id}', 'VisitorController@print')->name('visitor-print');
Route::post('/visitor/exit', 'VisitorController@exit')->name('visitor-exit');
Route::post('/visitor/autoinsert', 'VisitorController@autoinsert');


Route::get('/car/new', 'CarController@create')->name('car-new');
Route::post('/car/submit', 'CarController@store')->name('car-add-form');
Route::get('/car/index', 'CarController@index')->name('car-index');
Route::get('/car/print/{id}', 'CarController@print')->name('car-print');
Route::post('/car/exit', 'CarController@exit')->name('car-exit');
Route::post('/car/autoinsert', 'CarController@autoinsert');


Route::post('/employee/autoinsert', 'EmployeeController@autoinsert');

Route::get('/card/index', 'CardController@index')->name('card-index');
Route::get('/card/create', 'CardController@create')->name('card-create');
Route::get('/card/createemployee', 'CardController@createEmployee')->name('card-create-employee');
Route::post('/card/store', 'CardController@store')->name('card-store');
Route::post('/card/storeemployee', 'CardController@storeEmployee')->name('card-store-employee');
Route::post('/card/destroy/{id}', 'CardController@destroy')->name('card-destroy');

Route::get('/incomecard/index', 'IncomeCardController@index')->name('incomecard-index');


Route::get('/fault/new', 'FaultController@create')->name('fault-new');
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
Route::get('/act/act_form', 'ActController@create')->name('act-form');
Route::post('/act/submit', 'ActController@store')->name('act-store');
Route::get('/act/print/{id}', 'ActController@print')->name('act-print');
Route::get('/act/index', 'ActController@index')->name('act-index');
Route::post('/act/update/{id}', 'ActController@update')->name('act-update');
Route::get('/act/approval', 'ActController@approval')->name('act-approval');

//отправка почты
Route::get('/send-email', 'FeedbackController@send')->name('email-security-report');