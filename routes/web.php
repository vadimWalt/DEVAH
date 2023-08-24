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
Route::get('/test', [CourseController::class, 'index']);

Route::get('/courses', function () {
    return view('courses.index');
});

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
