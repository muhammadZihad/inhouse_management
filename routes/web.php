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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dash');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/employee', 'EmployeeController@index')->name('employee');
    Route::get('/profile/{id}', 'ProfileController@index')->name('profile');

    Route::get('/schedules', [
        'uses' => 'ScheduleController@index',
        'as' => 'schedules'
    ]);
    Route::get('/schedule/add', [
        'uses' => 'ScheduleController@create',
        'as' => 'schedule.add'
    ]);
    Route::post('/schedule/store', [
        'uses' => 'ScheduleController@store',
        'as' => 'schedule.store'
    ]);
    Route::resource('salary', 'SalaryController');
});