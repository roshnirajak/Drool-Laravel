@include('layouts.header')


<div class="container">
    <h2>Checkout</h2>
    <p>{{ $food->fname }} - ₹{{ $food->price }}</p>
    <form action="{{ route('product.payment', ['foodId' => $food->id]) }}" method="POST" id="razorpay-form" >
        @csrf
        {{-- {{ route('product.payment', ['foodId' => $food->id]) }} --}}
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY_ID') }}"
            data-amount="{{ $food->price * 100 }}" data-currency="INR" data-order_id="{{ $order->id }}"
            data-buttontext="Pay with Razorpay" data-name="Drool" data-description="{{ $food->fname }}"
            data-image="{{ asset($food->food_pic) }}" data-prefill.name="{{ auth()->user()->fname }}"
            data-prefill.email="{{ auth()->user()->email }}" data-theme.color="#F37254"></script>
    </form>

    </div>
@include('layouts.footer')
