<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Course extends Model
{

    public $timestamps = false;

    public function students()
    {
        return $this->belongsToMany('App\Student', 'students_courses', 'course_id', 'student_id');
    }
}
