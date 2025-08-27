<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nextalya - Birlikte Alışveriş Yapın, Birlikte Değerlendirin</title>
    <meta name="description" content="NEXTALYA'ya katılın – en trend ürünleri bulun, deneyimlerinizi paylaşın ve dünya çapındaki alışveriş tutkunlarıyla bir araya gelin.">
    <meta name="theme-color" content="#d4af37">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (for play arrow etc.) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.4/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Swiper (slider) CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/modern-components.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/enhanced-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/landingpage.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="animate-fade-in">

    <header class="modern-header py-3 px-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">

                <div class="modern-logo">
                    <span class="text-dark">NEXT</span><span class="text-gradient">ALYA</span>
                </div>
                @if(Auth::check())

                @else
                 <div class="header-buttons d-none d-md-flex gap-3 animate-fade-in">
                    <a href="{{ route('login') }}" class="btn-secondary-enhanced btn-enhanced">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Giriş yap
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary-enhanced btn-enhanced">
                        <i class="bi bi-person-plus me-2"></i>
                        Kayıt ol
                    </a>
                </div>
                @endif

                @if(Auth::check())
                <a class="btn-primary-enhanced btn-enhanced" href="{{ route('dashboard.index') }}"
                       aria-expanded="false">
                        <i class="bi bi-house me-2"></i>
                        Hoşgeldin, {{ Auth::user()->name }}
                </a>
                @else
                <div class="modern-dropdown d-md-none">
                    <button class="btn-gold dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-list me-2"></i>
                        Menu
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Giriş yap</span>
                        </a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">
                            <i class="bi bi-person-plus"></i>
                            <span>Kayıt ol</span>
                        </a></li>
                    </ul>
                </div>
                @endif

            </div>
        </div>
    </header>

    <section class="custom-header-section animate-slide-up">
        <div class="container" id="custom-container">
            <div class="row align-items-center">
                <div class="col-md-6 animate-fade-in-left">
                    <div class="header-text-black heading-modern">
                        Birlikte Alışveriş Yapın,
                    </div>
                    <div class="header-text-orange heading-modern text-gradient">
                        Birlikte Değerlendirin
                    </div>
                    <div class="header-text">
                        <p class="fs-5">NEXTALYA'ya katılın – en trend ürünleri bulun, deneyimlerinizi paylaşın ve dünya çapındaki alışveriş tutkunlarıyla bir araya gelin.</p>
                    </div>
                    <div class="header-buttons-2 d-flex gap-3 mt-4">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-rocket-takeoff me-2"></i>
                            Topluluğa Katılın
                        </a>
                        <a href="{{ route('discover.index') }}" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-compass me-2"></i>
                            Keşfet
                        </a>
                    </div>
                </div>

                    <div class="col-md-6 d-flex justify-content-center animate-fade-in-right">
                        <div class="position-relative">
                            <img src="other/new.png" class="img-fluid hover-scale" alt="Nextalya Platform" style="max-height: 500px;">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(212, 175, 55, 0.1); border-radius: 2rem; backdrop-filter: blur(2px);">
                                <div class="text-center text-white">
                                    <i class="bi bi-play-circle" style="font-size: 4rem; cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"></i>
                                    <p class="mt-2 fw-semibold">Platform Tanıtımını İzle</p>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>

    <section class="landing-page-mini-banner d-flex align-items-center justify-content-center animate-fade-in" aria-label="Mini banner">
        <div class="container-fluid landing-page-mini-banner-inner text-center">
            <div class="landing-page-mini-banner-content heading-modern text-gradient">
                NEXTALYA'YA HOŞGELDİNİZ
            </div>
        </div>

        <svg class="landing-page-mini-banner-shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1439 237">
            <g filter="url(#filter0_g_21_87)">
                <ellipse cx="723.5" cy="118.5" rx="1009.5" ry="79.5" fill="#D4AF37" fill-opacity="0.2" />
            </g>
            <defs>
                <filter id="filter0_g_21_87" x="-324.3" y="0.7" width="2095.6" height="235.6"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feTurbulence type="fractalNoise" baseFrequency="0.0149 0.0149" numOctaves="3" seed="8091" />
                    <feDisplacementMap in="shape" scale="76.6" xChannelSelector="R" yChannelSelector="G"
                        result="displacedImage" />
                    <feMerge>
                        <feMergeNode in="displacedImage" />
                    </feMerge>
                </filter>
            </defs>
        </svg>
    </section>

    <section class="landing-page-hero-photo animate-slide-up">
        <div class="container">
            <div class="landing-page-hero-photo-wrapper position-relative mx-auto card-enhanced overflow-hidden">
                <img src="{{ asset('frontend/img/landing-page-screenshot.png') }}" alt="Nextalya Platform Screenshot" class="landing-page-hero-img hover-scale">

                <div class="landing-page-hero-arrow animate-fade-in" style="animation-delay: 0.5s;">
                    <img src="{{ asset('frontend/img/landing-page-hero-icon-01.png') }}" alt="">
                </div>
            </div>

            <div class="landing-page-your-hub text-center mt-5 animate-fade-in">
                <h2 class="heading-modern text-gradient">Keşfetmek, bağlantı kurmak ve alışveriş yapmak için merkeziniz</h2>
                <p class="fs-5 mt-3 text-muted">Sosyal alışverişin geleceğini deneyimleyin</p>
            </div>
        </div>
    </section>


    <section class="landing-page-mini-banner d-flex align-items-center justify-content-center animate-fade-in" aria-label="Mini banner">
        <div class="container-fluid landing-page-mini-banner-inner text-center">
            <div class="landing-page-mini-banner-content heading-modern text-gradient">
                Alışverişin Sosyal Medyası
            </div>
        </div>

        <svg class="landing-page-mini-banner-shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1439 237">
            <g filter="url(#filter0_g_21_87)">
                <ellipse cx="723.5" cy="118.5" rx="1009.5" ry="79.5" fill="#D4AF37" fill-opacity="0.2" />
            </g>
            <defs>
                <filter id="filter0_g_21_87" x="-324.3" y="0.7" width="2095.6" height="235.6"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feTurbulence type="fractalNoise" baseFrequency="0.0149 0.0149" numOctaves="3" seed="8091" />
                    <feDisplacementMap in="shape" scale="76.6" xChannelSelector="R" yChannelSelector="G"
                        result="displacedImage" />
                    <feMerge>
                        <feMergeNode in="displacedImage" />
                    </feMerge>
                </filter>
            </defs>
        </svg>
    </section>

    <section class="landing-page-cta text-center animate-slide-up">
        <div class="container">
            <div class="card p-5 mx-auto" style="max-width: 800px;">
                <div class="modern-empty-icon mb-4">
                    <i class="bi bi-phone text-gradient" style="font-size: 4rem;"></i>
                </div>
                <h3 class="heading-modern mb-3">Mobil Uygulama Çok Yakında!</h3>
                <p class="fs-5 mb-4 text-muted">
                  NEXTALYA çok yakında mobilde yanınızda: İlham veren yaratıcılar, en yeni trendler ve favori ürünler tek dokunuşla elinizde.
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <button class="btn btn-primary" disabled>
                        <i class="bi bi-apple me-2"></i>
                        App Store
                    </button>
                    <button class="btn btn-primary" disabled>
                        <i class="bi bi-google-play me-2"></i>
                        Google Play
                    </button>
                </div>
                <small class="text-muted mt-3 d-block">Çıktığında haberdar olmak için kayıt olun!</small>
            </div>
        </div>
    </section>

    <footer class="footer mt-5 py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="homepage-logo mb-3" style="font-size: 1.5rem;">
                        <span class="text-dark">NEXT</span><span class="text-gradient">ALYA</span>
                    </div>
                    <p class="text-muted">Alışverişin sosyal medyası. Birlikte keşfedin, birlikte değerlendirin.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="modern-action-btn modern-tooltip" data-tooltip="Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="modern-action-btn modern-tooltip" data-tooltip="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="modern-action-btn modern-tooltip" data-tooltip="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h6 class="heading-modern mb-3">Şirket</h6>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('about.index') }}" class="text-decoration-none hover-lift">Hakkında</a>
                        <a href="{{ route('carrier.index') }}" class="text-decoration-none hover-lift">İş Fırsatları</a>
                        <a href="{{ route('help.index') }}" class="text-decoration-none hover-lift">Yardım</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h6 class="heading-modern mb-3">Yasal</h6>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('privacy.policy') }}" class="text-decoration-none hover-lift">Gizlilik Politikası</a>
                        <a href="{{ route('kvkk.index') }}" class="text-decoration-none hover-lift">KVKK</a>
                        <a href="{{ route('user.policy') }}" class="text-decoration-none hover-lift">Kullanıcı Sözleşmesi</a>
                        <a href="{{ route('community.rule') }}" class="text-decoration-none hover-lift">Topluluk Kuralları</a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: var(--border-color);">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="small text-muted">
                    © 2025 Nextalya. Tüm hakları saklıdır.
                </div>
                <div class="d-flex gap-3 small">
                    <span class="badge bg-warning text-dark">v1.0.0</span>
                    <span class="text-muted">Türkiye'de yapıldı 🇹🇷</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap + Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        // Enhanced Swiper initialization
        const swiper = new Swiper('.landing-page-swiper', {
            loop: true,
            slidesPerView: 1,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            on: {
                slideChange: function () {
                    // Add slide change animations
                    const activeSlide = this.slides[this.activeIndex];
                    activeSlide.style.animation = 'slideIn 0.6s ease-out';
                }
            }
        });
        
        // Enhanced scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });
    </script>
</body>

</html>
