<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

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
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()],
            // one other cool method is uncompromised(x)
            // it checks if the password has been found less then x times in data leaks
            //'password' => 'required|confirmed|min:6'  | = or
            'role' => 'required',
            'profile_picture' => [],
            'city' => 'required',
            'zip_code' => 'required',
            'street' => 'required',
            'country' => 'required',
        ]);

        // hash the password because we're good devs
        // to do it, we use the bcrypt function that will encrypt the value
        $formFields['password'] = bcrypt($formFields['password']);

        // create the new user
        $user = User::create($formFields);

        // using auth() helper handles all the login/logout process for us
        // it saves us an ENORMOUS amount of time
        auth()->login($user);

        // when user is created and logged in, we'll show them the homepage so they can start navigating the website
        return redirect('/manage')->with('message', 'User created and logged in !');
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

        return redirect('/')->with('message', 'You have been logged out');
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
}
