@extends('index')

@section('title', 'Home - Stella Maris Home Care')
@section('meta_description', 'Stella Maris Home Care provides compassionate elderly care in Petaling Jaya. A safe, comfortable environment for your loved ones.')

@section('style')
@vite('resources/scss/home.scss')
@endsection

@section('content')
<section class="title-section" style="position: relative; overflow: hidden;">
    <div style="background: url('{{ asset('assets/img/home/home1.png') }}') no-repeat center center/cover; position: absolute; top: 0; left: 0; right: 0; bottom: 0; filter: blur(8px); transform: scale(1.1); z-index: -1;"></div>
    
    {{-- Spinning Badge --}}
    <img src="{{ asset('assets/img/home/smhlogo-removebg-preview.png') }}" class="spinning-badge" alt="SMH Care">

    <div class="container">
        <div class="welcome-text">
            <h3>{!! __('home.welcome to SMH Care') !!}</h3>
            <p>{{ __('home.Your trusted partner in senior care services') }}</p>
        </div>
    </div>
</section>

<section class="info-section">
    <div class="container">
        <div class="info-content">
            <h3>About <span class="brand-name">SMH Care</span></h3>
            <p>SMH Care is dedicated to providing exceptional care and support for seniors. Our mission is to enhance the quality of life for our residents through compassionate care, engaging activities, and a supportive community.</p>
        </div>
        <div class="info-content">
            <h3>Why Choose Us?</h3>
            <p>SMH Care is dedicated to providing exceptional care and support for seniors. Our mission is to enhance the quality of life for our residents through compassionate care, engaging activities, and a supportive community.</p>
        </div>
    </div>
</section>

<!-- New Features Section -->
<section class="features-section">
    <div class="container">
        <div class="row">
            <!-- Feature 1 -->
            <div class="col-lg-3 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-user-nurse"></i>
                    </div>
                    <h4 class="feature-title">Always-On Expert Care & Support</h4>
                    <p class="feature-description">
                        Whether it’s a late-night trip to the bathroom or a simple refreshment, our compassionate nursing staff is ready to assist you around the clock—help is just a button press away!
                    </p>
                </div>
            </div>
            
            <!-- Feature 2 -->
            <div class="col-lg-3 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h4 class="feature-title">Cost-Effective Care Options</h4>
                    <p class="feature-description">
                        We offer nursing home packages that are both budget-friendly and value-driven, ensuring top-quality senior care is within reach for more families.
                    </p>
                </div>
            </div>
            
            <!-- Feature 3 -->
            <div class="col-lg-3 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-couch"></i>
                    </div>
                    <h4 class="feature-title">Elegantly Designed Living Spaces</h4>
                    <p class="feature-description">
                        At our Petaling Jaya nursing homes, residents enjoy a range of premium amenities—from a sauna and full-body massage chairs to mahjong and board game tables, all complemented by cozy sofas in a bright, spacious, and thoughtfully furnished environment.
                    </p>
                </div>
            </div>
            
            <!-- Feature 4 -->
            <div class="col-lg-3 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="feature-title">Protected and Trusted Care</h4>
                    <p class="feature-description">
                        With round-the-clock staff and continuous CCTV monitoring, the safety of our senior residents is always our foremost concern. Our dedicated Senior Care Team is available to assist you anytime, day or night.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="swiper-section">
    <div class="container">
        <div class="swiper-header">
            <h3 class="swiper-title">Gallery</h3>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/home/home1.png') }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/home/home1.png') }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/home/home1.png') }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/home/home1.png') }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/home/home1.png') }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/home/home1.png') }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/home/home1.png') }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/home/home1.png') }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/home/home1.png') }}" />
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- New Services Section -->
<section class="services-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Services</h2>
            <p class="section-description">
                At SMH Care, we recognize that each person’s needs are unique. That’s why our nursing homes offer a wide array of personalized care services. Whether it’s a short-term stay, our skilled team is committed to delivering exceptional care in a compassionate and supportive setting.
            </p>
        </div>

        <!-- Elderly Day Care Service -->
        <div class="row service-row">
            <div class="col-lg-6">
                <div class="service-image">
                    <img src="{{ asset('assets/img/home/home1.png') }}" alt="Elderly Day Care" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-content">
                    <h3 class="service-title">Elderly Day Care</h3>
                    <div class="service-description">
                        <p>Our senior day care program provides convenient daily pickup and drop-off, offering peace of mind for families who want their loved ones to have supervised care during the day.</p>
                        <p>In our welcoming community, seniors can connect with peers, participate in recreational activities, and receive attentive support. From gentle exercises to shared meals, our nursing homes focus on creating a safe, engaging, and enriching environment that enhances the daily lives of our residents.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Short-Term Stays Service -->
        <div class="row service-row">
            <div class="col-lg-6 order-lg-2">
                <div class="service-image">
                    <img src="{{ asset('assets/img/home/home1.png') }}" alt="Short-Term Stays" />
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="service-content">
                    <h3 class="service-title">Short-Term Stays</h3>
                    <div class="service-description">
                        <p>Our short-term stay programs are ideal for individuals seeking temporary support—whether for a short respite, recovery after treatment, or an extended getaway. Residents receive personalized, compassionate care from our devoted nursing team.</p>
                        <p>Throughout their stay, they can enjoy comfortable amenities, take part in stimulating activities, and experience the attentive support of our experienced staff, ensuring a safe and enjoyable environment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        autoplay: {
            delay: 3000, // 3 seconds delay between slides
            disableOnInteraction: false, // Continue autoplay even when user interacts with swiper
        },
        loop: true,
    });
</script>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        gsap.registerPlugin(ScrollTrigger);
        let mm = gsap.matchMedia();

        // 1. Universal Animations (Vertical Only)
        
        // Welcome Text Animation (On Load)
        let tl = gsap.timeline();
        tl.from(".welcome-text h3", {
            y: 100,
            opacity: 0,
            duration: 1.5,
            ease: "power4.out"
        })
        .from(".welcome-text p", {
            y: 50,
            opacity: 0,
            duration: 1.5,
            ease: "power4.out"
        }, "-=0.6");

        // Info Section Animation (On Scroll)
        const infoContents = document.querySelectorAll('.info-content');
        infoContents.forEach((content) => {
            let infoTl = gsap.timeline({
                scrollTrigger: {
                    trigger: content,
                    start: "top 80%",
                    toggleActions: "play none none reset"
                }
            });
            infoTl.from(content.querySelector("h3"), {
                y: 50,
                opacity: 0,
                duration: 1.5,
                ease: "power4.out"
            })
            .from(content.querySelector("p"), {
                y: 30,
                opacity: 0,
                duration: 1.5,
                ease: "power4.out"
            }, "-=0.6");
        });

        // Swiper Section Header Animation
        const swiperHeader = document.querySelector('.swiper-header');
        if (swiperHeader) {
            gsap.from(swiperHeader.querySelector(".swiper-title"), {
                scrollTrigger: {
                    trigger: swiperHeader,
                    start: "top 80%",
                    toggleActions: "play none none reset"
                },
                y: 50,
                opacity: 0,
                duration: 1.5,
                ease: "power4.out"
            });
        }

        // Services Section Header Animation
        const serviceHeader = document.querySelector('.services-section .section-header');
        if (serviceHeader) {
            let headerTl = gsap.timeline({
                scrollTrigger: {
                    trigger: serviceHeader,
                    start: "top 80%",
                    toggleActions: "play none none reset"
                }
            });
            headerTl.from(serviceHeader.querySelector("h2"), {
                y: 50,
                opacity: 0,
                duration: 1.5,
                ease: "power4.out"
            })
            .from(serviceHeader.querySelector("p"), {
                y: 30,
                opacity: 0,
                duration: 1.5,
                ease: "power4.out"
            }, "<");
        }

        // 2. Desktop Specific (Horizontal Movement)
        mm.add("(min-width: 992px)", () => {
             // Features Section Animation
            const featureCols = document.querySelectorAll('.features-section .row > div');
            if (featureCols.length >= 4) {
                // Features 1 & 2: Move from Left
                gsap.from([featureCols[0], featureCols[1]], {
                    scrollTrigger: {
                        trigger: ".features-section",
                        start: "top 80%",
                        toggleActions: "play none none reset"
                    },
                    x: -100,
                    opacity: 0,
                    duration: 3.0,
                    ease: "power4.out"
                });
                // Features 3 & 4: Move from Right
                gsap.from([featureCols[2], featureCols[3]], {
                    scrollTrigger: {
                        trigger: ".features-section",
                        start: "top 80%",
                        toggleActions: "play none none reset"
                    },
                    x: 100,
                    opacity: 0,
                    duration: 3.0,
                    ease: "power4.out"
                });
            }

            // Service Rows Animation
            const serviceRows = document.querySelectorAll('.service-row');
            if (serviceRows.length > 0) {
                gsap.from(serviceRows[0], {
                    scrollTrigger: {
                        trigger: serviceRows[0],
                        start: "top 80%",
                        toggleActions: "play none none reset"
                    },
                    x: -100,
                    opacity: 0,
                    duration: 3.0,
                    ease: "power4.out"
                });
            }
            if (serviceRows.length > 1) {
                gsap.from(serviceRows[1], {
                    scrollTrigger: {
                        trigger: serviceRows[1],
                        start: "top 80%",
                        toggleActions: "play none none reset"
                    },
                    x: 100,
                    opacity: 0,
                    duration: 3.0,
                    ease: "power4.out"
                });
            }
        });

        // 3. Mobile Specific (Vertical Movement only)
        mm.add("(max-width: 991px)", () => {
             // Features Section - Fade Up
            const featureCols = document.querySelectorAll('.features-section .row > div');
            if (featureCols.length > 0) {
                gsap.from(featureCols, {
                    scrollTrigger: {
                        trigger: ".features-section",
                        start: "top 85%",
                        toggleActions: "play none none reset"
                    },
                    y: 50,
                    opacity: 0,
                    duration: 1.5,
                    stagger: 0.1,
                    ease: "power4.out"
                });
            }

            // Service Rows - Fade Up
            const serviceRows = document.querySelectorAll('.service-row');
            serviceRows.forEach(row => {
                gsap.from(row, {
                    scrollTrigger: {
                        trigger: row,
                        start: "top 85%",
                        toggleActions: "play none none reset"
                    },
                    y: 50,
                    opacity: 0,
                    duration: 1.5,
                    ease: "power4.out"
                });
            });
        });

    });
</script>
@endpush