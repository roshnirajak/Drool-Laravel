<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;

class DemoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            return view('home', compact('user'));
        }
        return view('home');
    }
    public function about()
    {
        $user = auth()->user();
        if ($user) {
            return view('about', compact('user'));
        }
        return view('about');
    }
    public function contact()   
    {
        $user = auth()->user();
        if ($user) {
            return view('contact', compact('user'));
        }
        return view('contact');
    }
    public function profile()
    {
        $user = auth()->user();
        if ($user) {
            return view('profile', compact('user'));
        }
        return view('profile');
    }

}