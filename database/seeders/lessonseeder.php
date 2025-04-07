<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Course;

class LessonSeeder extends Seeder
{
    public function run()
    {
        // Example structure for multiple courses with lessons
        $coursesWithLessons = [
            'JavaScript' => [
                ['name' => 'Introduction', 'description' => 'Learn the basics of JavaScript.', 'file_path' => 'javascript/introduction'],
                ['name' => 'Syntax', 'description' => 'Understand JavaScript syntax.', 'file_path' => 'javascript/syntax'],
                ['name' => 'Variables', 'description' => 'Learn about variables in JavaScript.', 'file_path' => 'javascript/variables'],
                ['name' => 'Functions', 'description' => 'Learn about functions in JavaScript.', 'file_path' => 'javascript/functions'],
                ['name' => 'Conditionals', 'description' => 'Learn about conditional statements in JavaScript.', 'file_path' => 'javascript/conditionals'],
                ['name' => 'Loops', 'description' => 'Learn about loops in JavaScript.', 'file_path' => 'javascript/variables'],
                ['name' => 'Quizes', 'description' => 'evaluate your self.', 'file_path' => 'javascript/quizes'],
                ['name' => 'Congratulations', 'description' => 'congratulations.', 'file_path' => 'javascript/congratulations'],

            ],
            'AI' => [
                ['name' => 'Introduction to AI', 'description' => 'Understand the fundamentals of AI.', 'file_path' => 'ai/introduction'],
                ['name' => 'History of AI', 'description' => 'Explore history of AI.', 'file_path' => 'ai/history'],
                ['name' => 'Types of AI', 'description' => 'Explore types of AI.', 'file_path' => 'ai/types'],
                ['name' => 'Machine Learning Basics', 'description' => 'Learn the basics of machine learning.', 'file_path' => 'ai/machine-learning'],
                ['name' => 'Neural Networks', 'description' => 'Learn about Neural Networks.', 'file_path' => 'ai/neural-networks'],
                ['name' => 'Ethics', 'description' => 'Learn Ethics about AI.', 'file_path' => 'ai/ethics'],
                ['name' => 'Quizes', 'description' => 'evaluate your self.', 'file_path' => 'ai/quizes'],
                ['name' => 'Congratulations', 'description' => 'congratulations.', 'file_path' => 'ai/congratulations'],

            ],
        ];

        // Loop through courses and their lessons
        foreach ($coursesWithLessons as $courseName => $lessons) {
            // Find the course by name (assuming the courses have already been seeded)
            $course = Course::where('name', $courseName)->first();

            if ($course) {
                foreach ($lessons as $lesson) {
                    Lesson::create([
                        'course_id' => $course->id,
                        'name' => $lesson['name'],
                        'description' => $lesson['description'],
                        'file_path' => $lesson['file_path'],
                    ]);
                }
            }
        }
        $lessons = Lesson::orderBy('id')->get();
        $order = 1;

        foreach ($lessons as $lesson) {
            $lesson->update(['order' => $order]);
            $order++;
        }
    }
}
