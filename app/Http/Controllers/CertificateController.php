<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use App\Models\QuizeResult;
use Illuminate\Support\Facades\Storage;

use PDF;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function generate($lesson_id)
    {
        // Step 3.3: Find the lesson by ID
        $lesson = Lesson::findOrFail($lesson_id);

        // Step 3.4: Retrieve the associated course
        $course = $lesson->course;

        // Step 3.5: Check the user's highest quiz score for this lesson
        $userScore = QuizeResult::where('lesson_id', $lesson_id)
            ->where('student_id', auth()->id())
            ->max('score');

        // Step 3.6: Verify the score eligibility
        if ($userScore >= 50) {
            // Step 3.7: Generate the certificate view
            return view('certificate', compact('course'));
        } else {
            // Step 3.8: Redirect if the user doesn't meet the criteria
            return redirect()->route('lessons.show', ['courseId' => $course->id, 'lessonId' => $lesson_id])
                ->with('message', 'You need at least 50% to generate the certificate.');
        }
    }
    public function download($lesson_id)
    {
        // Fetch lesson and associated course data
        $lesson = Lesson::findOrFail($lesson_id);
        $course = $lesson->course;  // Ensure the course is retrieved
        $user = auth()->user();

        // Generate certificate content (e.g., using a PDF library)
        $pdf = PDF::loadView('certificate', [
            'lesson' => $lesson,
            'course' => $course,
            'user' => $user,
        ])->setPaper('a4', 'landscape'); // Set paper size to A4 and orientation to landscape

        // Add the image to the PDF as an embedded resource

        // Define a filename
        $fileName = "Certificate_{$user->first_name}_{$course->name}.pdf";

        // Save the file temporarily
        $filePath = storage_path("app/public/{$fileName}");
        $pdf->save($filePath);

        // Serve the file as a download
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
