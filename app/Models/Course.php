<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Define the table name if it's different from the default
    protected $table = 'courses';  // Optional if the table name matches the plural of the model name

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'name',
        'description',
        'file_path',
    ];

    // Define a relationship with the Student model (many-to-many)
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_courses', 'course_id', 'student_id');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }
    public function progress()
    {
        return $this->hasMany(CourseProgress::class);
    }
    public function getNextLessonIdForUser($userId)
    {
        // Fetch all lessons for this course
        $lessons = $this->lessons()->get();

        // Return the first lesson if there are no lessons
        if ($lessons->isEmpty()) {
            return null;
        }

        // Get completed lesson IDs for this user
        $completedLessons = CourseProgress::where('student_id', $userId)
            ->where('course_id', $this->id)
            ->pluck('lesson_id')
            ->toArray();

        // Find the first uncompleted lesson
        foreach ($lessons as $lesson) {
            if (!in_array($lesson->id, $completedLessons)) {
                return $lesson->id;
            }
        }

        // If all lessons are completed, return the first lesson
        return $lessons->first()->id;
    }
}
