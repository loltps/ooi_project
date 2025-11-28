@extends('index')

@section('style')
@vite('resources/scss/about_us.scss')
@endsection

@section('content')
<section class="sub-section" style="background: url('{{ asset('assets/img/about_us/Nursing-Homes.jpeg') }}') no-repeat center center/cover; background-size: cover;">
    <div class="container">
        <div class="welcome-text">
            <h3>{{ __('aboutus.about us') }}</h3>
        </div>
    </div>
</section>

<section class="section-content py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Mission -->
            <div class="col-lg-4 col-md-6 col-12">
                <article class="card content-card h-100 shadow-sm color1">
                    <div class="card-body d-flex flex-column">
                        <div class="icon-wrap mb-3 color1">
                            <i class="fa-solid fa-bullseye fa-2x" aria-hidden="true"></i>
                        </div>

                        <h3 class="card-title">{{ __('aboutus.mission') }}</h3>

                        <p class="card-text">{{ __('aboutus.mission_text') }}</p>

                        <!-- <div class="mt-auto">
                            <a class="stretched-link text-decoration-none small" href="#">{{ __('aboutus.learn_more') ?? '' }}</a>
                        </div> -->
                    </div>
                </article>
            </div>

            <!-- Vision -->
            <div class="col-lg-4 col-md-6 col-12">
                <article class="card content-card h-100 shadow-sm color2">
                    <div class="card-body d-flex flex-column">
                        <div class="icon-wrap mb-3 color2">
                            <i class="fa-solid fa-eye fa-2x" aria-hidden="true"></i>
                        </div>

                        <h3 class="card-title">{{ __('aboutus.vision') }}</h3>

                        <p class="card-text">{{ __('aboutus.vision_text') }}</p>

                        <!-- <div class="mt-auto">
                            <a class="stretched-link text-decoration-none small" href="#">{{ __('aboutus.learn_more') ?? '' }}</a>
                        </div> -->
                    </div>
                </article>
            </div>

            <!-- Values -->
            <div class="col-lg-4 col-md-6 col-12">
                <article class="card content-card h-100 shadow-sm color3">
                    <div class="card-body d-flex flex-column">
                        <div class="icon-wrap mb-3 color3">
                            <i class="fa-solid fa-handshake-angle fa-2x" aria-hidden="true"></i>
                        </div>

                        <h3 class="card-title">{{ __('aboutus.values') }}</h3>

                        <ul class="value-list mb-3">
                            <li>{{ __('aboutus.value1') }}</li>
                            <li>{{ __('aboutus.value2') }}</li>
                            <li>{{ __('aboutus.value3') }}</li>
                        </ul>

                        <!-- <div class="mt-auto">
                            <a class="stretched-link text-decoration-none small" href="#">{{ __('aboutus.learn_more') ?? '' }}</a>
                        </div> -->
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    (function(){
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        document.querySelectorAll('.content-card').forEach(el => observer.observe(el));
    })();
</script>
@endpush
@endsection