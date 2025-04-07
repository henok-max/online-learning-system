<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizeResult;

class QuizeController extends Controller
{
    public function submitQuiz(Request $request)
    {

        $studentId = Auth::id();
        $lessonId = $request->input('lesson_id');

        $score = $request->input('score');

        if ($score >= 50) {
            QuizeResult::create([
                'student_id' => $studentId,
                'lesson_id' => $lessonId, // Pass lesson_id here
                'score' => $score,
                'passed' => true,
            ]);
            return back()->with('message', 'You passed the exam! Ready to graduate.');
        } else {
            QuizeResult::create([
                'student_id' => $studentId,
                'lesson_id' => $lessonId, // Pass lesson_id here
                'score' => $score,
                'passed' => false,
            ]);
            return back()->with('message', 'You failed the exam. Please try again.');
        }
    }
}
