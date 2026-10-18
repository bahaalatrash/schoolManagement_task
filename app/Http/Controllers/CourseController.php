<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\SyncCourseRequest;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function CourseStudents(int $id)
    { ///// learn pivot
        $course =  Course::find($id);
     return  $course->students;
    }



    public function store(StoreCourseRequest $requst)
    {
        Course::query()->create($requst->validated());
    }

    /// where is right in course controller or teacher controller ? need try
    public function attachcoursestoteacher(int $teacherid)
    {

        $teacher = Teacher::query()->where('id', $teacherid)->get();
        $teacher->courses()->createMany([
            [
                "name" => "laravel",

            ],
            [
                "name" => "backend",

            ]
        ]);
    }




    public function syncstudentsincourse(SyncCourseRequest $request, int $id)
    {
        $course = Course::find($id);
        $course->students()->sync($request->students);
    }



}
