@extends('layouts.app')

@section('content')
<!-- Section utama untuk halaman "About Us" -->
<section class="about page">
    <div class="section__container about__container">
        <div class="about__grid">
            <!-- Bagian konten tentang Sarifna Laundry -->
            <div class="about__content">
                <!-- Subheader untuk bagian "About Us" -->
                <p id="about" class="section__subheader">About Us</p>
                <!-- Header utama untuk bagian "About Us" -->
                <h2 class="section__header">Sarifna Laundry</h2>
                <!-- Paragraf pertama tentang layanan dan komitmen Sarifna Laundry -->
                <p class="para">
                    At Sarifna Laundry, we pride ourselves on delivering top-notch laundry services with a commitment to quality and customer satisfaction. With years of experience in the industry, our dedicated team uses state-of-the-art equipment and eco-friendly detergents to ensure your clothes are impeccably clean and well-cared for. We offer a wide range of services, including washing, drying, folding, and specialized stain removal, catering to both everyday laundry needs and delicate garment care.
                </p>
                <br />
                <!-- Paragraf kedua tentang lokasi dan opsi layanan tambahan -->
                <p class="para">
                    Conveniently located and open seven days a week, we also provide free pickup and delivery options to make your laundry experience as hassle-free as possible. At Sarifna Laundry, your clothes are in good hands, and our mission is to make your life easier, one clean load at a time.
                </p>
            </div>
            <!-- Daftar fitur dan keunggulan Sarifna Laundry -->
            <div class="about__list">
                <div class="about__item">
                    <!-- Ikon dan deskripsi untuk layanan cepat dan handal -->
                    <span><i class="ri-time-fill"></i></span>
                    <h4>Fast and reliable service</h4>
                </div>
                <div class="about__item">
                    <!-- Ikon dan deskripsi untuk harga terjangkau dan ramah anggaran -->
                    <span><i class="ri-thumb-up-fill"></i></span>
                    <h4>Guaranteed affordable and budget-friendly prices</h4>
                </div>
                <div class="about__item">
                    <!-- Ikon dan deskripsi untuk laundry yang bersih dan wangi -->
                    <span><i class="ri-star-fill"></i></span>
                    <h4>Spotless and fragrant laundry</h4>
                </div>
                <div class="about__item">
                    <!-- Ikon dan deskripsi untuk memastikan keamanan dan keselamatan -->
                    <span><i class="ri-lock-fill"></i></span>
                    <h4>Ensuring Safety and Security</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menghubungkan file CSS khusus untuk halaman "About Us" -->
<link rel="stylesheet" href="{{ asset('css/about.css') }}">

<!-- Menyertakan komponen footer dengan variabel servicePackages -->
@include('components.footer', ['servicePackages' => $servicePackages])

@endsection
