<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourses extends Model
{
    public $timestamps = false;


    protected $table = 'students_courses';
}
