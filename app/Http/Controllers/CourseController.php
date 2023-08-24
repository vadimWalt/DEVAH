<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    public function index()
    {

        // Make the API request
        $response = Http::get('https://learn.microsoft.com/api/catalog');

        // Process the response
        $data = $response->json(); // Convert the JSON response to an array
        $courses = $data;
        // Pass the courses data to the 'courses.index' view
        return view('courses.index')->with('courses', $courses);
    }
}


// Import the HTTP client at the top of your controller or wherever you're making the request
