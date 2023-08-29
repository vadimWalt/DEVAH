<?php

use App\Http\Controllers\QuizzController;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\ChatRoomController;


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
Route::get('/courses/{course}/edit', [CourseController::class, 'editCourse'])->middleware('auth')->name('courses.edit-course');

// Update course
Route::put('/courses/{course}', [CourseController::class, 'update'])->middleware('auth')->name('courses.update');

// Delete course
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->middleware('auth')->name('courses.destroy');


// Manage courses
Route::get('/courses/manage', [CourseController::class, 'manage'])->middleware('auth');

// Single course
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

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
Route::get('/contact', [ContactController::class, 'show'])->middleware("guest");
Route::post('/contact', [ContactController::class, 'store'])->middleware("guest");



/*
|--------------------------------------------------------------------------
|                       HANDLING MESSAGES
|--------------------------------------------------------------------------
*/
// Store new chatMessage
// to post a new message in the chat room
Route::post('/chatMessage', [ChatMessageController::class, 'store'])->middleware('auth');


/*
|--------------------------------------------------------------------------
|                                   QUUUIIIIZZZZZZ
|--------------------------------------------------------------------------
*/

Route::get("/quiz",[QuizzController::class,"index"])->middleware("guest");
Route::get("/quiz/display", [QuizzController::class, "displayQuizz"])->middleware("guest");
Route::post("/quiz/results",[QuizzController::class,"displayCorrection"])->middleware("guest");

/*
|--------------------------------------------------------------------------
|                               random pages
|--------------------------------------------------------------------------
*/

/**same but different */
Route::get('/aboutus', function () {
    return view('aboutus');
});



/*    
here is the routes for the show chat messages */


Route::get('/chatmessages', [ChatMessageController::class, 'index'])->name('chatmessage.index');
Route::post('/message', [ChatMessageController::class, 'store']);

/*
here's the route to for the chatroom 
*/

// Route::get('/chatroom/{id}', [ChatRoomController::class, 'show']);
Route::get('/chatroom/{chat_room_id}', [ChatRoomController::class, 'show'])->name('chatroom.show');




/*
Naming conventions
- index = show all listings
- show = show one listing
- create = show form to create new listing
- store = store new listing in the DB (on create form submit)
- edit = show form to edit listing
- update = update listing in DB (on edit form submit)
- destroy = delete listing in DB
*/