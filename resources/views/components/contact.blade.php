<!-- contact.blade.php -->
<section class="contact" id="contact">
    <div class="section__container contact__container">
        <div class="contact__content">
            <!-- Bagian deskripsi kontak -->
            <div class="contact__Decsription">
                <p class="section__subheader">Our Contact</p>
                <h2 class="section__header">Contact</h2>
                <p class="para">
                    Sarifna Laundry is a leading laundry service provider committed to delivering impeccable cleanliness and convenience to its clientele. Whether it's everyday laundry needs or delicate garment care, our team, boasting years of industry experience, stands ready to provide top-notch service. Conveniently open seven days a week, we offer free pickup and delivery options to make the laundry experience hassle-free.
                </p>
            </div>

            <!-- Bagian gambar kontak -->
            <div class="contact__image">
                <img src="assets/images/laundry.jpg" alt="contact" />
            </div>

            <!-- Bagian informasi kontak -->
            <div class="contact__grid">
                <!-- Kartu informasi telepon -->
                <div class="contact__card">
                    <span><i class="ri-phone-line"></i></span>
                    <h4>PHONE</h4>
                    <p>0812-8043-999</p>
                </div>
                <!-- Kartu informasi lokasi -->
                <div class="contact__card">
                    <span><i class="ri-building-4-fill"></i></span>
                    <h4>LOCATION</h4>
                    <p>Jl. Tanjung Gedong RT. 004/RW. 016 No.2 Jakarta Barat</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bagian peta lokasi -->
    <div class="findUsContainer">
        <h2 class="findUs">Find Us on The Map</h2>
        <div id="map" style="height: 400px;"></div>
    </div>
</section>
<!-- Link ke stylesheet untuk halaman contact -->
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
