<?php
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
    Route::resource('attendence', 'AttendenceController');
    Route::get('mysalary/', 'SalaryController@index_my')->name('salary.index_my');
    Route::get('push/{id}', 'SalaryController@push_sal')->name('salary.pusher');
    Route::resource('dep', 'DepController');
    Route::resource('des', 'DesController');
});