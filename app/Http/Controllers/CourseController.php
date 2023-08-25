<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = 0;
        return view('courses.index')->with('courses', $courses);
    }

    public function show(Course $course)
    {
        return view('courses.show')->with('course', $course);
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'picture' => 'required|url',
            'description' => 'required',
            'content' => 'required',
        ]);

        $course = new Course();
        $course->teacher_id = Auth::user()->id;
        $course->title = $validatedData['title'];
        $course->picture = $validatedData['picture'];
        $course->description = $validatedData['description'];
        $course->content = $validatedData['content'];
        $course->save();

        return redirect('/courses/' . $course->id);
    }


}
