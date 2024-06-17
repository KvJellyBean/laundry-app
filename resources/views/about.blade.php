@extends('layouts.app')

@section('content')
<div id="services" class="hero" style="background-image: url('path-to-your-image.jpg');">
    <!-- Services content goes here -->
    <h2 class="text-center-about">About Us</h2>
    <p class="text-center">Discover about us</p>
    <div class="phone-number">
        <i class="fas fa-phone"></i>
        <span>081280439997</span>
    </div>
    <div class="location">
        <i class="fas fa-map-marker-alt"></i>
        <span>Jl. Tanjung Gedong RT. 004/RW. 016 No.2 Jakarta Barat</span>
    </div>
</div>

<div id="mission" class="section text-center-about">
    <h2>Our Mission</h2>
    <p>Our mission is to provide the best laundry service in town. We strive to offer the highest quality, most convenient, and cost-effective services to our customers.</p>
</div>

<div id="values" class="section text-center-about">
    <h2>Our Values</h2>
    <ul>
        <p>Customer Satisfaction: We put our customers first and strive to secure their loyalty through top quality service.</p>
        <p>Integrity: We do the right thing, all the time.</p>
        <p>Teamwork: We work together, across boundaries, to meet the needs of our customers.</p>
    </ul>
</div>

<div id="founders" class="section text-center-about">
    <h2>Meet Our Founders</h2>
    <div class="founders-grid">
        <div class="founder">
            <img src="{{ asset('images/founder1.jpg') }}" alt="Founder 1">
            <h3>Founder 1</h3>
            <p>"Our mission is to provide the best laundry service in town."</p>
        </div>
        <div class="founder">
            <img src="{{ asset('images/founder2.jpg') }}" alt="Founder 2">
            <h3>Founder 2</h3>
            <p>"We put our customers first and strive to secure their loyalty through top quality service."</p>
        </div>
        <div class="founder">
            <img src="{{ asset('images/founder3.jpg') }}" alt="Founder 3">
            <h3>Founder 3</h3>
            <p>"We do the right thing, all the time."</p>
        </div>
    </div>
</div>

<div id="testimonials" class="section text-center-about">
    <h2>What Our Customers Say</h2>
    <div class="testimonials">
        <div class="testimonial">
            <p>"This is the best laundry service in town. They are fast, reliable, and affordable."</p>
            <h3>- Happy Customer</h3>
        </div>
        <!-- More testimonials go here -->
    </div>
</div>
@endsection
