<!-- info.blade.php -->
<!-- Section untuk bagian info -->
<section class="info" id="info">
    <!-- Container utama untuk bagian info -->
    <div class="section__container info__container">
        <!-- Konten untuk bagian subheader info -->
        <div class="info__content">
            <p class="section__subheader">More Info</p>
        </div>
        <!-- Container untuk form pendaftaran dan masuk -->
        <div class="container" id="container">
            <!-- Form container untuk pendaftaran -->
            <div class="form-container sign-up">
                <!-- Form untuk pendaftaran -->
                <div class="form">
                    <h1>Hi There!</h1>
                    <p>Expand your Sarifna Laundry experience by registering for an account today! Enjoy exclusive benefits and access to our full range of services by signing up now.</p>
                    <!-- Tombol untuk Sign Up -->
                    <a class="btnInfo nav-item nav-link signin {{ request()->is('signin') ? 'active' : '' }}" href="/signup">Sign Up</a>
                </div>
            </div>
            <!-- Form container untuk masuk -->
            <div class="form-container sign-in">
                <!-- Form untuk masuk -->
                <div class="form">
                    <h1>Welcome Back</h1>
                    <p>We're delighted to see you again. Please log in to access your account and enjoy our premium laundry services. Thank you for continuing to choose Sarifna Laundry for your laundry needs!</p>
                    <!-- Tombol untuk Sign In -->
                    <a class="btnInfo nav-item nav-link signin {{ request()->is('signin') ? 'active' : '' }}" href="/signin">Sign In</a>
                </div>
            </div>
            <!-- Container untuk toggle antara Sign In dan Sign Up -->
            <div class="toggle-container">
                <div class="toggle">
                    <!-- Panel toggle kiri untuk Sign In -->
                    <div class="toggle-panel toggle-left">
                        <p>Enter your personal details to use all of site features</p>
                        <img src="assets/images/login.jpg" />
                        <button class="hidden" id="login">
                            Sign In
                            <span><i class="ri-arrow-right-double-line"></i></span>
                        </button>
                    </div>
                    <!-- Panel toggle kanan untuk Sign Up -->
                    <div class="toggle-panel toggle-right">
                        <img src="assets/images/signin.jpg" />
                        <p>Register with your personal details to use all of site features</p>
                        <button class="hidden" id="register">
                            <span><i class="ri-arrow-left-double-line"></i></span>
                            Sign Up
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Link ke stylesheet untuk halaman info -->
<link rel="stylesheet" href="{{ asset('css/info.css') }}">
