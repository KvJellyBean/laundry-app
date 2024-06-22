<!-- home.blade.php -->
@extends('layouts.app')

@section('content')
<header>
    <div class="section__container header__container" id="home">
        <h1>Drop off your clothes and pick them up clean and fresh.</h1>
        <button class="btn btn__secondary">
            Read More
            <span><i class="ri-arrow-right-double-line"></i></span>
        </button>
    </div>
</header>

<section class="about" >
  <div class="section__container about__container">
    <div class="about__grid">
      <div class="about__content">
        <p id="about" class="section__subheader">About Us</p>
        <h2 class="section__header">Sarfina Laundry</h2>
        <p class="para">
          At Sarifna Laundry, we pride ourselves on delivering top-notch laundry services with a commitment to quality and customer satisfaction. With years of experience in the industry, our dedicated team uses state-of-the-art equipment and eco-friendly detergents to ensure your clothes are impeccably clean and well-cared for. We offer a wide range of services, including washing, drying, folding, and specialized stain removal, catering to both everyday laundry needs and delicate garment care.
        </p>
        <br />
        <p class="para">
          Conveniently located and open seven days a week, we also provide free pickup and delivery options to make your laundry experience as hassle-free as possible. At Sarifna Laundry, your clothes are in good hands, and our mission is to make your life easier, one clean load at a time.
        </p>
      </div>
      <div class="about__list">
        <div class="about__item">
          <span><i class="ri-time-fill"></i></span>
          <h4>Fast and reliable service</h4>
        </div>
        <div class="about__item">
          <span><i class="ri-thumb-up-fill"></i></span>
          <h4>Guaranteed affordable and budget-friendly prices</h4>
        </div>
        <div class="about__item">
          <span><i class="ri-star-fill"></i></span>
          <h4>Spotless and fragrant laundry</h4>
        </div>
        <div class="about__item">
          <span><i class="ri-lock-fill"></i></span>
          <h4>Ensuring Safety and Security</h4>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="services" id="services">
  <div class="section__container services__container">
    <p class="section__subheader">Our Services</p>
    <h2 class="section__header">Service Package</h2>
      <div class="services__grid">
        <div class="services__card">
          <img src="assets/images/cuci.jpg" alt="services" />
          <h4>Cuci</h4>
          <p>
            Our Cuci service ensures your clothes are not only
            clean, but also well-ironed and ready to wear.
          </p>
        </div>
        <div class="services__card">
          <img src="assets/images/setrikaCOPY.jpg" alt="services" />
          <h4>Setrika</h4>
          <p>
            Our Setrika service ensures your clothes are not
            only clean, but also well-ironed and ready to wear.
          </p>
        </div>
        <div class="services__card">
          <img src="assets/images/cucikomplit.png" alt="services" />
          <h4>Cuci Komplit</h4>
          <p>
            Our Cuci Komplit service provides a complete
            cleaning solution for your clothes, ensuring they
            are thoroughly cleaned, dried, and folded.
          </p>
        </div>
    </div>
  </div>
</section>



<section class="contact" id="contact">
  <div class="section__container contact__container">
    <div class="contact__content">
      <div class="contact__Decsription">
        <p class="section__subheader">Our Contact</p>
        <h2 class="section__header">Contact</h2>
        <p class="para">
          Sarfina Laundry is a leading laundry service provider committed to delivering impeccable cleanliness and convenience to its clientele. Whether it's everyday laundry needs or delicate garment care, our team, boasting years of industry experience, stands ready to provide top-notch service. Conveniently open seven days a week, we offer free pickup and delivery options to make the laundry experience hassle-free. 
        </p>
      </div>

      <div class="contact__image">
        <img src="assets/images/setrika.jpg" alt="contact" />
      </div>   

      <div class="contact__grid">
        <div class="contact__card">
          <span><i class="ri-phone-line"></i></span>
          <h4>PHONE</h4>
          <p>0812-8043-999</p>
        </div>
        <div class="contact__card">
          <span><i class="ri-building-4-fill"></i></span>
          <h4>LOCATION</h4>
          <p>Jl. Tanjung Gedong RT. 004/RW. 016 No.2 Jakarta Barat</p>
        </div>
      </div>
    </div>


  </div>
  <div style="background-color: var(black);">
    <h2 style="text-align: center;">Find Us on the Map</h2>
    <div id="map" style="height: 400px;"></div></div>
</section>  

<section class="info" id="info">
  <div class="section__container info__container">
    <div class="info__content">
      <p class="section__subheader">More Info</p>
    </div>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <div class="form" >
          <h1>Hi There!</h1>
          <p>Expand your Sarifna Laundry experience by registering for an account today! Enjoy exclusive benefits and access to our full range of services by signing up now.</p>
          <a id="founder" class="nav-item nav-link signin {{ request()->is('signin') ? 'active' : '' }}" href="/">Sign Up</a>
          
        </div>
      </div>
      <div class="form-container sign-in">
        <div class="form">
          <h1>Welcome Back</h1>
          <p>We're delighted to see you again. Please log in to access your account and enjoy our premium laundry services. Thank you for continuing to choose Sarifna Laundry for your laundry needs!</p>
          <a class="nav-item nav-link signin {{ request()->is('signin') ? 'active' : '' }}" href="/signin">Sign In</a>
        </div>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <p>Enter your personal details to use all of site features</p>
            <img src="assets/images/login.jpg" />
            <button class="hidden" id="login">
              Sign In
              <span><i class="ri-arrow-right-double-line"></i></span>
            </button>
          </div>
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
</section>

<section class="customer">
  <div class="section__container customer__container">
    <p class="section__subheader">Founder</p>
    <h2 class="section__header">Meet Our Founder</h2>
    <div class="customer__review">
      <!-- Slider main container -->
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide">
            <div class="customer__review__card">
              <span><i class="ri-double-quotes-r"></i></span>
              <div class="customer__review__details">
                <div class="customer__review__image">
                  <img src="assets/images/kevin.png" alt="customer" />
                </div> 
                <div>
                  <h4>Kevin Natanael</h4>
                  <h5>535220084</h5>
                </div>
              </div>
              <div class="footer__socials">
                <a href="#"><i class="ri-facebook-fill"></i></a>
                <a href="#"><i class="ri-twitter-fill"></i></a>
                <a href="#"><i class="ri-instagram-line"></i></a>  
                <a href="#"><i class="ri-linkedin-fill"></i></a>      
              </div>
              <p>Welcome to Sarifna Laundry, where we're redefining clean living with passion and innovation.</p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="customer__review__card">
              <span><i class="ri-double-quotes-r"></i></span>
              <div class="customer__review__details">
                <div class="customer__review__image">
                  <img src="assets/images/ari.png" alt="customer" />
                </div> 
                <div>
                  <h4>Ari Wijaya</h4>
                  <h5>535220060</h5>
                </div>
              </div>
              <div class="footer__socials">
                <a href="#"><i class="ri-facebook-fill"></i></a>
                <a href="#"><i class="ri-twitter-fill"></i></a>
                <a href="#"><i class="ri-instagram-line"></i></a>  
                <a href="#"><i class="ri-linkedin-fill"></i></a>      
              </div>
              <p>Experience the difference at Sarifna Laundry, where quality meets convenience for all your laundry needs.</p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="customer__review__card">
              <span><i class="ri-double-quotes-r"></i></span>
              <div class="customer__review__details">
                <div class="customer__review__image">
                  <img src="assets/images/Richard.png" alt="customer" />
                </div> 
                <div>
                  <h4>Richard Vincentius</h4>
                  <h5>535220077</h5>
                </div>
              </div>
              <div class="footer__socials">
                <a href="#"><i class="ri-facebook-fill"></i></a>
                <a href="#"><i class="ri-twitter-fill"></i></a>
                <a href="#"><i class="ri-instagram-line"></i></a>  
                <a href="#"><i class="ri-linkedin-fill"></i></a>      
              </div>
              <p>"Join us in our mission to elevate everyday chores into exceptional experiences, one wash at a time.</p>
              
            </div>
          </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="section__container footer__container">
    <div class="footer__col">
      <h5><a href="#">Sarfina Laundry.</a></h5>
      <p>Discover the pinnacle of laundry care at Sarifna Laundry, where quality and convenience converge seamlessly.</p>
    </div>
    <div class="footer__col">
      <h4>Quick Links</h4>
      <div class="footer__links"      >
        <a href="#">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#contact">Contact</a>
        <a href="#info">Info</a>
        <a href="#founder">Founder</a>      
      </div>      
    </div>
    <div class="footer__col">
      <h4>Our Services</h4>
        <div class="footer__links">
          <a href="#services">Cuci</a>
          <a href="#services">Setrika</a>
          <a href="#services">Cuci Komplit</a>
        </div>
    </div>
    <div class="footer__col">
      <h4>Help</h4>
      <div class="footer__links">
        <a >Privacy Policy</a>
        <a >Support</a>
        <a >Terms & Condition</a>
      </div>
    </div>
  </div>
  <div class="footer__bar">
    Copyright © 2024 Sarifna Laundry. All rights reserved.
  </div>
</footer>

<script>


    var map = L.map('map').setView([-6.167744, 106.793290], 13); // Replace with your coordinates

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-6.167744, 106.793290]).addTo(map) // Replace with your coordinates
        .bindPopup('Sarifna Laundry')
        .openPopup();
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
@endsection
