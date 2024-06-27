@extends('layouts.app')

@section('content')
<!-- Section utama untuk halaman "Contact" -->
<section class="contact page" id="contact">
    <div class="section__container contact__container">
        <div class="contact__content">
            <!-- Bagian deskripsi kontak Sarifna Laundry -->
            <div class="contact__Decsription">
                <!-- Subheader untuk bagian "Our Contact" -->
                <p class="section__subheader">Our Contact</p>
                <!-- Header utama untuk bagian "Contact" -->
                <h2 class="section__header">Contact</h2>
                <!-- Paragraf tentang layanan dan komitmen Sarifna Laundry -->
                <p class="para">
                    Sarifna Laundry is a leading laundry service provider committed to delivering impeccable cleanliness and convenience to its clientele. Whether it's everyday laundry needs or delicate garment care, our team, boasting years of industry experience, stands ready to provide top-notch service. Conveniently open seven days a week, we offer free pickup and delivery options to make the laundry experience hassle-free.
                </p>
            </div>

            <!-- Bagian gambar untuk kontak -->
            <div class="contact__image">
                <img src="assets/images/laundry.jpg" alt="contact" />
            </div>

            <!-- Grid untuk informasi kontak -->
            <div class="contact__grid">
                <!-- Kartu kontak untuk nomor telepon -->
                <div class="contact__card">
                    <span><i class="ri-phone-line"></i></span>
                    <h4>PHONE</h4>
                    <p>0812-8043-999</p>
                </div>
                <!-- Kartu kontak untuk lokasi -->
                <div class="contact__card">
                    <span><i class="ri-building-4-fill"></i></span>
                    <h4>LOCATION</h4>
                    <p>Jl. Tanjung Gedong RT. 004/RW. 016 No.2 Jakarta Barat</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bagian untuk menampilkan peta lokasi -->
    <div class="findUsContainer">
        <h2 class="findUs">Find Us on The Map</h2>
        <div id="map" style="height: 400px;"></div>
    </div>
</section>

<!-- Menghubungkan file CSS khusus untuk halaman "Contact" -->
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">

<!-- Menyertakan komponen footer dengan variabel servicePackages -->
@include('components.footer', ['servicePackages' => $servicePackages])

<!-- Script untuk menampilkan peta menggunakan Leaflet.js -->
<script>
    var map = L.map('map').setView([-6.167744, 106.793290], 13); // Ganti dengan koordinat Anda

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-6.167744, 106.793290]).addTo(map) // Ganti dengan koordinat Anda
        .bindPopup('Sarifna Laundry')
        .openPopup();
</script>

<!-- Menghubungkan Swiper.js dan ScrollReveal.js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
@endsection
