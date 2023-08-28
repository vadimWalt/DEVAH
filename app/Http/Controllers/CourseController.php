<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    public function welcome()
    {
        $courses = Course::inRandomOrder()->take(6)->get();
        return view('welcome', compact('courses'));
    }

    // Display all courses
    public function index()
    {
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);
    }

    // Display a single course
    public function show(Course $course)
    {
        return view('courses.show')->with('course', $course);
    }

    // Show the course creation form
    public function create()
    {
        return view('courses.create');
    }

    // Store a new course
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'content' => 'required',
        ]);

        // Check if a course with the same title, description, and content already exists
        $existingCourse = Course::where('title', $validatedData['title'])
            ->where('description', $validatedData['description'])
            ->where('content', $validatedData['content'])
            ->first();

        if ($existingCourse) {
            return redirect()->back()->with('error', 'A course with the same content already exists.');
        }

        $course = new Course();
        $course->teacher_id = Auth::user()->id;
        $course->title = $validatedData['title'];
        $course->picture = $validatedData['picture'];
        $course->description = $validatedData['description'];
        $course->content = $validatedData['content'];
        $course->save();

        return redirect('/courses/' . $course->id)->with('success', 'Course created successfully!');
    }

    // Show the course edit form
    public function editCourse(Course $course)
    {
        return view('courses.edit-course')->with('course', $course);
    }

    // Manage the courses
    public function manageCourses()
    {
        $user = Auth::user();
        $teacherCourses = Course::where('teacher_id', $user->id)->get();
        return view('courses.manage-course')->with('teacherCourses', $teacherCourses);
    }

    // Update an existing course
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'content' => 'required',
        ]);

        // Update the course details
        $course->title = $validatedData['title'];
        $course->description = $validatedData['description'];
        $course->content = $validatedData['content'];

        // Check if a new picture is provided
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('course_pictures', 'public');
            $course->picture = $picturePath;
        }

        $course->save();

        return redirect('/courses/' . $course->id)->with('success', 'Course updated successfully!');
    }

    // Delete a course
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }
}
