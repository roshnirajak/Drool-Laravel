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
                            Register
                        </h2>
                        <p>
                            Register Page Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias accusantium
                            voluptate dicta atque in soluta,
                        </p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('/register') }}" method="post">
                        @csrf
                        <div>
                            <input type="text" name="fname" placeholder="Full Name " required />
                        </div>
                        <div>
                            <input type="text" name="phone_number" placeholder="Phone number" required />
                        </div>
                        <div>
                            <input type="text" name="address" placeholder="Address" required />
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Email" required />
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Password" required />
                        </div>
                        <div class="d-flex ">
                            <button type="submit" name="registerBtn">
                                REGISTER
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
