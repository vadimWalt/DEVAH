<?php

use App\Http\Controllers\QuizzController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


/*
|--------------------------------------------------------------------------
|                              QUIZZ ROUTE
|--------------------------------------------------------------------------
*/


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