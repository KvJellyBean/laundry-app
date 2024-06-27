<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata dasar untuk dokumen HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Judul dan ikon situs -->
    <title>Sarifna Laundry</title>
    <link rel="icon" href="{{ asset('assets/images/laundrylogo.png') }}">
    
    <!-- Link ke stylesheet utama -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Link ke script JavaScript utama -->
    <script src="{{ asset('assets/js/apps.js') }}" defer type="text/javascript"></script>
    
    <!-- Menambahkan style dari stack lain -->
    @stack('styles')
    
    <!-- Link ke jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Link untuk font dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PF+Lindemann+Sans:wght@800&display=swap" rel="stylesheet">
    
    <!-- Link ke font-awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Link ke Leaflet untuk peta -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    
    <!-- Link ke Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>
    
    <!-- Link ke Swiper untuk carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    
    <!-- Script untuk Leaflet -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <!-- Bagian header dengan navbar -->
    <header class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <nav>
                <!-- Logo navigasi -->
                <div class="nav__logo"><a href="/">SARIFNA LAUNDRY.</a></div>
                
                <!-- Daftar link navigasi -->
                <ul class="nav__links" id="nav-links">
                    <li class="link"><a href="/">Home</a></li>
                    <li class="link"><a href="/about">About</a></li>
                    <li class="link"><a href="/services">Services</a></li>                    
                    <li class="link"><a href="/contact">Contact</a></li>
                    @if(Auth::check())
                        <li class="link"><a href="/dashboard">Dashboard</a></li>
                        <li class="nav-item nav-link signin {{ request()->is('signin') ? 'active' : '' }}">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <!-- Form untuk logout -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li class="link"><a href="/#founder">Founder</a></li>
                        <li class="nav-item nav-link signin {{ request()->is('signin') ? 'active' : '' }}"><a href="/signin">Sign In</a></li>
                    @endif
                </ul>
                
                <!-- Tombol menu untuk navigasi responsive -->
                <div class="nav__menu__btn" id="menu-btn">
                    <span><i class="ri-menu-line"></i></span>
                </div>
            </nav>  
        </div>
    </header>

    <!-- Container untuk konten utama -->
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
