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


// Students main page
Route::get('/students', 'StudentController@showStudents');
// Delete student from db
Route::post('/delstudent/{stud_id}', 'StudentController@deleteStudent')->where('stud_id', '[0-9]+');
// Modify student
Route::post('/modstudent/{stud_id}', 'StudentController@modifyStudent')->where('stud_id', '[0-9]+');
// Add student
Route::post('/addstudent', 'StudentController@addStudent');
// Show student's courses
Route::get('/students/{stud_id}', 'StudentController@showStudentCourses')->where('stud_id', '[0-9]+');


// Courses main page
Route::get('/courses', 'CourseController@showCourses');
// Delete course from db
Route::post('/delcourse/{course_id}', 'CourseController@deleteCourse')->where('course_id', '[0-9]+');
// Modify course
Route::post('/modcourse/{course_id}', 'CourseController@modifyCourse')->where('course_id', '[0-9]+');
// Add course
Route::post('/addcourse', 'CourseController@addCourse');
// Show course's students
Route::get('/courses/{course_id}', 'CourseController@showCourseStudents')->where('course_id', '[0-9]+');



// Delete a course from a user
Route::post('/students/{scourse_id}', 'StudentsController@deleteStudentCourse')->where('scourse_id', '[0-9]+');
// Bind a student to a course
Route::post('/students/{course_id}/{stud_id}', 'StudentsController@addStudentCourse')->where(['course_id' => '[0-9]+', 'stud_id' => '[0-9]+']);




Route::get('/home', 'HomeController@index')->name('home');
