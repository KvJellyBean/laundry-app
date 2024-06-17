@extends('layouts.app')

@section('content')
    <div id="contact" class="hero" style="background-image: url('path-to-your-image.jpg');">
        <!-- Contact content goes here -->
        <h2 class="text-center-about">Contact Us</h2>
        <p class="text-center">We'd love to hear from you! Here's how you can reach us:</p>
    </div>


        <div style="max-width: 800px; margin: 0 auto;"> <!-- Centered container with max width -->
            <!-- Phone number -->
            <div class="mb-4">
                <h2><i class="fas fa-phone"></i> Phone</h2>
                <p class="lead">0812-8043-9997</p>
            </div>

            <!-- Location -->
            <div class="mb-4">
                <h2><i class="fas fa-map-marker-alt"></i> Location</h2>
                <p class="lead">Jl. Tanjung Gedong RT. 004/RW. 016 No.2 Jakarta Barat</p>
            </div>

            <!-- Map -->
            <div>
                <h2>Find Us on the Map</h2>
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>


    <script>
        var map = L.map('map').setView([-6.167744, 106.793290], 13); // Replace with your coordinates

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([-6.167744, 106.793290]).addTo(map) // Replace with your coordinates
            .bindPopup('Sarifna Laundry')
            .openPopup();
    </script>
@endsection
