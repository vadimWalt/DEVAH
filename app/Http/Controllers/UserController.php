<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Password::min(6)->mixedCase()->numbers()->symbols()],
            'role' => 'required',
            'profile_picture' => ['required', Rule::imageFile()],
            // 'g-recaptcha-response' => 'required|captcha', // Add the CAPTCHA validation rule
        ]);
        // make sure the image is here before saving it
        if ($request->hasFile('profile_picture')) {

            $formFields['profile_picture'] = $request->file('profile_picture')->store('images/profilePictures', 'public');
        }

        // hash the password because we're good devs
        // to do it, we use the bcrypt function that will encrypt the value
        $formFields['password'] = bcrypt($formFields['password']);

        // create the new user
        $user = User::create($formFields);

        // using auth() helper handles all the login/logout process for us
        // it saves us an ENORMOUS amount of time
        auth()->login($user);

        // when user is created and logged in, we'll show them the homepage so they can start navigating the website
        return redirect('/')->with('message', 'User created and logged in !');
    }

    // Logout user
    public function logout(Request $request)
    {
        // log user out
        auth()->logout();

        // this will remove the authentication info from our session
        // additionnal requirement to invalidate their session and need to regenerate the user token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have logged out');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        // validate form fields like in register
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // attempt() tries to match the content of $formFields to a user in the table
        // if it found a matching user, it will log in automatically
        if (auth()->attempt($formFields)) {
            // generate a new session (to store the logged user data)
            $request->session()->regenerate();

            // redirect to homepage with a confirmation message
            return redirect('/')->with('message', 'You are now logged in !');
        }

        // go back to login form with error message for 'email' field
        // withErrors() allows to pass an error message instead of a flash message
        return back()->withErrors(['email' => 'Invalid credentials...']);
        // we don't write the exact error message to prevent people spamming random emails to find out which ones are used
    }
    public function edit($id)
    {
        $user = User::findOrFail($id); // Retrieve the logged-in user's data
        return view('users.edit')->with('user', $user);
    }

    public function updateUser(Request $request, $id)
    {
        Log::info('updateUser method called');
        $user = User::findOrFail($id);
        Log::info($user);
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'role' => 'required',
            'profile_picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'city' => 'required',
            'zip_code' => ['required', 'regex:/^[0-9]{4,}$/'],
            'street' => ['required', 'regex:/^[A-Za-z0-9\s]+$/'],
            'country' => 'required',
        ]);

        if ($request->hasFile('profile_picture')) {
            $formFields['profile_picture'] = $request->file('profile_picture')->store('images/profilePictures', 'public');
        }

        // update() changes the data in the table for us
        $user->save($formFields);

        return redirect('/users/' . $user->id)->with('message', 'Profile updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Auth::logout();
        return redirect('/')->with('message', 'User deleted successfully');
    }
}
