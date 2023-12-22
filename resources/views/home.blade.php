

@include('layouts.header')

<!-- slider section -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="hero_area">
<section class="slider_section">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5 offset-md-1">
                            <div class="detail-box">
                                <div class="number">

                                </div>
                                <h1>
                                    Drool <br>
                                    <span>
                                        Pet And Animal
                                    </span>
                                </h1>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                </p>
                                <div class="btn-box">
                                    <a href="" class="btn-1">
                                        Read More
                                    </a>
                                    <a href="{{ url('/products') }}" class="btn-2">
                                        Purchase Food
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-box">
                                <img src="images/slider-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end slider section -->
</div>



<!-- pet section -->

<section class="pet_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="img-box">
                    <img src="images/pet-img.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <img src="images/heading-img.png" alt="">
                        <h2>
                            Caring for your pets
                        </h2>
                    </div>
                    <p>
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                    </p>
                    <div class="btn-box">
                        <a href="">
                            <span>
                                Read More
                            </span>
                            <img src="images/link-arrow.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end pet section -->

<!-- us section -->

<section class="us_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container">
            <img src="images/heading-img.png" alt="">
            <h2>
                Why Choose Us
            </h2>
            <p>
                It is a long established fact that a reader will be distracted by the readable content of a
            </p>
        </div>
        <div class="us_container">
            <div class="box">
                <div class="img1-box">
                    <img src="images/pet1.png" alt="">
                </div>
                <div class="img2-box">
                    <img src="images/omega.png" alt="">
                </div>
                <div class="detail-box">
                    <h6>
                        PET NUTRITIONISTS
                    </h6>
                </div>
            </div>
            <div class="box">
                <div class="img1-box">
                    <img src="images/pet2.png" alt="">
                </div>
                <div class="img2-box">
                    <img src="images/dog.png" alt="">
                </div>
                <div class="detail-box">
                    <h6>
                        STANDARDS
                    </h6>
                </div>
            </div>
            <div class="box">
                <div class="img1-box">
                    <img src="images/pet2.png" alt="">
                </div>
                <div class="img2-box">
                    <img src="images/shield.png" alt="">
                </div>
                <div class="detail-box">
                    <h6>
                        QUALITY & SAFETY
                    </h6>
                </div>
            </div>
        </div>
        <div class="btn-box">
            <a href="">
                <span>
                    Read More
                </span>
                <img src="images/link-arrow.png" alt="">
            </a>
        </div>
    </div>
</section>

<!-- end us section -->

<!-- client section -->

<section class="client_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <img src="images/heading-img.png" alt="">
            <h2>
                What Says Our Customer
            </h2>
            <p>
                It is a long established fact that a reader will be distracted by the
            </p>
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/client.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Jack Mengo
                            </h4>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable cIt is a long established fact that a reader will be distracted by the readable c
                            </p>
                            <img src="images/quote.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/client.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Jack Mengo
                            </h4>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable cIt is a long established fact that a reader will be distracted by the readable c
                            </p>
                            <img src="images/quote.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/client.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Jack Mengo
                            </h4>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable cIt is a long established fact that a reader will be distracted by the readable c
                            </p>
                            <img src="images/quote.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_btn-box">
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- end client section -->
@include('layouts.info')
@extends('layouts.footer')
</body>

</html>
