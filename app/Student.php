<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'students_courses', 'student_id', 'course_id');
    }

}
