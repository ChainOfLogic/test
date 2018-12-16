<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

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
        $students = Student::all();
        return view('students.students');
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
