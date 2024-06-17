<!-- services.blade.php -->
@extends('layouts.app')

@section('content')
<div id="services" class="hero" style="background-image: url('path-to-your-image.jpg');">
    <h2 class="text-center-about">Our Services</h2>
    <p class="text-center">Discover the variety of services we offer to meet your laundry needs.</p>
    <div class="phone-number">
        <i class="fas fa-phone"></i>
        <span>081280439997</span>
    </div>
    <div class="location">
        <i class="fas fa-map-marker-alt"></i>
        <span>Jl. Tanjung Gedong RT. 004/RW. 016 No.2 Jakarta Barat</span>
    </div>
</div>
        <div class="service-page-grid" style="padding-top: 3rem">
            <div class="service-item">
                <img src="{{ asset('images/service1.jpg') }}" alt="Cuci">
                <h2>Cuci</h2>
                <p>Our Cuci service ensures your clothes are not only clean, but also well-ironed and ready to wear.</p>
                <a href="{{ route('cuci') }}" class="btn btn-primary">Read More</a>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/service2.jpg') }}" alt="Setrika">
                <h2>Setrika</h2>
                <p>Our Setrika service ensures your clothes are not only clean, but also well-ironed and ready to wear.</p>
                <a href="{{ route('setrika') }}" class="btn btn-primary">Read More</a>
            </div>
            <div class="service-item">
                <img src="{{ asset('images/service3.jpg') }}" alt="Cuci Komplit">
                <h2>Cuci Komplit</h2>
                <p>Our Cuci Komplit service provides a complete cleaning solution for your clothes, ensuring they are thoroughly cleaned, dried, and folded.</p>
                <a href="{{ route('cuci-komplit') }}" class="btn btn-primary">Read More</a>
            </div>
        </div>

        <div id="why-choose-us" class="why-choose-us-section">
            <h2>Why Choose Our Laundry</h2>
            <div class="why-choose-us-grid">
                <div class="why-choose-us-item ellipse-box-why">
                    <h3>✅ Layanan Cepat</h3>
                    <p>We provide fast service to ensure your laundry needs are met in a timely manner.</p>
                </div>
                <div class="why-choose-us-item ellipse-box-why">
                    <h3>✅ Dijamin Murah</h3>
                    <p>Our services are guaranteed to be affordable, providing value for your money.</p>
                </div>
                <div class="why-choose-us-item ellipse-box-why">
                    <h3>✅ Bersih dan Wangi</h3>
                    <p>We ensure your clothes are clean and fresh, leaving them smelling great.</p>
                </div>
            </div>
        </div>

@endsection
