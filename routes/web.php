<?php

/*----------------------login, logout, Authentication-----------*/
Auth::routes();

/*---------------------admin panel------------------------*/
Route::get('', 'AdminController@index')->name('admin');
Route::get('/userlist', 'AdminController@userlist')->name('userlist');
Route::any('/user_edit/{id}', 'AdminController@userEdit');
Route::get('/user_del/{id}', 'AdminController@userDelete');
Route::get('/user_status_change/{id}/{value}', 'AdminController@userStatus');
Route::any('/user_add', 'AdminController@userAdd');


/*-------------------- Employee -------------------------*/
Route::get('employee/department', 'Employee_admin@department')->name('department');
Route::any('employee/department/add', 'Employee_admin@department_add')->name('department_add');
Route::any('employee/department/{id}/edit', 'Employee_admin@department_edit')->name('department_edit');
Route::get('employee/department/{id}/del', 'Employee_admin@department_delete')->name('department_delete');

Route::get('employee/designation', 'Employee_admin@designation')->name('designation');
Route::any('employee/designation/add', 'Employee_admin@designation_add')->name('designation_add');
Route::any('employee/designation/{id}/edit', 'Employee_admin@designation_edit')->name('designation_edit');
Route::get('employee/designation/{id}/del', 'Employee_admin@designation_delete')->name('designation_delete');

Route::get('employee/', 'Employee_admin@employee')->name('employee');
Route::any('employee/{id}/view', 'Employee_admin@employee_view')->name('employee_view');
Route::any('employee/add', 'Employee_admin@employee_add')->name('employee_add');
Route::any('employee/{id}/edit', 'Employee_admin@employee_edit')->name('employee_edit');
Route::get('employee/{id}/del', 'Employee_admin@employee_delete')->name('employee_delete');