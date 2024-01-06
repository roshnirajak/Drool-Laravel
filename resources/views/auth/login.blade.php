@include('layouts.header')
<!-- contact section -->

<section class="contact_section layout_padding-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <div class="form_container">
                    <div class="heading_container">
                        <img src="images/heading-img.png" alt="">
                        <h2>
                            Login
                        </h2>
                        <p>
                            Login Page Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusantium voluptate dicta atque in soluta,
                        </p>
                    </div>
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div>
                            <input type="email" name="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Password" />
                        </div>
                        <div class="d-flex ">
                            <button type="submit" name="loginBtn">
                                LOGIN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 px-0">
                <div class="map_container">

                </div>
            </div>
        </div>
    </div>
</section>

<!-- end contact section -->

@include('layouts.footer')
