<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');





Route::get('students', [StudentController::class, 'index']);


Route::prefix('teachers')->group(function () {
    Route::get('/', [TeacherController::class, 'index']);
    Route::get('/{id}/courses', [TeacherController::class, 'teacherCourses']);
    Route::get('/courses', [TeacherController::class, 'teachersCourses']);
});

Route::prefix('courses')->group(function () {
    Route::get('/{id}/students', [CourseController::class, 'CourseStudents']);
    Route::post('/{id}', [CourseController::class, 'syncstudentsincourse']);

    Route::get('/{teacherid}', [CourseController::class, 'attachcoursestoteacher']);
});





