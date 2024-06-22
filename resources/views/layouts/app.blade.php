<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Sarifna Laundry</title>
    <link rel="icon" href="{{ asset('images/laundryLogo.jpg') }}"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/apps.js') }}" defer type="text/javascript"></script>

    

    @stack('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PF+Lindemann+Sans:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <nav>
                <div class="nav__logo"><a href="#">SARFINA LAUNDRY.</a></div>
                    <ul class="nav__links" id="nav-links">
                    <li class="link"><a href="#">Home</a></li>
                    <li class="link"><a href="#about">About</a></li>
                    <li class="link"><a href="#services">Services</a></li>
                    <li class="link"><a href="#contact">Contact</a></li>
                    <li class="link"><a href="#info">Info</a></li>
                    <li class="link"><a href="#founder">Founder</a></li>
                    <a class="nav-item nav-link signin {{ request()->is('signin') ? 'active' : '' }}" href="/signin">Sign In</a>
                    </ul>
                <div class="nav__menu__btn" id="menu-btn">
                <span><i class="ri-menu-line"></i></span>
                </div>
            </nav>  
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>
    <!-- <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© Copyright Sarifna Laundry 2024</span>
        </div>
    </footer> -->
    <script>

    </script>
</body>
</html>
