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


/* Welcome */
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/* Login */
Route::get('/login', array(
	'as' 	=> 'login',
	'uses' 	=> 'LoginController@getLogin'
));

Route::post('/login', array(
	'as' 	=> 'post-login',
	'uses' 	=> 'LoginController@postLogin'
));

/* Register */
Route::get('/register', array(
	'as' 	=> 'register',
	'uses' 	=> 'RegisterController@getRegister'
));

Route::post('/register', array(
	'as' 	=> 'post-register',
	'uses' 	=> 'RegisterController@postRegister'
));

/* Hello New Teacher */
Route::view('/hello-new-teacher', 'hello-new-teacher')->name('hello-new-teacher');

/* Logout */
Route::get('/logout', array(
	'as'   	=> 'logout',
	'uses' 	=> 'LogoutController@logout' 
));

/* Teacher Confirm */
Route::get('/teacher-confirm/{teacher_code}', 'TeacherConfirmController@confirm');

/* Admin */
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function(){
	Route::get('home', array(
		'as' 	=> 'home',
		'uses'  => 'HomeController@index'
	));
	Route::resource('student-management', 'StudentManagement');
	Route::resource('teacher-management', 'TeacherManagement');
	Route::get('send-mail-to-teacher/{id}', 'TeacherManagement@sendMailToTeacher');
	Route::resource('module-management', 'ModuleManagement');
	Route::resource('class-management', 'ClassManagement');
	Route::get('get-teacher-module','ClassManagement@getTeacherModule');
	Route::get('view-student-class', 'ClassManagement@viewStudentClass');
});

/* Teacher */
Route::group(['as' => 'teacher.', 'prefix' => 'teacher', 'namespace' => 'Teacher', 'middleware' => 'teacher'], function(){
	Route::get('home', array(
		'as' 	=> 'home',
		'uses'  => 'HomeController@index'
	));
	Route::resource('teacher-information', 'TeacherInformation');
	Route::post('update-teacher-information/{id}','TeacherInformation@update');
	Route::resource('module-management', 'ModuleManagement');
	Route::resource('class-management', 'ClassManagement');
	Route::get('view-student-class', 'ClassManagement@viewStudentClass');
});

/* Student */
Route::group(['as' => 'student.', 'prefix' => 'student', 'namespace' => 'Student', 'middleware' => 'student'], function(){
	Route::get('home', array(
		'as' 	=> 'home',
		'uses'  => 'HomeController@index'
	));
	Route::resource('student-information', 'StudentInformation');
	Route::post('update-student-information/{id}','StudentInformation@update');
	Route::post('update-password/{id}','StudentInformation@updatePassword');
	Route::resource('module-management', 'ModuleManagement');
	Route::resource('class-management', 'ClassManagement');
	Route::get('get-class-module','ClassManagement@getClassModule');
});




