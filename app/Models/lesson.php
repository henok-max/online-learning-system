<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'description',
        'file_path',
    ];

    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function progress()
    {
        return $this->hasMany(CourseProgress::class);
    }
    public function quizeResults()
    {
        return $this->hasMany(QuizeResult::class);
    }
}
