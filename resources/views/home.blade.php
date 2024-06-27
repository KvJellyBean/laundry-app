<!-- home.blade.php -->
@extends('layouts.app')

@section('content')
    @include('components.hero')
    @include('components.about')
    @include('components.services', ['servicePackages' => $servicePackages])
    @include('components.contact')
    @include('components.info')
    @include('components.founder')
    @include('components.footer', ['servicePackages' => $servicePackages])

    <script>
      // Menginisialisasi peta dengan Leaflet
      var map = L.map('map').setView([-6.167744, 106.793290], 13); // Ganti dengan koordinat Anda

      // Menambahkan lapisan tile dari OpenStreetMap
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      // Menambahkan marker pada peta
      L.marker([-6.167744, 106.793290]).addTo(map) // Ganti dengan koordinat Anda
        .bindPopup('Sarifna Laundry')
        .openPopup();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
@endsection
