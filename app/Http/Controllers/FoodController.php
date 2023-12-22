<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;

class FoodController extends Controller
{
    public function showAllProducts()
    {
        $user = auth()->user();
        $foods = Food::all();
        if ($user) {
            return view('products', compact('user', 'foods'));
        }
        return view('products', compact('foods'));
    }
    public function showProduct($id)
    {
        $food = Food::findOrFail($id);
        $user = auth()->user();
        if ($user) {
            return view('showProduct', compact('user','food'));
        }
        return view('showProduct', compact('food'));
        // return redirect()->route('login')->with('error', 'Please log in to buy food.');
    }

}