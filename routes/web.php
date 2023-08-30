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

Route::get('/', [CourseController::class, 'welcome'])->name('welcome');

/*
|--------------------------------------------------------------------------
|                       HANDLING COURSES
|--------------------------------------------------------------------------
*/

// List all courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// Create new course
Route::get('/courses/create', [CourseController::class, 'create'])->middleware('auth')->name('courses.create');

// Store new course
Route::post('/courses', [CourseController::class, 'store'])->middleware('auth');

// Edit course form
Route::get('/courses/{course}/edit', [CourseController::class, 'editCourse'])->middleware('auth')->name('courses.edit-course');

// Update course
Route::put('/courses/{course}', [CourseController::class, 'update'])->middleware('auth')->name('courses.update');

// Delete course
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->middleware('auth')->name('courses.destroy');

// Manage courses
Route::get('/manage-courses', [CourseController::class, 'manageCourses'])->middleware('auth')->name('manage.courses');

// Single course
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');



/********  ENROLL TO A COURSE AS STUDENT ********/

// Enroll course form
Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->middleware('auth')->name('courses.enroll');

// Un-enroll course form
Route::post('/courses/{course}/unenroll', [CourseController::class, 'unenroll'])->middleware('auth')->name('courses.unenroll');


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

// Update user
Route::put('/users/{id}', [UserController::class, 'updateUser'])->middleware('auth');

// Delete user
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


/*
|--------------------------------------------------------------------------
|                                   QUUUIIIIZZZZZZ
|--------------------------------------------------------------------------
*/

Route::get("/quiz", [QuizzController::class, "index"]);
Route::get("/quiz/display", [QuizzController::class, "displayQuizz"]);
Route::post("/quiz/results", [QuizzController::class, "displayCorrection"]);

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
Route::get('/chatmessages/create', [ChatMessageController::class, 'create'])->name('chatmessage.create');
Route::post('/chatmessages', [ChatMessageController::class, 'store'])->name('chatmessage.store');

/*
here's the route to for the chatroom 
*/

Route::get('/chatroom', [ChatRoomController::class, 'show'])->name('chatroom.show');
