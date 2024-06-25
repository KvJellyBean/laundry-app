<!-- service.blade.php -->
<section class="services" id="services">
    <div class="section__container services__container">
        <p class="section__subheader">Our Services</p>
        <h2 class="section__header">Service Package</h2>
        <div class="services__grid">
            @foreach ($servicePackages as $service)
                <div class="services__card">
                    <img src="{{ asset('assets/images/cuci.jpg') }}" alt="services" />
                    <h4>{{ $service->name }}</h4>
                    <p class="textJustify">{{ $service->description }}</p>
                    <p><strong>Price:</strong> IDR. {{ number_format($service->price, 2) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
