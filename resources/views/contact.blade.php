<!-- contact.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4">{{ $data['title'] }}</h1>
        <p class="lead">{{ $data['description'] }}</p>
        <!-- Add contact form -->
    </div>
@endsection
