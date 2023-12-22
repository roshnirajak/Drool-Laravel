@include('layouts.header');
<div class="d-flex justify-content-center">
    <div class="card text-center">
        <div class="card-header">
            Buy Animal Food
        </div>
        <div class="card-body">
            <img src="/{{ $food->food_pic }}" alt="food" height="300px">
            <h5 class="card-title">{{ $food->fname }}</h5>
            <h5 class="card-title">₹{{ $food->price }}</h5>
            <div style="text-align: left">
                <p class="card-text"><b>About: </b>{{ $food->about }}</p>
                <p class="card-text"><b>For Animal: </b>{{ $food->animal }}</p>
                <p class="card-text"><b>Seller: </b>{{ $food->seller }}</p>
            </div>
            <br>
            <a href="#" class="btn btn-success">Buy Now</a>
        </div>
        <div class="card-footer text-muted">
            {{-- 2 days ago --}}
        </div>
    </div>
</div>
@include('layouts.footer');
