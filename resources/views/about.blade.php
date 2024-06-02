@extends('layouts.app')

@section('content')
    <div id="about" class="hero">
        <!-- About content goes here -->
        <h2>About Us</h2>
        <p>Learn more about our team and our commitment to quality service.</p>
    </div>

    <div id="founders" class="services-section">
        <div class="container">
            <h2>Our Founders</h2>
            <div class="founder">
                <img src="{{ asset('images/founder1.webp') }}" alt="Founder 1">
                <h3>Founder 1</h3>
                <p>Details about Founder 1.</p>
            </div>
            <div class="founder">
                <img src="{{ asset('images/founder2.webp') }}" alt="Founder 2">
                <h3>Founder 2</h3>
                <p>Details about Founder 2.</p>
            </div>
            <div class="founder">
                <img src="{{ asset('images/founder3.webp') }}" alt="Founder 3">
                <h3>Founder 3</h3>
                <p>Details about Founder 3.</p>
            </div>
        </div>
    </div>
@endsection
