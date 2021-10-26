<?php

use Illuminate\Http\Request;  

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//routes schools
Route::get('schools', 'Api\SchoolController@index');
Route::post('schools/create', 'Api\SchoolController@store');
Route::delete('schools/delete/{id}', 'Api\SchoolController@destroy');
Route::patch('schools/update/{id}', 'Api\SchoolController@update');
Route::get('schools/{id}', 'Api\SchoolController@show');
Route::get('schools/search/{name}', 'Api\SchoolController@search');


//routes students
Route::get('students', 'Api\StudentController@index');
Route::post('students/create', 'Api\StudentController@store');
Route::delete('students/delete/{id}', 'Api\StudentController@destroy');
Route::patch('students/update/{id}', 'Api\StudentController@update');
Route::get('students/{id}', 'Api\StudentController@show');
Route::get('students/search/{name}', 'Api\StudentController@search');

//routes class
Route::get('classes', 'Api\ClassRoomController@index');
Route::post('classes/create', 'Api\ClassRoomController@store');
Route::delete('classes/delete/{id}', 'Api\ClassRoomController@destroy');
Route::patch('classes/update/{id}', 'Api\ClassRoomController@update');
Route::get('classes/{id}', 'Api\ClassRoomController@show');
Route::get('classes/search/{name}', 'Api\ClassRoomController@search');
Route::get('classes/change_school/{id}', 'Api\ClassRoomController@change_school');

//routes class_student
Route::get('class_student', 'Api\StudentClassRoomController@index');
Route::post('class_student/create', 'Api\StudentClassRoomController@store');
Route::delete('class_student/delete/{id}', 'Api\StudentClassRoomController@destroy');
Route::patch('class_student/update/{id}', 'Api\StudentClassRoomController@update')->name('class_studante.update');
Route::get('class_student/{id}', 'Api\StudentClassRoomController@show');
