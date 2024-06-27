<section class="services" id="services">
    <div class="section__container services__container">
        <p class="section__subheader">Our Services</p>
        <h2 class="section__header">Service Package</h2>
        <div class="services__carousel">
            <div class="services__grid">
                @php
                    $imagePaths = [
                        'service1.png',
                        'service2.png',
                        'service3.png',
                    ];
                @endphp

                @foreach ($servicePackages as $index => $service)
                    <div class="services__card">
                        <img src="{{ asset('assets/images/' . $imagePaths[$index % count($imagePaths)]) }}" alt="services" />
                        <h4>{{ $service->name }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="{{ asset('css/serviceshome.css') }}">
