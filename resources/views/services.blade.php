@extends('layouts.app')   

@section('content')

<section class="services" id="services">
    <div class="section__container services__container">
        <p class="section__subheader">Our Services</p>
        <h2 class="section__header">Service Package</h2>
        <div class="services__grid">
            @foreach ($servicePackages as $index => $service)
                <div class="services__card" data-name="p-{{ $index + 1 }}">
                    <h4>{{ $service->name }}</h4>
                    <p><strong>Price:</strong> IDR. {{ number_format($service->price, 2) }}</p>
                    <div class="buttons">
                        <a href="/dashboard/orders/create" class="buy">Order Now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="services-preview">
    @foreach ($servicePackages as $index => $service)
    <div class="preview" data-target="p-{{ $index + 1 }}">
        <i class="fas fa-times"></i>
        <h3>{{ $service->name }}</h3>
        <p class="textJustify">{{ $service->description }}</p>
        <div class="price">IDR. {{ number_format($service->price, 2) }}</div>
        <div class="buttons">
            <a href="/dashboard/orders/create" class="buy">Order Now</a>
        </div>
    </div>
    @endforeach
</div>

@include('components.footer', ['servicePackages' => $servicePackages])

@endsection

<link rel="stylesheet" href="{{ asset('css/services.css') }}">

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Seleksi kontainer pratinjau layanan
    let previewContainer = document.querySelector('.services-preview');
    // Seleksi semua kotak pratinjau
    let previewBoxes = previewContainer.querySelectorAll('.preview');

    // Tangani setiap kartu layanan di grid
    document.querySelectorAll('.services__grid .services__card').forEach(card => {
        // Tangani klik pada kartu layanan
        card.onclick = (e) => {
            // Jika elemen yang diklik adalah tombol "Order Now", arahkan ke halaman pesanan
            if (e.target.classList.contains('buy')) {
                window.location.href = e.target.getAttribute('href');
                return;
            }

            // Jika bukan, tampilkan pratinjau
            previewContainer.style.display = 'flex';
            let name = card.getAttribute('data-name');
            previewBoxes.forEach(preview => {
                if (preview.getAttribute('data-target') === name) {
                    preview.classList.add('active');
                } else {
                    preview.classList.remove('active');
                }
            });
        };

        // Tambahkan efek hover pada kartu
        card.onmouseover = () => {
            card.style.backgroundColor = "rgba(255, 255, 255, 0.2)";
            card.style.transform = "scale(1.05)";
        };

        card.onmouseout = () => {
            card.style.backgroundColor = "rgba(255, 255, 255, 0.1)";
            card.style.transform = "scale(1)";
        };
    });

    // Tangani klik pada tombol close pada pratinjau
    previewBoxes.forEach(preview => {
        preview.querySelector('.fa-times').onclick = () => {
            preview.classList.remove('active');
            previewContainer.style.display = 'none';
        };
    });
});

</script>
