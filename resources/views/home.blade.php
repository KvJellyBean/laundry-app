<!-- home.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="hero">
        <div class="container hero-content">
            <div class="hero-text">
                <h1>We Do Laundry For You</h1>
                <p>Proin et ante sed lectus convallis ultricies. Vestibulum ut augue mi.</p>
                <div class="hero-buttons">
                    <a href="{{ route('get-started') }}" class="btn btn-primary">Get Started</a>
                    <a href="{{ route('learn-more') }}" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/laundry1.webp') }}" alt="Laundry Service">
            </div>
        </div>
        <div class="hero-overlay">
            <div class="service-box">Free Delivery<br></div>
            <div class="service-box">Open 24 Hours<br></div>
            <div class="service-box">Safety Guaranteed<br></div>
        </div>
    </div>
    <div id="services" class="services-section">
        <div class="container">
            <h2>Our Services</h2>
            <div class="services-grid">
                @foreach($services as $service)
                    <div class="service-box">
                        <img src="{{ asset('images/' . $service['logo']) }}" alt="{{ $service['title'] }}">
                        <h3>{{ $service['title'] }}</h3>
                        <p>{{ $service['description'] }}</p>
                        <a href="{{ route($service['link']) }}" class="btn btn-primary">Read More</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="why-choose-us" class="why-choose-us-section">
        <div class="container">
            <h2>Why Choose Our Laundry</h2>
            <div class="why-choose-us-grid">
                <div class="why-choose-us-item">
                    <h3>Quality Service</h3>
                    <p>We use the best detergents and modern laundry machines to ensure your clothes are perfectly clean.</p>
                </div>
                <div class="why-choose-us-item">
                    <h3>Fast Delivery</h3>
                    <p>We deliver your clothes back to you within 24 hours. We value your time.</p>
                </div>
                <div class="why-choose-us-item">
                    <h3>Affordable Prices</h3>
                    <p>Our prices are competitive and affordable. We believe in providing value for your money.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
