<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseProgress;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class CourseController extends Controller
{
    public function showCourses()
    {
        $courses = Course::all(); // Fetch all courses
        return view('welcome', compact('courses')); // Pass courses to the view
    }
    public function Courselist()
    {
        $courses = Course::all(); // Fetch all courses
        return view('courses', compact('courses')); // Pass courses to the view
    }
    public function showLesson($courseId, $lessonId = null)
    {
        $student = Auth::user();

        // Handle case where no lessons exist
        $completedLessons = CourseProgress::where('student_id', $student->id)
            ->where('course_id', $courseId)
            ->distinct('lesson_id')
            ->pluck('lesson_id')
            ->toArray();

        // Redirect to the first lesson if none is specified
        if (is_null($lessonId)) {
            $firstLesson = $completedLessons->first();
            return redirect()->route('lessons.show', [
                'courseId' => $courseId,
                'lessonId' => $firstLesson,
            ]);
        }

        // Redirect to lesson show
        return redirect()->route('lessons.show', ['courseId' => $courseId, 'lessonId' => $lessonId]);
    }
}
