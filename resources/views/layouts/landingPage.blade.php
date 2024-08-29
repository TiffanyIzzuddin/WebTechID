<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title', 'WebTechID')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" href="{{ asset('images/compressed-logo.png') }}" type="image/logo">
</head>

<body>
    <header>
        <div class="logo">WebTechID</div>
        <nav>
            <a href="#">Portfolio</a>
            <a href="#">Blog</a>
            <a href="#">Login</a>
        </nav>
    </header>

    {{-- <img src="{{ asset('images/slider-dec.png') }}" alt="" /> --}}
    <img src="{{ asset('images/horizontal-logo.png') }}"alt="">

    <div class="grid-container">
        <div class="card card-large"></div>
        <div class="card card-small"></div>
        <div class="card card-small"></div>
        <div class="card card-large"></div>
        <div class="card card-small"></div>
        <div class="card card-small"></div>
        <div class="card card-medium"></div>
        <div class="card card-medium"></div>
    </div>

    <footer>
        <p>Designed by Tiffany Azhar</p>
        <div class="social-icons">
            <span>📘</span>
            <span>📷</span>
            <span>🐦</span>
        </div>
    </footer>
</body>

</html>

<style>
   
   </style>