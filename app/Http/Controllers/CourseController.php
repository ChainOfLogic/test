<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Course;
use PhpParser\Node\Expr\Array_;

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
        $courses = Course::all();
        return view('courses.courses', array('courses' => $courses));
    }

    //this method is for routering ajax responses. The function name is in the id of an html element. Where it sends here, it's just calls.
    public function coursesRouter(Request $request)
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

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        $course->delete();
        return 1;
    }

    public function modifyCourse($id, $data)
    {
        $course = Course::find($id);
        $course->name = $data[0];
        $course->save();
        return 2;
    }

    public function addCourse( $arg, $data)
    {

        $course = new Course;
        $course->name = $data[0];
        $course->save();
        return 3;
    }

    public function showCourseStudents($id)
    {

        $courses = Course::find($id);

        return view('courses.course_students', array('students' => $courses->students, 'course_id' => $id));
    }


}
