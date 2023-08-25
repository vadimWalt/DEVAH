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
// Route::get('/test', [CourseController::class, 'test']);

Route::get('/courses', [CourseController::class, 'index']);


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
Route::get('/contact', 'ContactController@show')->name('contact.show');
Route::post('/contact', 'ContactController@store')->name('contact.store');



/*
|--------------------------------------------------------------------------
|                       HANDLING MESSAGES
|--------------------------------------------------------------------------
*/
// Store new chatMessage
// to post a new message in the chat room
Route::post('/chatMessage', [ChatMessageController::class, 'store'])->middleware('auth');
