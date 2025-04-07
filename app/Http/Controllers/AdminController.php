<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class AdminController extends Controller
{
    public function dashboard()
    {
        $students =  Student::whereDoesntHave('Progress')->get();
        $stud = Student::all();
        $totalStudents = $stud->count();

        return view('admin.dashboard', compact('students', 'totalStudents'));
    }

    public function addCourse(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        Course::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Course added successfully.');
    }

    public function deleteStudent(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);

        Student::findOrFail($request->student_id)->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Student deleted successfully.');
    }
}
