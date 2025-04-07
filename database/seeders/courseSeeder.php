<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course; // Import the Course model

class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name' => 'Javascript',
            'description' => 'Learn to build interactive web applications.',
        ]);
        Course::create([
            'name' => 'AI',
            'description' => 'Learn basics about AI, applications.',
        ]);
        Course::create([
            'name' => 'Data science',
            'description' => 'Learn basics about Data science, applications.',
        ]);

        Course::create([
            'name' => 'c++',
            'description' => 'Learn basics about c++, applications.',
        ]);
        Course::create([
            'name' => 'Graphic Design',
            'description' => 'Learn basics about Graphic Design, applications.',
        ]);


        Course::create([
            'name' => 'react',
            'description' => 'Learn basics aboutreact, applications.',
        ]);
        Course::create([
            'name' => 'node',
            'description' => 'Learn basics about node, applications.',
        ]);
        Course::create([
            'name' => 'Python',
            'description' => 'Learn basics about python, applications.',
        ]);
    }
}
