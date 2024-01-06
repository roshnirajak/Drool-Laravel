<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();

        if (isset($_COOKIE['userEmail']) || isset($_COOKIE['adminEmail'])) {
            return view('profile', compact('user'));
        }
        return view('auth.login');
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('editProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the form data
        $validator = $request->validate([
            'fname' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'profile_pic' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'profile_pic.image' => 'Image should be of jpeg,png,jpg format',
            'profile_pic.max' => 'Image should be of max 2048kb',
        ]);

        // Update user details
        /** @var User $user */
        $user->update([
            'fname' => $request->input('fname'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
        ]);

        // Handle profile picture update
        if ($request->hasFile('profile_pic')) {
            $uploadedFile = $request->file('profile_pic');
            $id = $user->id;

            $imageName = $id . '_' . time() . '.' . $uploadedFile->getClientOriginalExtension();

            // Move the uploaded file to the desired directory
            $uploadedFile->move(public_path('images/profile_pic'), $imageName);

            // Update the user's profile picture field in the database
            $user->profile_pic = 'images/profile_pic/' . $imageName;
            $user->save();
        }

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
