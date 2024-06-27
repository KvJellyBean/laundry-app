<!-- services.blade.php -->
<!-- Section untuk bagian layanan -->
<section class="services" id="services">
    <!-- Container utama untuk bagian layanan -->
    <div class="section__container services__container">
        <!-- Subheader dan header untuk bagian layanan -->
        <p class="section__subheader">Our Services</p>
        <h2 class="section__header">Service Package</h2>
        
        <!-- Container untuk carousel layanan -->
        <div class="services__carousel">
            <!-- Grid untuk kartu layanan -->
            <div class="services__grid">
                <!-- PHP block untuk menentukan path gambar -->
                @php
                    $imagePaths = [
                        'service1.png',
                        'service2.png',
                        'service3.png',
                    ];
                @endphp

                <!-- Loop untuk setiap paket layanan -->
                @foreach ($servicePackages as $index => $service)
                    <!-- Kartu layanan -->
                    <div class="services__card">
                        <!-- Gambar layanan -->
                        <img src="{{ asset('assets/images/' . $imagePaths[$index % count($imagePaths)]) }}" alt="services" />
                        <!-- Nama layanan -->
                        <h4>{{ $service->name }}</h4>
                    </div>
                @endforeach
            </div>

            <!-- Tombol untuk menggeser carousel ke kiri -->
            <button class="carousel__button carousel__button--left" id="prevButton"><</button>
            <!-- Tombol untuk menggeser carousel ke kanan -->
            <button class="carousel__button carousel__button--right" id="nextButton">></button>
        </div>
    </div>
</section>
<!-- Link ke stylesheet untuk halaman layanan -->
<link rel="stylesheet" href="{{ asset('css/serviceshome.css') }}">
