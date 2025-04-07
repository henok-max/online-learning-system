<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\CourseProgress;



class StudentController extends Controller
{
    // Show the signup form
    public function create()
    {
        return view('student.register');
    }

    // Handle form submission
    public function register(Request $request)
    {
        // Validate the input
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:6',
        ]);

        // Save the data into the database
        $student =  Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        auth()->login($student);
        // Redirect to the new route upon success
        return redirect()->route('courses.index')->with('success', 'Signup and login successful!');
    }
    public function enroll(Request $request)
    {
        $student = auth()->user();

        if (!$student) {
            return redirect()->route('welcome')->with('error', 'You need to log in first.');
        }
        $courseId = $request->query('course_id');
        $student->courses()->syncWithoutDetaching([$courseId]);

        return redirect()->route('dashboard')->with('success', 'You have enrolled in the course!');
    }
    public function login(Request $request)
    {
        // Validate the login form inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Please enter your email.',
            'email.email' => 'Invalid email format.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters long.',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Login successful, redirect to the dashboard
            $student = Auth::user();

            if ($student->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($student->role === 'student') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->back()->with('error', 'Unauthorized access.');
            }
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
    public function courseCompleted($courseId)
    {
        $course = Course::findOrFail($courseId);
        $courseName = $course->name;

        return view('congratulations', compact('courseName', 'courseId'));
    }

    public function dashboard()
    {
        $user = Auth::user();

        // Fetch enrolled courses with progress and button text
        $enrolledCourses = Course::whereHas('students', function ($query) use ($user) {
            $query->where('student_id', $user->id);
        })->with(['lessons'])->get();

        foreach ($enrolledCourses as $course) {
            $totalLessons = $course->lessons->count();
            $completedLessons = CourseProgress::where('student_id', $user->id)
                ->where('course_id', $course->id)
                ->count();

            $course->progress = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100) : 0;

            // Determine button text and next lesson ID
            if ($totalLessons === 0) {
                $course->buttonText = null; // No button for courses with no lessons
                $course->nextLessonId = null;
            } elseif ($completedLessons === 0) {
                $course->buttonText = 'Start Course';
                $course->nextLessonId = $course->lessons->first()->id;
            } elseif ($completedLessons < $totalLessons) {
                $course->buttonText = 'Resume Course';
                $course->nextLessonId = $course->lessons->whereNotIn(
                    'id',
                    CourseProgress::where('student_id', $user->id)
                        ->where('course_id', $course->id)
                        ->pluck('lesson_id')
                )->first()->id;
            } else {
                $course->buttonText = 'View Completed';
                $course->nextLessonId = $course->lessons->first()->id;
            }
        }

        return view('dashboard', compact('enrolledCourses'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
