<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course', 'course_id', 'user_id');
    }

    public function teacher()
    {
        return $this->users()->where('role', 'teacher')->first();
    }
}