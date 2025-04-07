<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_progress', function (Blueprint $table) {
            $table->id(); // Auto-incremented primary key
            $table->unsignedBigInteger('student_id'); // Foreign key referencing students table
            $table->unsignedBigInteger('course_id');  // Foreign key referencing courses table
            $table->string('lesson');                  // Name of the lesson
            $table->boolean('completed')->default(false);  // Progress status
            $table->timestamps();

            // Foreign Keys
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_progress');
    }
};
