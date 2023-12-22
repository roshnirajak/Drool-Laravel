<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'fname' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
                'password.min' => 'The password must be at least :min characters.',
                'email.unique' => 'The email address is already in use.',
            ]);


        // Create a new user
        $user = User::create([
            'fname' => $request->input('fname'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        // Set a cookie
        $userEmail = $user->email;
        $cookie = cookie('userEmail', $userEmail, 60);

        return redirect()->route('profile')->with('success', 'Registration successful!');
    }
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user is an admin
            if ($user->admin == 1) {
                $adminCookie = cookie('adminEmail', $user->email, 60);
            }

            // Set the userEmail cookie
            $userEmail = $request->input('email');
            $userCookie = cookie('userEmail', $userEmail, 60);

            // Redirect to the profile page
            if (isset($adminCookie)) {
                return redirect()->route('profile')->withCookies([$userCookie, $adminCookie ?? null])->with('success', 'Login successful!');
            } else {
                return redirect()->route('profile')->withCookie($userCookie)->with('success', 'Login successful!');
            }
        }

        // Authentication failed
        return redirect()->route('login')->with('error', 'Invalid credentials. Please try again.');
    }

    public function logout()
    {
        Auth::logout();

        // Clear the 'userEmail' cookie
        $userCookie = Cookie::forget('userEmail');
        $adminCookie = Cookie::forget('adminEmail');
        if (isset($adminCookie)) {
            return redirect()->route('index')->withCookies([$userCookie, $adminCookie ?? null])->with('success', 'Logout successful!');
        } else {
            return redirect()->route('index')->withCookie($userCookie)->with('success', 'Logout successful!');
        }

    }
}