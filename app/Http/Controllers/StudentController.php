<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
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

    public function showStudents()
    {

    }

    public function deleteStudent()
    {

    }

    public function modifyStudent()
    {

    }

    public function addStudent()
    {

    }

    public function showStudentCourses()
    {

    }

    public function deleteStudentCourse()
    {

    }

    public function addStudentCourse()
    {


    }



}
