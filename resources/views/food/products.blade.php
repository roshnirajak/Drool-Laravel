@include('layouts.header')
<!-- food section -->

<section class="food_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <img src="images/heading-img.png" alt="" />
            <h2>Our Animal Food</h2>
            <p>
                It is a long established fact that a reader will be distracted by
                the readable content of a
            </p>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="food_container">
            @foreach ($foods as $food)
            <a href="{{ route('showProduct', ['id' => $food->id]) }}">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset($food->food_pic) }}" alt="{{ $food->fname }}" />
                    </div>
                    <div class="detail-box">
                        <h6>{{ $food->fname }}</h6>
                        <h3>₹{{ $food->price }}</h3>
                    </div>
                </div>
            </a>
            @endforeach



        </div>
    </div>
</section>

<!-- end food section -->

@include('layouts.footer')
