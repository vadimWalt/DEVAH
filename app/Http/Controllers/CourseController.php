<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Session\Session;

class CourseController extends Controller
{
    public function welcome()
    {
        $courses = Course::latest()->limit(3)->get();
        return view('welcome', compact('courses'));
    }

    // Display all courses
    public function index()
    {
        $courses = Course::latest()->paginate(6);
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
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        // Handle uploaded picture if provided
        if ($request->hasFile('picture')) {
            $validatedData["picture"] = $request->file('picture')->store('images/courses', 'public');
        }
        $validatedData["teacher_id"] = auth()->user()->id;

        $newCourse = Course::create($validatedData);

        // Create a chatroom for the course
        /* $chatroom = new ChatRoom();
        $chatroom->course_id = $course->id; // Associate chatroom with the course
        $chatroom->name = 'Course Chat'; // Set a default name for the chatroom
        $chatroom->creation_date = now(); // Set the creation date of the chatroom
        $chatroom->save(); */

        return redirect('/courses/' . $newCourse->id)->with('success', 'Course created successfully!');
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
        $myCourses = Course::where('teacher_id', $user->id)->get();

        // Manage student courses

        return view('courses.manage-course')->with('myCourses', $myCourses)->with('courses', auth()->user()->courses()->get());
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
            $picturePath = $request->file('picture')->store('images/courses', 'public');
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

    public function enroll(Request $request, Course $course)
    {
        auth()->user()->courses()->attach($course->id);
        return redirect()->back()->with('message', 'Enrolled successfully!');
    }


    public function unenroll(Request $request, Course $course)
    {
        // Detach the currently authenticated user from the course
        auth()->user()->courses()->detach($course->id);
        return redirect()->back()->with('message', 'Unenrolled successfully!');
    }
}
