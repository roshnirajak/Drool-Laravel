<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Payment;
use Razorpay\Api\Api;
class FoodController extends Controller
{
    public function showAllProducts()
    {
        $user = auth()->user();
        $foods = Food::all();
        if ($user) {
            return view('food.products', compact('user', 'foods'));
        }
        return view('food.products', compact('foods'));
    }
    public function showProduct($id)
    {
        $food = Food::findOrFail($id);
        $user = auth()->user();
        if ($user) {
            return view('food.showProduct', compact('user', 'food'));
        }
        return view('food.showProduct', compact('food'));
        // return redirect()->route('login')->with('error', 'Please log in to buy food.');
    }
    public function initiatePayment($foodId)
    {
        $user = auth()->user();
        $food = Food::findOrFail($foodId);

        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        $order = $api->order->create([
            'amount' => $food->price * 100, // Amount should be in paise
            'currency' => 'INR',
            'receipt' => 'order_' . $food->id,
            'payment_capture' => 1, // Auto-capture payment
        ]);

        return view('food.checkout', compact('food', 'order', 'user'));
    }
    public function processPayment(Request $request, $foodId)
    {
        // Fetch the food item
        $food = Food::findOrFail($foodId);

        // Verify the payment response from Razorpay
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        $attributes = [
            'razorpay_order_id' => $request->input('razorpay_order_id'),
            'razorpay_payment_id' => $request->input('razorpay_payment_id'),
            'razorpay_signature' => $request->input('razorpay_signature'),
        ];

        try {
            $api->utility->verifyPaymentSignature($attributes);

            
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'Payment verification failed.');
        }
        Payment::create([
            'r_payment_id' => $request->input('razorpay_payment_id'),
            'user_email' => auth()->user()->email,
            'product_name' => $food->fname,
            'amount' => $food->price,
            'json_response' => json_encode($request->all()),
        ]);

        return redirect()->route('index')->with('success', 'Payment successful!');
    }
    public function addToCart($foodId){
        return redirect()->route('index')->with('success', $foodId);
    }
}
