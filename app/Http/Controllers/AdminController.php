<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\Food;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Use the Cookie facade to check if 'adminEmail' cookie exists
        if (Cookie::has('adminEmail')) {
            return view('admin.admin_panel', compact('user'));
        }
    }
    public function showAddFoodForm()
    {
        $user = Auth::user();
        return view('admin.addFood', compact('user'));
    }
    public function addFood(Request $request)
    {
        // Validate the form data
        $validator = $request->validate([
            'fname' => 'required|string',
            'price' => 'required|string',
            'quantity' => 'required|string',
            'about' => 'required|string',
            'animal' => 'required|string',
            'food_pic' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'seller' => 'required|string',
        ], [
            'food_pic.max' => 'Image should be less than 2048kb',
            'food_pic.image' => 'Image should be of jpeg,png,jpg format',
        ]);

        // Handle food picture upload
        $uploadedFile = $request->file('food_pic');
        $imageName = time() . '_' . $uploadedFile->getClientOriginalName();
        $uploadedFile->move(public_path('images/food_pic'), $imageName);

        // Create a new food record in the database
        Food::create([
            'fname' => $request->input('fname'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'about' => $request->input('about'),
            'animal' => $request->input('animal'),
            'food_pic' => 'images/food_pic/' . $imageName,
            'seller' => $request->input('seller'),
        ]);

        return redirect()->route('addFoodForm')->with('success', 'Food added successfully!');
    }
    public function showUserDetails()
    {
        $users = User::all();
        $user= Auth::user();
        return view('admin.userDetails', compact('users', 'user'));
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('showUserDetails')->with('success', 'User deleted successfully!');
    }
}
