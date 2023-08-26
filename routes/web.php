<?php

use App\Http\Controllers\QuizzController;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatMessageController;

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


/*
|--------------------------------------------------------------------------
|                       HANDLING COURSES
|--------------------------------------------------------------------------
*/

// List all courses
Route::get('/courses', [CourseController::class, 'index']);

// Create new course
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

// Single course
Route::get('/courses/{course}', [CourseController::class, 'show']);

/*
|--------------------------------------------------------------------------
|                       HANDLING USERS
|--------------------------------------------------------------------------
*/


// Show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// middleware('guest') checks if we are logged in and prevents 

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Show edit user form
Route::get('/users/{id}/profile', [UserController::class, 'edit'])->middleware('auth');

// Update listing
Route::put('/users/{id}', [UserController::class, 'update'])->middleware('auth');

// Delete listing
Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('auth');

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log user in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

/*
|--------------------------------------------------------------------------
|                       CONTACT US FORM AND POST ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store']);



/*
|--------------------------------------------------------------------------
|                       HANDLING MESSAGES
|--------------------------------------------------------------------------
*/
// Store new chatMessage
// to post a new message in the chat room
Route::post('/chatMessage', [ChatMessageController::class, 'store'])->middleware('auth');


Route::get("/quiz",[QuizzController::class,"index"]);
Route::get("/quiz/display", [QuizzController::class, "displayQuizz"]);
Route::post("/quiz/results",[QuizzController::class,"displayCorrection"]);

/*
|--------------------------------------------------------------------------
|                               random pages
|--------------------------------------------------------------------------
*/

/**same but different */
Route::get('/aboutus', function () {
    return view('aboutus');
});