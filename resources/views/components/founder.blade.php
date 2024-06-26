<!-- founder.blade.php -->
<section class="founder" id="founder">
    <!-- Container untuk seluruh section founder -->
    <div class="section__container founder__container">
        <!-- Subheader dan Header untuk section founder -->
        <p class="section__subheader">Founder</p>
        <h2 class="section__header">Meet Our Founder</h2>
        
        <!-- Container untuk review founder -->
        <div class="founder__review">
            <!-- Slider utama menggunakan Swiper -->
            <div class="swiper">
                <!-- Wrapper tambahan yang diperlukan untuk Swiper -->
                <div class="swiper-wrapper">
                    <!-- Slide pertama -->
                    <div class="swiper-slide">
                        <div class="founder__review__card">
                            <span><i class="ri-double-quotes-r"></i></span>
                            <!-- Detail review founder -->
                            <div class="founder__review__details">
                                <div class="founder__review__image">
                                    <img src="assets/images/kevin.png" alt="founder" />
                                </div>
                                <div>
                                    <h4>Kevin Natanael</h4>
                                    <h5>535220084</h5>
                                </div>
                            </div>
                            <!-- Social media links untuk founder -->
                            <div class="footer__socials">
                                <a href="https://www.instagram.com/natanvinx/" target="_blank"><i class="ri-instagram-line"></i></a>
                                <a href="https://www.linkedin.com/in/kevin-natanael-44929b26b/" target="_blank"><i class="ri-linkedin-fill"></i></a>
                            </div>
                            <!-- Deskripsi singkat dari founder -->
                            <p>Welcome to Sarifna Laundry, where we're redefining clean living with passion and innovation.</p>
                        </div>
                    </div>

                    <!-- Slide kedua -->
                    <div class="swiper-slide">
                        <div class="founder__review__card">
                            <span><i class="ri-double-quotes-r"></i></span>
                            <div class="founder__review__details">
                                <div class="founder__review__image">
                                    <img src="assets/images/ari.png" alt="founder" />
                                </div>
                                <div>
                                    <h4>Ari Wijaya</h4>
                                    <h5>535220060</h5>
                                </div>
                            </div>
                            <div class="footer__socials">
                                <a href="https://www.instagram.com/ariwjy_ri/?utm_source=ig_web_button_share_sheet" target="_blank"><i class="ri-instagram-line"></i></a>
                                <a href="https://www.linkedin.com/in/ari-wijaya-370ba12ba" target="_blank"><i class="ri-linkedin-fill"></i></a>
                            </div>
                            <p>Experience the difference at Sarifna Laundry, where quality meets convenience for all your laundry needs.</p>
                        </div>
                    </div>

                    <!-- Slide ketiga -->
                    <div class="swiper-slide">
                        <div class="founder__review__card">
                            <span><i class="ri-double-quotes-r"></i></span>
                            <div class="founder__review__details">
                                <div class="founder__review__image">
                                    <img src="assets/images/Richard.png" alt="founder" />
                                </div>
                                <div>
                                    <h4>Richard Vincentius</h4>
                                    <h5>535220077</h5>
                                </div>
                            </div>
                            <div class="footer__socials">
                                <a href="https://www.instagram.com/rchardvin/" target="_blank"><i class="ri-instagram-line"></i></a>
                                <a href="https://www.linkedin.com/in/richard-vincentius-98572b26b/" target="_blank"><i class="ri-linkedin-fill"></i></a>
                            </div>
                            <p>Join us in our mission to elevate everyday chores into exceptional experiences, one wash at a time.</p>
                        </div>
                    </div>
                </div>
                <!-- Jika perlu pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- Link ke stylesheet untuk halaman founder -->
<link rel="stylesheet" href="{{ asset('css/founder.css') }}">
