<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCourseProgressTable extends Migration
{
    public function up()
    {
        Schema::table('course_progress', function (Blueprint $table) {
            // Add the lesson_id column
            $table->unsignedBigInteger('lesson_id')->nullable()->after('course_id');

            // Add the foreign key constraint
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });

        Schema::table('course_progress', function (Blueprint $table) {
            // Drop the lesson_slug column
            $table->dropColumn('lesson_slug');
        });
    }

    public function down()
    {
        Schema::table('course_progress', function (Blueprint $table) {
            // Add the lesson_slug column back
            $table->string('lesson_slug')->after('course_id');

            // Remove the lesson_id column
            $table->dropForeign(['lesson_id']);
            $table->dropColumn('lesson_id');
        });
    }
}
