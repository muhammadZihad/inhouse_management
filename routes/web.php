<?php
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/myschedule', 'ScheduleController@mySched')->name('mysched');
    Route::get('/myprofile', 'ProfileController@myPro')->name('mypro');
    Route::resource('schedule', 'ScheduleController');
    Route::resource('employee', 'EmployeeController');
    Route::resource('leave', 'LeaveController');
    Route::resource('salary', 'SalaryController');
    Route::resource('amount', 'SalController');
    Route::resource('attendence', 'AttendenceController');
    Route::get('mysalary/', 'SalaryController@index_my')->name('salary.index_my');
    Route::get('push/{id}', 'SalaryController@push_sal')->name('salary.pusher');
    Route::resource('dep', 'DepController');
    Route::resource('des', 'DesController');
    Route::resource('profile', 'ProfileController');
});