<?php

namespace App\Http\Controllers;

use App\StudentCourses;
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
        return view('students.students', array('students' => $students));
    }

    //this method is for routering ajax responses. The function name is in the id of an html element. Where it sends here, it's just calls.
    public function studentsRouter(Request $request)
    {
        $function = $request->input('func');
        $arg = $request->input('arg');
        $data = $request->input('data');
        if (method_exists($this, $function))
        {
            $response = $this->$function($arg, $data);
        }
        else
        {
            $response = null;
        }
        return response()->json(array('msg' => $response), 200);
    }


    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        return 1;
    }

    public function modifyStudent($id, $data)
    {
        $student = new Student;
        $student::where('id', $id)
        ->update(['first_name' => $data[0], 'second_name' => $data[1], 'birth_date' => $data[2], 'phone_number' => $data[3], 'address' => $data[4], 'email' => $data[5]]);
        return 2;
    }

    public function addStudent($arg, $data)
    {
        $student = new Student;
        $data = array(
            'first_name'    =>    $data[0],
            'second_name'   =>    $data[1],
            'birth_date'    =>    $data[2],
            'phone_number'  =>    $data[3],
            'address'       =>    $data[4],
            'email'         =>    $data[5],
        );
        $student::insert($data);
        return 3;
    }

    public function showStudentCourses($id)
    {
        $students = Student::find($id);

        return view('students.student_courses', array('courses' => $students->courses, 'student_id' => $id));
    }

    public function deleteStudentCourse($course_id, $student_id)
    {
        $student = StudentCourses::where('course_id', $course_id)
        ->where('student_id', $student_id)->delete();

    }

    public function addStudentCourse($course_id, $student_id)
    {
        $data = array(
            'course_id'    =>    $course_id,
            'student_id'   =>    $student_id,
        );
        $students_course = new \App\StudentCourses;
        return response()->json(array('msg' => $students_course::insert($data)), 200);
    }



}
