<?php

use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\ChatMessage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// List all courses
Route::get('/courses', [CourseController::class, 'index']);

// Single course
Route::get('/courses/{course}', [CourseController::class, 'show']);

// Create course form
Route::get('/courses/create', [CourseController::class, 'create'])->middleware('auth'); 

// Store new course
Route::post('/courses', [CourseController::class, 'store'])->middleware('auth');

// Edit course form
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->middleware('auth');

// Update course
Route::put('/courses/{course}', [CourseController::class, 'update'])->middleware('auth');

// Delete course
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->middleware('auth');

// Manage courses
Route::get('/courses/manage', [CourseController::class, 'manage'])->middleware('auth');

// Show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// middleware('guest') checks if we are logged in and prevents 

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log user in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


// Store new chatMessage
Route::post('/chatMessage', [ChatMessageController::class, 'store'])->middleware('auth');
