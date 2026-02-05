@extends('index')

@section('title', 'Contact Us - Stella Maris Home Care')
@section('meta_description', 'Get in touch with Stella Maris Home Care in Petaling Jaya. We are here to answer your questions about elderly care.')

@section('style')
@vite('resources/scss/contact.scss')
@endsection

@section('content')
<section class="sub-section" style="background: url('{{ asset('assets/img/contact_us/contact_us_bg.png') }}') no-repeat center center/cover; background-size: cover;">
    <div class="container">
        <div class="welcome-text">
            <h3>{{ __('contact.contact') }}</h3>
        </div>
    </div>
</section>

<!-- Map & Contact Section -->
<section class="contact-map-section py-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <!-- LEFT: Map -->
            <div class="col-lg-6 col-md-12">
                <div class="card h-100 shadow-sm map-card overflow-hidden">
                    <div class="card-body p-0">
                        <div id="contact-map" class="w-100" style="min-height:360px; height: 100%;"></div>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                        <small class="text-muted">Marker placed at <strong>3.0974495, 101.6506781</strong></small>
                        <a href="https://maps.app.goo.gl/foaxqm8LLAiCXVDAA" target="_blank" rel="noopener" class="btn btn-sm btn-outline-primary">
                            Open in Google Maps <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Contact Info -->
            <div class="col-lg-6 col-md-12">
                <div class="d-flex flex-column gap-3 h-100">
                    <!-- Address -->
                    <article class="card contact-card shadow-sm p-3 h-100">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="icon-circle bg-soft-primary">
                                <i class="fa-solid fa-location-dot fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Address</h5>
                                <p class="mb-2 text-muted">2, Jalan 6/18, Seksyen 6, 46000 Petaling Jaya, Selangor</p>
                                <a class="small text-decoration-none" href="https://maps.app.goo.gl/foaxqm8LLAiCXVDAA" target="_blank" rel="noopener">
                                    View on Google Maps <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- Call us -->
                    <article class="card contact-card shadow-sm p-3 h-100">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="icon-circle bg-soft-success">
                                <i class="fa-solid fa-phone fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Call Us</h5>
                                <p class="mb-2 text-muted">+60 11-1189 1985</p>
                                <a href="tel:+601111891985" class="small text-decoration-none">Call now <i class="fa-solid fa-phone-volume ms-1"></i></a>
                            </div>
                        </div>
                    </article>

                    <!-- Email us -->
                    <article class="card contact-card shadow-sm p-3 h-100">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="icon-circle bg-soft-info">
                                <i class="fa-solid fa-envelope fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Email Us</h5>
                                <p class="mb-2 text-muted">porsiangtiew@gmail.com</p>
                                <a href="mailto:porsiangtiew@gmail.com" class="small text-decoration-none">Send an email <i class="fa-solid fa-paper-plane ms-1"></i></a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    (function() {
        // Coordinates taken from your Google Maps link: lat, lng
        const lat = 3.0974495;
        const lng = 101.6506781;

        // init map
        const map = L.map('contact-map', {
            scrollWheelZoom: false
        }).setView([lat, lng], 16);

        // OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // marker with popup
        const marker = L.marker([lat, lng]).addTo(map);
        marker.bindPopup('<strong>Marker Location</strong><br>3.0974495, 101.6506781').openPopup();

        // make map resize correctly when its container becomes visible/responsive
        setTimeout(() => map.invalidateSize(), 300);
    })();
</script>
@endpush
@endsection