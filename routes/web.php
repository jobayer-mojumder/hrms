<?php

/*----------------------login, logout, Authentication-----------*/
Auth::routes();

/*---------------------admin panel------------------------*/
Route::get('', 'AdminController@index')->name('admin');
Route::get('/userlist', 'AdminController@userlist')->name('adminList');
Route::any('/user_edit/{id}', 'AdminController@userEdit')->name('adminEdit');
Route::get('/user_del/{id}', 'AdminController@userDelete')->name('adminDelete');
Route::get('/user_status_change/{id}/{value}', 'AdminController@adminStatus')->name('adminStatus');
Route::any('/user_add', 'AdminController@userAdd')->name('adminAdd');
Route::any('/user_change_password', 'AdminController@userPassword')->name('adminPassword');


/*-------------------- Employee -------------------------*/
Route::get('admin/employee/department', 'Employee_admin@department')->name('department');
Route::any('admin/employee/department/add', 'Employee_admin@department_add')->name('department_add');
Route::any('admin/employee/department/{id}/edit', 'Employee_admin@department_edit')->name('department_edit');
Route::get('admin/employee/department/{id}/del', 'Employee_admin@department_delete')->name('department_delete');

Route::get('admin/employee/designation', 'Employee_admin@designation')->name('designation');
Route::any('admin/employee/designation/add', 'Employee_admin@designation_add')->name('designation_add');
Route::any('admin/employee/designation/{id}/edit', 'Employee_admin@designation_edit')->name('designation_edit');
Route::get('admin/employee/designation/{id}/del', 'Employee_admin@designation_delete')->name('designation_delete');

Route::get('admin/employee/emp/', 'Employee_admin@employee')->name('employee');
Route::any('admin/employee/emp/{id}/view', 'Employee_admin@employee_view')->name('employee_view');
Route::any('admin/employee/emp/add', 'Employee_admin@employee_add')->name('employee_add');
Route::any('admin/employee/emp/{id}/edit', 'Employee_admin@employee_edit')->name('employee_edit');
Route::get('admin/employee/emp/{id}/del', 'Employee_admin@employee_delete')->name('employee_delete');

/*--------------------------payroll admin ------------------*/
Route::any('admin/payroll/pay/', 'Payroll_admin@payroll')->name('payroll');
Route::any('admin/payroll/view/', 'Payroll_admin@payroll_view')->name('payroll_view');
Route::any('admin/payroll/add/', 'Payroll_admin@payroll_add')->name('payroll_add');
Route::any('admin/payroll/edit/', 'Payroll_admin@payroll_edit')->name('payroll_edit');
Route::any('admin/payroll/delete/', 'Payroll_admin@payroll_delete')->name('payroll_edit');
