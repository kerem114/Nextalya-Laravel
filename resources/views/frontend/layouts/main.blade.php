<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nextalya</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (for play arrow etc.) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.4/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Swiper (slider) CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/landingpage.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">


</head>

<body>

    <header class="nextalya-header py-3 px-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">

                <div class="logo fw-bold fs-4">
                    <span class="text-dark">NEX</span><span class="text-gold">TALYA</span>
                </div>
                @if(Auth::check())

                @else
                 <div class="header-buttons d-none d-md-flex gap-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-dark">Giriş yap</a>
                    <a href="{{ route('register') }}" class="btn btn-gold text-dark fw-semibold">Kayıt ol</a>
                </div>
                @endif

                @if(Auth::check())
                <a class="btn btn-gold text-dark btn-sm " href="{{ route('dashboard.index') }}"
                       aria-expanded="false">
                        Hoşgeldiniz; {{ Auth::user()->name }}
                </a>
                @else
                <div class="dropdown d-md-none">
                    <button class="btn btn-gold text-dark btn-sm dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('login') }}">Giriş yap</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Kayıt ol</a></li>
                    </ul>
                </div>
                @endif

            </div>
        </div>
    </header>

    <section class="custom-header-section">
        <div class="container" id="custom-container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="header-text-black">
                        Birlikte Alışveriş Yapın,
                    </div>
                    <div class="header-text-orange">
                        Birlikte Değerlendirin
                    </div>
                    <div class="header-text">
                        <p>NEXTALYA’ya katılın – en trend ürünleri bulun, deneyimlerinizi paylaşın ve dünya çapındaki alışveriş tutkunlarıyla bir araya gelin.</p>
                    </div>
                    <div class="header-buttons-2 d-md-flex gap-3">
                        <a href="{{ route('register') }}" class="btn btn-gold-2 text-dark fw-semibold">Topluluğa Katılın</a>
                    </div>
                </div>

                    <div class="col-md-7 d-flex justify-content-center">
                        <img src="other/new.png" class="img-fluid" alt="">
                    </div>

            </div>
        </div>
    </section>

    <section class="landing-page-mini-banner d-flex align-items-center justify-content-center aria-label="Mini banner">
        <div class="container-fluid landing-page-mini-banner-inner text-center">
            <div class="landing-page-mini-banner-content">NEXTALYA' YA HOŞGELDİNİZ</div>
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

    <section class="landing-page-hero-photo">
        <div class="container">
            <div class="landing-page-hero-photo-wrapper position-relative mx-auto">
                <img src="{{ asset('frontend/img/landing-page-screenshot.png') }}" alt="Hero" class="landing-page-hero-img">

                <div class="landing-page-hero-arrow">
                    <img src="{{ asset('frontend/img/landing-page-hero-icon-01.png') }}" alt="">
                </div>
            </div>

            <div class="landing-page-your-hub text-center">
                <h2>Keşfetmek, bağlantı kurmak ve alışveriş yapmak için merkeziniz</h2>
            </div>
        </div>
    </section>


    <section class="landing-page-mini-banner d-flex align-items-center justify-content-center" aria-label="Mini banner">
        <div class="container-fluid landing-page-mini-banner-inner text-center">
            <div class="landing-page-mini-banner-content">Alışverişin Sosyal Medyası</div>
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

    <section class="landing-page-cta text-center">
        <div class="container">
            <p class="landing-page-cta-text">
              NEXTALYA çok yakında mobilde yanınızda: İlham veren yaratıcılar, en yeni trendler ve favori ürünler tek dokunuşla elinizde.
            </p>
            <a href="#" class="btn landing-page-cta-btn">Uygulama Çok Yakında</a>
        </div>
    </section>

    <footer class="footer mt-5 py-3 text-center text-muted">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center mb-2 small">
                <a href="{{ route('about.index') }}" class="mx-2 text-dark text-decoration-none">Hakkında</a>
                <a href="{{ route('help.index') }}" class="mx-2 text-dark text-decoration-none">Yardım</a>
                <a href="{{ route('carrier.index') }}" class="mx-2 text-dark text-decoration-none">İş Fırsatları</a>
                <a href="{{ route('privacy.policy') }}" class="mx-2 text-dark text-decoration-none">Gizlilik</a>
                <a href="{{ route('kvkk.index') }}" class="mx-2 text-dark text-decoration-none">Kvkk</a>
                <a href="{{ route('user.policy') }}" class="mx-2 text-dark text-decoration-none">Kullanıcı</a>
                <a href="{{ route('community.rule') }}" class="mx-2 text-dark text-decoration-none">Kurallar</a>
            </div>
            <div class="small">
                © 2025 Nextalya
            </div>
        </div>
    </footer>

    <!-- Bootstrap + Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        // init swiper
        const swiper = new Swiper('.landing-page-swiper', {
            loop: true,
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
        });
    </script>
</body>

</html>
