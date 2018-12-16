<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCourses()
    {
        return view('courses.courses');
    }



    public function deleteCourse()
    {

    }

    public function modifyCourse()
    {

    }

    public function addCourse($q)
    {

    }

    public function showCourseStudents()
    {

    }


}
