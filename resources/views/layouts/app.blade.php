<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubbles & Suds</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PF+Lindemann+Sans:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/laundryLogo.jpg" alt="Logo" style="height: 50px; margin-left: 2rem;">
                <span class="brand-name">
                    <span class="letter">B</span>
                    <span class="letter">u</span>
                    <span class="letter">b</span>
                    <span class="letter">b</span>
                    <span class="letter">l</span>
                    <span class="letter">e</span>
                    <span class="letter">s</span>
                    {{-- Non-breaking space --}}
                    <span class="letter">&</span>
                    {{-- Non-breaking space --}}
                    <span class="letter">S</span>
                    <span class="letter">u</span>
                    <span class="letter">d</span>
                    <span class="letter">s</span>
                </span>
            </a>
            <!-- Phone number with Font Awesome icon -->
            <div class="phone-number">
                <i class="fas fa-phone"></i>
                <span>+1-234-567-8900</span>
            </div>
            <nav class="navbar-nav ml-auto">
                <a class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                <a class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a>
                <a class="nav-item nav-link {{ request()->is('services') ? 'active' : '' }}" href="/services">Services</a>
                <a class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
                <a class="nav-item nav-link signin {{ request()->is('signin') ? 'active' : '' }}" href="/signin">Sign In</a>
            </nav>
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© Copyright Bubbles & Suds 2024</span>
        </div>
    </footer>
    <script>

    </script>
</body>
</html>
