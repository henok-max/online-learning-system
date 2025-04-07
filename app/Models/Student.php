<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;



    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    // Define a relationship with the Course model (many-to-many)
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses', 'student_id', 'course_id');
    }
    public function progress()
    {
        return $this->hasMany(CourseProgress::class, 'student_id');
    }
    public function getProfilePictureAttribute()
    {
        // Return the path to the default profile picture
        return asset('images/profile.webp'); // Adjust the path as necessary
    }
}
