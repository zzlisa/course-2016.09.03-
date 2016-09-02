<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('admin/login', 'Admin\LoginController@login');

//查看
Route::group(['middleware' => ['admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::any('index', 'IndexController@index');
    Route::resource('student', 'StudentController'); //学生表
    Route::resource('teacher', 'TeacherController'); //教师表
    Route::resource('classroom', 'ClassroomController'); //教室表
    Route::resource('classe', 'ClasseController'); //班级表
    Route::resource('college', 'CollegeController'); //学院表
    Route::resource('course', 'CourseController'); //课程表
    Route::resource('plan', 'PlanController'); //教学计划表
    Route::resource('profess', 'ProfessController'); //专业表
});

//查找
Route::group(['middleware' => ['admin.login'],'prefix'=>'home','namespace'=>'Home'], function () {
    Route::any('classroom', 'SelectController@classroom');
    Route::any('classroom/{classroom_id}', 'SelectController@classroom');

    Route::any('teacher', 'SelectController@teacher');
    Route::any('teacher/{teacher_id}', 'SelectController@teacher');

    Route::any('course', 'SelectController@course');
    Route::any('course/{course_id}', 'SelectController@course');

    Route::any('classe', 'SelectController@classe');
    Route::any('classe/{classe_id}', 'SelectController@classe');

    Route::any('sclassroom', 'SearchController@classroom');
    Route::any('sclassroom/{classroom_id}', 'SearchController@classroom');

    Route::any('sstudent', 'SearchController@student');
    Route::any('sstudent/{student_id}', 'SearchController@student');

    Route::any('steacher', 'SearchController@teacher');
    Route::any('steacher/{teacher_id}', 'SearchController@teacher');

    Route::any('scourse', 'SearchController@course');
    Route::any('scourse/{course_id}', 'SearchController@course');
});
