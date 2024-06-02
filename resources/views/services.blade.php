<!-- services.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="service-page-grid">
            @foreach($data as $service)
                <div class="service-item">
                    <h2>{{ $service['title'] }}</h2>
                    <img src="{{ asset('images/' . $service['logo']) }}" alt="{{ $service['title'] }}">
                    <p>{{ $service['description'] }}</p>
                    <p>Price: ${{ $service['price'] }}</p>
                    <h3>Pros:</h3>
                    <ul>
                        @foreach($service['pros'] as $pro)
                            <li>{{ $pro }}</li>
                        @endforeach
                    </ul>
                    <h3>Cons:</h3>
                    <ul>
                        @foreach($service['cons'] as $con)
                            <li>{{ $con }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

@endsection
