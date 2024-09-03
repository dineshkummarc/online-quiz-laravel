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
    return view('mainpage');
});

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/

Route::resource('quiz','QuizController');

Route::get('teacher', 'TeacherController@index')->name('teacher');

Route::POST('teacher','TeacherController@create');

Route::get('student', 'StudentController@index')->name('student');;

Route::POST('student','StudentController@quiz_evaluation');

Route::GET('admin/home','AdminController@index');

Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');

Route::POST('admin','Admin\LoginController@login');

Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');

Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::GET('admin/removeteacher','AdminController@removeteach')->name('admin.removeteacher');

Route::GET('admin/removestudent','AdminController@removestud')->name('admin.removestudent');

Route::POST('admin/home','AdminController@delete');

Route::POST('quiz/{token}','StudentController@rating');

Route::GET('teacher/check_rating','TeacherController@checking')->name('teacher.check_rating');

Route::POST('teacher/check_rating','TeacherController@checking');

Route::patch('teacher', 'TeacherController@add_ques')->name('teacher');