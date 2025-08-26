<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nextalya</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Nextalya - Birlikte alışveriş yapın, birlikte değerlendirin">
  <meta name="theme-color" content="#d4af37">

  <script src="{{ asset('other/notyf/notyf.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('other/notyf/notyf.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('frontend/css/modern-components.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  @yield('css')
    @livewireStyles
</head>

<body class="animate-fade-in">
    <header>
        <!-- Header: Logo, Arama ve Menü -->
        <nav class="navbar navbar-expand-lg navbar-light modern-header fixed-top">
            <div class="container-fluid">
                <!-- Logo -->
                <div class="homepage-logo me-4 d-flex justify-content-start animate-fade-in">
                    <a href="/" class="modern-logo text-decoration-none d-block">
                        <span class="text-dark">NEX</span><span class="text-gradient-enhanced">TALYA</span>
                    </a>
                </div>

                <!-- Arama Çubuğu -->
                <div class="modern-search-container mx-auto">
                    <form action="{{ route('search.products') }}" method="GET" class="position-relative" id="custom-search">
                        <i class="bi bi-search modern-search-icon"></i>
                        <input class="modern-search-input d-none d-md-block" type="search" name="q" placeholder="Ürün, kullanıcı veya koleksiyon ara..." aria-label="Search" onkeydown="if(event.key === 'Enter'){ this.form.submit(); }">
                        <button type="submit" class="d-none">Ara</button> <!-- Gizli submit -->
                    </form>
                </div>

                <!-- Menü: Profil, Favoriler, Anasayfa vb. -->
                <div class="d-none d-md-flex justify-content-end">
                    <a href="{{ route('dashboard.index') }}" class="modern-nav-item modern-tooltip" data-tooltip="Anasayfa">
                        <i class="bi bi-house-door modern-nav-icon"></i>
                    </a>
                    <a href="{{ route('discover.index') }}" class="modern-nav-item modern-tooltip" data-tooltip="Keşfet">
                        <i class="bi bi-compass modern-nav-icon"></i>
                    </a>
                    <a href="{{ route('post.index') }}" class="modern-nav-item modern-tooltip" data-tooltip="Yeni Gönderi">
                        <i class="bi bi-plus-circle modern-nav-icon"></i>
                    </a>
                    <a href="{{ route('save.index') }}" class="modern-nav-item modern-tooltip" data-tooltip="Kaydedilenler">
                        <i class="bi bi-heart modern-nav-icon"></i>
                    </a>
                    <a href="#" class="modern-nav-item modern-tooltip" data-tooltip="Bildirimler">
                        <i class="bi bi-bell modern-nav-icon"></i>
                    </a>
                    <a href="#" class="modern-nav-item modern-tooltip" data-tooltip="Profil">
                        <i class="bi bi-person-circle modern-nav-icon"></i>
                    </a>
                </div>

                <!-- Mobile Dropdown Button -->
               <div class="d-md-none ms-auto" id="mobilmenu">
                    <div class="dropdown">
                        <button class="btn border-0 p-2 modern-nav-item" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-list mobile-menu-icon"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end modern-dropdown-menu mt-2">
                            <li><a class="dropdown-item" href="{{ route('dashboard.index') }}"><i class="bi bi-house-door"
                                        style="font-size: 1.5rem;"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('discover.index') }}"><i class="bi bi-search"
                                        style="font-size: 1.5rem;"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('post.index') }}"><i class="bi bi-plus-circle"
                                        style="font-size: 1.5rem;"></i></a></li>
                            <li><a class="dropdown-item" href="{{ route('save.index') }}"> <i class="bi bi-heart"
                                        style="font-size: 1.5rem;"></i></a></li>
                            <li>
                                <a class="dropdown-item" href="#" id="bell-profile-icon">
                                    <i class="bi bi-bell" style="font-size: 1.5rem;"></i>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" id="mobile-profile-icon">
                                    <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Profil Menü -->
    <div class="profile-menu-container glass-effect-enhanced" id="profile-menu">
        <div class="profile-menu-header d-flex justify-content-between align-items-center">
            <span class="profile-menu-username">{{ Auth::user()->name }}</span>
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-question-circle-fill profile-menu-help-icon"></i>
                <i class="bi bi-x-lg profile-menu-close-btn"></i>
            </div>
        </div>

        <div class="profile-menu-list">
            <a href="{{ route('my.profile') }}" class="profile-menu-item hover-lift-enhanced">
                <div class="profile-menu-icon"><i class="bi bi-person-fill"></i></div>
                <span>Profili görüntüle</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>
            <a href="{{ route('community.index') }}" class="profile-menu-item hover-lift-enhanced">
                <div class="profile-menu-icon"><i class="bi bi-shield-lock-fill"></i></div>
                <span>Koleksiyon</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>
            <a href="{{ route('save.index') }}" class="profile-menu-item hover-lift-enhanced">
                <div class="profile-menu-icon"><i class="bi bi-bookmark-fill"></i></div>
                <span>Kaydedilenler</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>
            <div class="accordion" id="accordionExample">
            <div class="accordion-item">
            <a href="#" class="profile-menu-item hover-lift-enhanced collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="profile-menu-icon"><i class="bi bi-bookmark-fill"></i></div>
                <span>Sürpriz Avantajlarını Gör 🎁</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>
              <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="modern-notification modern-notification-success">
                            <h6 class="mb-2">🎉 Hoş Geldin Bonusu</h6>
                            <p class="mb-0">İlk 30 gün boyunca premium özelliklerden ücretsiz yararlan!</p>
                        </div>
                        <div class="modern-notification">
                            <h6 class="mb-2">💎 VIP Erken Erişim</h6>
                            <p class="mb-0">Yeni özellikleri ilk sen dene ve geri bildirimde bulun.</p>
                        </div>
                    </div>
                    </div>
                </div>

            </div>


             <a href="{{ route('business.account') }}" class="profile-menu-item hover-lift-enhanced">
                <div class="profile-menu-icon"><i class="bi bi-shield-lock-fill"></i></div>
                <span>Profesyonel hesaba geç</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>


            <div class="profile-menu-item">
                <div class="profile-menu-icon"><i class="bi bi-moon-fill"></i></div>
                <span>Karanlık mod</span>
                <div class="form-check form-switch ms-auto">
                    <input id="darkModeToggle" class="modern-toggle" type="checkbox" />
                </div>
            </div>

        </div>

        <hr class="profile-menu-divider" />

        <div class="profile-menu-links">
            <a href="{{ route('about.index') }}" class="hover-lift-enhanced">Hakkımızda</a>
            <a href="{{ route('help.index') }}" class="hover-lift-enhanced">Yardım</a>
            <a href="{{ route('community.rule') }}" class="hover-lift-enhanced">Topluluk kuralları</a>
            <a href="{{ route('privacy.policy') }}" class="hover-lift-enhanced">Gizlilik politikası</a>
            <a href="{{ route('carrier.index') }}" class="hover-lift-enhanced">Kariyer</a>
            <a href="{{ route('kvkk.index') }}" class="hover-lift-enhanced">Kişisel verilerin korunması kanunu</a>
            <a href="{{ route('user.policy') }}" class="hover-lift-enhanced">Kullanıcı sözleşmesi</a>
        </div>


        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-primary-enhanced btn-enhanced profile-menu-logout">
            <i class="bi bi-box-arrow-right me-2"></i> Çıkış yap
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
   <div class="profile-menu-container glass-effect-enhanced" id="bell-menu">
        <div class="profile-menu-header d-flex justify-content-between align-items-center">
            <span class="profile-menu-username">Bildirimler</span>
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-x-lg bell-menu-close-btn"></i>
            </div>
        </div>
   <div class="profile-menu-list">
        @forelse (\Modules\Notification\Models\Customlogs::where('user_id',Auth::user()->id)->get() as $take)
            <a href="#" class="profile-menu-item hover-lift-enhanced modern-notification">
                <div class="profile-menu-icon"><i class="bi bi-person-fill"></i></div>
                <span>{{ $take->content }}</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>
        @empty
        <div class="modern-empty-state">
            <div class="modern-empty-icon">
                <i class="bi bi-bell-slash"></i>
            </div>
            <h6 class="modern-empty-title">Henüz bildirim yok</h6>
            <p class="modern-empty-description">Yeni bildirimler burada görünecek</p>
        </div>
        @endforelse
        </div>
    </div>

  <!-- Main Content Start -->
    <!-- Main Content Area -->
    <div class="container-fluid animate-slide-up">
        <div class="row" style="margin-top: 50px">
            <!-- Sol Menü (Tablet ve Üstü) -->
            <div class="col-lg-3 col-md-3 sidebar animate-fade-in-left">
                <div class="modern-sidebar">
                    <h6 class="modern-sidebar-title">Navigasyon</h6>
                    <ul class="nav flex-column">
                        <li class="nav-item mt-5">
                            <a href="{{ route('dashboard.index') }}" class="modern-sidebar-item">
                                <i class="bi bi-house-door modern-sidebar-icon"></i>
                                <span>Anasayfa</span>
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="{{ route('discover.index') }}" class="modern-sidebar-item">
                                <i class="bi bi-compass modern-sidebar-icon"></i>
                                <span>Keşfet</span>
                            </a>
                        </li>
                        @if(Auth::user()->role === 'business')
                        <li class="nav-item mb-1">
                            <a href="{{ route('product.create') }}" class="modern-sidebar-item">
                                <i class="bi bi-plus-circle modern-sidebar-icon"></i>
                                <span>Ürün oluştur</span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item mb-1">
                            <a href="{{ route('community.index') }}" class="modern-sidebar-item">
                                <i class="bi bi-people modern-sidebar-icon"></i>
                                <span>Koleksiyonlar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('save.index') }}" class="modern-sidebar-item">
                                <i class="bi bi-heart modern-sidebar-icon"></i>
                                <span>Kaydedilenler</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('my.profile') }}" class="modern-sidebar-item">
                                <i class="bi bi-person-circle modern-sidebar-icon"></i>
                                <span>Profilim</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            @yield('content')

            <!-- Sağ Öneriler (Desktop ve Üstü) -->
            <div class="col-lg-3 col-md-3 d-none d-lg-block sidebar_right animate-fade-in-right">
                <div class="modern-sidebar">
                    <h6 class="modern-sidebar-title">Önerilen Kullanıcılar</h6>
                    <livewire:suggested-users />
                </div>
                
                <div class="modern-sidebar mt-4">
                    <h6 class="modern-sidebar-title">Trending Konular</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="modern-badge modern-badge-primary">#teknoloji</span>
                        <span class="modern-badge modern-badge-primary">#moda</span>
                        <span class="modern-badge modern-badge-primary">#ev</span>
                        <span class="modern-badge modern-badge-primary">#spor</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Main Content End -->

    <!-- Footer -->
    <footer class="footer mt-5 py-4 text-center modern-footer">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center mb-3 gap-3">
                <a wire:navigate href="{{ route('about.index') }}" class="text-decoration-none hover-lift-enhanced">Hakkında</a>
                <a wire:navigate href="{{ route('help.index') }}" class="text-decoration-none hover-lift-enhanced">Yardım</a>
                <a wire:navigate href="{{ route('carrier.index') }}" class="text-decoration-none hover-lift-enhanced">İş Fırsatları</a>
                <a wire:navigate href="{{ route('privacy.policy') }}" class="text-decoration-none hover-lift-enhanced">Gizlilik</a>
                <a wire:navigate href="{{ route('kvkk.index') }}" class="text-decoration-none hover-lift-enhanced">KVKK</a>
                <a wire:navigate href="{{ route('user.policy') }}" class="text-decoration-none hover-lift-enhanced">Kullanıcı</a>
                <a wire:navigate href="{{ route('community.rule') }}" class="text-decoration-none hover-lift-enhanced">Kurallar</a>
            </div>
            <div class="d-flex justify-content-center align-items-center gap-3 mb-3">
                <div class="modern-logo" style="font-size: 1.25rem;">NEXTALYA</div>
                <div class="d-flex gap-3">
                    <a href="#" class="text-decoration-none modern-tooltip" data-tooltip="Twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="text-decoration-none modern-tooltip" data-tooltip="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="text-decoration-none modern-tooltip" data-tooltip="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
            <div class="small text-muted">
                © 2025 Nextalya. Tüm hakları saklıdır.
            </div>
        </div>
    </footer>

    <!-- Enhanced Notification System -->
    <script>
        const notyf = new Notyf({
            duration: 4000,
            position: { x: "right", y: "top" },
            dismissible: true,
            types: [
                {
                    type: 'success',
                    backgroundColor: '#10b981',
                    icon: {
                        className: 'bi bi-check-circle-fill',
                        tagName: 'i'
                    }
                },
                {
                    type: 'error',
                    backgroundColor: '#ef4444',
                    icon: {
                        className: 'bi bi-x-circle-fill',
                        tagName: 'i'
                    }
                },
                {
                    type: 'warning',
                    backgroundColor: '#f59e0b',
                    icon: {
                        className: 'bi bi-exclamation-triangle-fill',
                        tagName: 'i'
                    }
                }
            ]
        });

        @if(Session::has('success'))
            notyf.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
            notyf.error("{{ Session::get('error') }}");
        @endif

        @if(Session::has('warning'))
            notyf.warning("{{ Session::get('warning') }}");
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                notyf.error("{{ $error }}");
            @endforeach
        @endif
    </script>
    
    <!-- Enhanced Header Scroll Effect -->
    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.modern-header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
    
    <!-- Enhanced Profile Menu -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menu = document.getElementById("profile-menu");
            const closeBtn = document.querySelector(".profile-menu-close-btn");

            const profileTriggers = [
                ...document.querySelectorAll(".bi-person-circle"),
                document.getElementById("mobile-profile-icon")
            ];

            profileTriggers.forEach(icon => {
                icon.addEventListener("click", function (e) {
                    e.preventDefault();
                    menu.classList.add("active");
                    document.body.style.overflow = 'hidden';
                });
            });

            closeBtn.addEventListener("click", function () {
                menu.classList.remove("active");
                document.body.style.overflow = 'auto';
            });
            
            // Close on outside click
            document.addEventListener('click', function(e) {
                if (!menu.contains(e.target) && !e.target.closest('.bi-person-circle')) {
                    menu.classList.remove("active");
                    document.body.style.overflow = 'auto';
                }
            });
        });
    </script>
    
    <!-- Enhanced Bell Menu -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const bellmenu = document.getElementById("bell-menu");
            const bellcloseBtn = document.querySelector(".bell-menu-close-btn");

            const bellTriggers = [
                ...document.querySelectorAll(".bi-bell"),
                document.getElementById("bell-profile-icon")
            ];

            bellTriggers.forEach(icon => {
                icon.addEventListener("click", function (e) {
                    e.preventDefault();
                    bellmenu.classList.add("active");
                    document.body.style.overflow = 'hidden';
                });
            });

            bellcloseBtn.addEventListener("click", function () {
                bellmenu.classList.remove("active");
                document.body.style.overflow = 'auto';
            });
            
            // Close on outside click
            document.addEventListener('click', function(e) {
                if (!bellmenu.contains(e.target) && !e.target.closest('.bi-bell')) {
                    bellmenu.classList.remove("active");
                    document.body.style.overflow = 'auto';
                }
            });
        });
    </script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @yield('js')
  
  <!-- Enhanced Dark Mode Toggle -->
  <script>
    const toggle = document.getElementById("darkModeToggle");

    // Load user preference on page load
    if(localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
        toggle.classList.add("active");
        changeTextColors("dark");
    }

    toggle.addEventListener("click", function() {
        this.classList.toggle("active");
        if(this.classList.contains("active")) {
            document.body.classList.add("dark-mode");
            localStorage.setItem("theme", "dark");
            changeTextColors("dark");
        } else {
            document.body.classList.remove("dark-mode");
            localStorage.setItem("theme", "light");
            changeTextColors("light");
        }
    });

    function changeTextColors(mode) {
        const elements = document.querySelectorAll(".text-dark, .text-white");
        elements.forEach(el => {
            if(mode === "dark") {
                if(el.classList.contains("text-dark")) {
                    el.classList.remove("text-dark");
                    el.classList.add("text-white");
                }
            } else {
                if(el.classList.contains("text-white")) {
                    el.classList.remove("text-white");
                    el.classList.add("text-dark");
                }
            }
        });
    }
  </script>
  
  <!-- Enhanced Performance and UX -->
  <script>
    // Lazy loading for images
    document.addEventListener("DOMContentLoaded", function() {
        const images = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('loading-skeleton');
                    observer.unobserve(img);
                }
            });
        });
        
        images.forEach(img => imageObserver.observe(img));
    });
    
    // Enhanced tooltips
    document.addEventListener("DOMContentLoaded", function() {
        const tooltips = document.querySelectorAll('.modern-tooltip');
        tooltips.forEach(tooltip => {
            tooltip.addEventListener('mouseenter', function() {
                this.style.zIndex = '1001';
            });
            tooltip.addEventListener('mouseleave', function() {
                this.style.zIndex = 'auto';
            });
        });
    });
  </script>
  
  @livewireScripts
</body>

</html>
