<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function grades () {
        $user = auth()->user();
        $student = Student::where('account_id', $user->account_id)->first();
        $classes = Classes::where('student_id', $student->student_id)->get();

        $faculties = [];
        $courses = [];
        foreach ($classes as $class) {
            $faculty = Faculty::find($class->faculty_id);
            if ($faculty) {
                $faculties[] = $faculty;
            }
            $course = Course::find($class->course_id);
            if ($course) {
                $courses[] = $course;
            }
        }

        return view('student_dashboard', compact('student', 'classes', 'faculties', 'courses'));
    }
}
