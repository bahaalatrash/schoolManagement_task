<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return Teacher::query()->with('user')->get();
    }


    public function teacherCourses(int $id)
    {

        return  Teacher::query()->where('id', $id)->with('user')->with('courses')->get();
    }

    public function teachersCourses()
    {

        return  Teacher::query()->with('user')->with('courses')->get();
    }
    
}
