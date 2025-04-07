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
        Schema::table('course_progress', function (Blueprint $table) {
            $table->string('lesson_slug')->after('course_id'); // Add a new column
            $table->boolean('is_completed')->default(false)->after('lesson_slug'); // Add another column
            $table->dropColumn('lesson');
            $table->dropColumn('completed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_progress', function (Blueprint $table) {
            $table->dropColumn(['lesson_slug', 'is_completed']);
        });
    }
};
