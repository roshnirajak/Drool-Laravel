<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Drool</title>

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/responsive.css') }}" />
</head>

<body>

    <!-- header section strats -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="/images/logo.png" alt="">
                </a>

                @isset($_COOKIE['adminEmail'])
                    <a href="{{ url('/admin') }}">
                        <button class="btn btn-link">Admin Panel</button>
                    </a>
                
                @endisset
                @if(isset($_COOKIE['userEmail']))
                    
                <a class="profile-pic" href="{{ url('/profile') }}">
                    <div class="profile-pic-container">
                        @isset($user)
                        <img src="/{{$user->profile_pic}}" height="100px" alt="">
                        
                        @endisset
                    </div>
                </a>
                <div class="logout">
                    <form action="{{ url('/logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link">Logout</button>
                    </form>
                </div>

                @else
                <a href="{{ url('/login') }}">
                    <button class="btn btn-link">Login</button>
                </a>
                <a href="{{ url('/register') }}">
                    <button class="btn btn-link">Register</button>
                </a>
                @endif




                <div class="" id="">
                    <div class="User_option">
                        <form class="form-inline my-2  mb-3 mb-lg-0">
                            <input type="search" placeholder="Search">
                            <button class="btn   my-sm-0 nav_search-btn" type="submit"></button>
                        </form>
                    </div>


                    <div class="custom_menu-btn">
                        <button onclick="openNav()">
                            <span class="s-1">

                            </span>
                            <span class="s-2">
                            </span>
                            <span class="s-3">

                            </span>
                        </button>
                    </div>
                    <div id="myNav" class="overlay">
                        <div class="overlay-content">
                            <a href="{{ url('/') }}">Home</a>
                            <a href="{{ url('/about') }}">About</a>
                            <a href="{{ url('/products') }}">Purchase Food</a>
                            <a href="{{ url('/contact') }}">Contact Us</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
    </div>
