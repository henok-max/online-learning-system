<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\CourseProgress;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizeResult;


class LessonController extends Controller
{
    public function showLesson($courseId, $lessonId)
    {
        $student = Auth::user();

        // Fetch and validate the lesson
        $lesson = Lesson::where('id', $lessonId)
            ->where('course_id', $courseId)
            ->firstOrFail();



        // Avoid duplicate fetch by fetching all lessons only once
        static $lessons; // Cache lessons to avoid multiple queries
        if (!$lessons) {
            $lessons = Lesson::where('course_id', $courseId)
                ->orderBy('order')
                ->get();
        }

        // Determine completed lessons (unique)
        $completedLessons = CourseProgress::where('student_id', $student->id)
            ->where('course_id', $courseId)
            ->distinct('lesson_id')
            ->pluck('lesson_id')
            ->toArray();

        // Determine the next lesson
        $nextLesson = Lesson::where('course_id', $courseId)
            ->where('order', '>', $lesson->order)
            ->orderBy('order')
            ->first();

        // Mark the current lesson as completed
        CourseProgress::updateOrCreate(
            ['student_id' => $student->id, 'course_id' => $courseId, 'lesson_id' => $lessonId],
            ['is_completed' => true]
        );

        // Directly return lesson content
        if (!view()->exists('lessons.' . $lesson->file_path)) {
            abort(404, 'Lesson content not found.');
        }

        return view('lessons.' . $lesson->file_path, compact(
            'courseId',
            'lesson',
            'lessons',
            'lessonId',
            'completedLessons',
            'nextLesson'
        ));
    }
    public function viewLesson($lessonId)
    {
        $quizResults = QuizeResult::where('lesson_id', $lessonId)->get();
        return view('lessons.view', compact('quizResults'));
    }
}
