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

// Show student's courses
Route::get('/students/{stud_id}', 'StudentController@showStudentCourses')->where('stud_id', '[0-9]+');


// Courses main page
Route::get('/courses', 'CourseController@showCourses');

// Show course's students
Route::get('/courses/{course_id}', 'CourseController@showCourseStudents')->where('course_id', '[0-9]+');


//Courses router
Route::post('/coursesRouter', 'CourseController@coursesRouter');
Route::post('/studentsRouter', 'StudentController@studentsRouter');
// Delete a course from a user
Route::post('/delscourse/{course_id}/{stud_id}', 'StudentController@deleteStudentCourse')->where(['course_id' => '[0-9]+', 'stud_id' => '[0-9]+']);
// Bind a student to a course
Route::post('/students/{course_id}/{stud_id}', 'StudentController@addStudentCourse')->where(['course_id' => '[0-9]+', 'stud_id' => '[0-9]+']);




Route::get('/', function () {
    return redirect('/login');
});

