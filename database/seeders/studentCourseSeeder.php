<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class studentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_student')->insert([
            ['course_id' => Course::inRandomOrder()->first()->id, 'student_id' => Student::inRandomOrder()->first()->id],
            ['course_id' => Course::inRandomOrder()->first()->id, 'student_id' => Student::inRandomOrder()->first()->id],
            ['course_id' => Course::inRandomOrder()->first()->id, 'student_id' => Student::inRandomOrder()->first()->id],
        ]);
    }
}
