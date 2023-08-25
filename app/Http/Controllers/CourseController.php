<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses[] = 0;
        return view('courses.index')->with('courses', $courses);
    }
}
