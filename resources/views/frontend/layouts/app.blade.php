<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nextalya</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="{{ asset('other/notyf/notyf.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('other/notyf/notyf.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">

  @yield('css')
    @livewireStyles
</head>

<body>
    <header>
        <!-- Header: Logo, Arama ve Menü -->
        <nav class="navbar navbar-expand-lg navbar-light bg-head border-bottom fixed-top">
            <div class="container-fluid">
                <!-- Logo -->
                <div class="homepage-logo me-4 d-flex justify-content-start">
                    <a href="/" class="text-dark text-decoration-none fw-bold fs-4 d-block">
                        <span class="text-dark">NEX</span><span class="text-gold">TALYA</span>
                    </a>
                </div>

                <!-- Arama Çubuğu -->
                <div class="d-flex mx-auto search-input-wrapper">
                    <form action="{{ route('search.products') }}" method="GET" class="d-flex mx-auto" id="custom-search">
                        <input class="form-control me-2 d-none d-md-block" type="search" name="q" placeholder="Ara" aria-label="Search" onkeydown="if(event.key === 'Enter'){ this.form.submit(); }">
                        <button type="submit" class="d-none">Ara</button> <!-- Gizli submit -->
                    </form>
                </div>

                <!-- Menü: Profil, Favoriler, Anasayfa vb. -->
                <div class="d-none d-md-flex justify-content-end">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-link text-dark">
                        <i class="bi bi-house-door" style="font-size: 1.5rem;"></i> <!-- Anasayfa -->
                    </a>
                    <a href="{{ route('discover.index') }}" class="btn btn-link text-dark">
                        <i class="bi bi-compass" style="font-size: 1.5rem;"></i> <!-- Keşfet -->
                    </a>
                    <a href="{{ route('post.index') }}" class="btn btn-link text-dark">
                        <i class="bi bi-plus-circle" style="font-size: 1.5rem;"></i> <!-- Yeni Gönderi -->
                    </a>

                    <a href="{{ route('save.index') }}" class="btn btn-link text-dark">
                        <i class="bi bi-heart" style="font-size: 1.5rem;"></i> <!-- Bildirimler -->
                    </a>
                    <a href="#" class="btn btn-link text-dark">
                        <i class="bi bi-bell" style="font-size: 1.5rem;"></i> <!-- Yeni Gönderi -->
                    </a>
                    <a href="#" class="btn btn-link text-dark">
                        <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i> <!-- Profil -->
                    </a>
                </div>

                <!-- Mobile Dropdown Button -->
               <div class="d-md-none ms-auto" id="mobilmenu">
                    <div class="dropdown">
                        <button class="btn border-0 p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-list mobile-menu-icon"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end mobile-dropdown-menu mt-2">
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
    <div class="profile-menu-container" id="profile-menu">
        <div class="profile-menu-header d-flex justify-content-between align-items-center">
            <span class="profile-menu-username">{{ Auth::user()->name }}</span>
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-question-circle-fill profile-menu-help-icon"></i>
                <i class="bi bi-x-lg profile-menu-close-btn"></i>
            </div>
        </div>

        <div class="profile-menu-list">
            <a href="{{ route('my.profile') }}" class="profile-menu-item">
                <div class="profile-menu-icon"><i class="bi bi-person-fill"></i></div>
                <span>Profili görüntüle</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>
            <a href="{{ route('community.index') }}" class="profile-menu-item">
                <div class="profile-menu-icon"><i class="bi bi-shield-lock-fill"></i></div>
                <span>Koleksiyon</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>
            <a href="{{ route('save.index') }}" class="profile-menu-item">
                <div class="profile-menu-icon"><i class="bi bi-bookmark-fill"></i></div>
                <span>Kaydedilenler</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>
            <div class="accordion" id="accordionExample">
            <div class="accordion-item">
            <a href="#" class="profile-menu-item collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="profile-menu-icon"><i class="bi bi-bookmark-fill"></i></div>
                <span>Sürpriz Avantajlarını Gör 🎁</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>
              <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                    </div>
                </div>

            </div>


             <a href="{{ route('business.account') }}" class="profile-menu-item">
                <div class="profile-menu-icon"><i class="bi bi-shield-lock-fill"></i></div>
                <span>Profesyonel hesaba geç</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>


            <div class="profile-menu-item">
                <div class="profile-menu-icon"><i class="bi bi-moon-fill"></i></div>
                <span>Karanlık mod</span>
                <div class="form-check form-switch ms-auto">
                    <input id="darkModeToggle" class="form-check-input profile-menu-toggle" type="checkbox" />
                </div>
            </div>

        </div>

        <hr class="profile-menu-divider" />

        <div class="profile-menu-links">
            <a href="{{ route('about.index') }}">Hakkımızda</a>
            <a href="{{ route('help.index') }}">Yardım</a>
            <a href="{{ route('community.rule') }}">Topluluk kuralları</a>
            <a href="{{ route('privacy.policy') }}">Gizlilik politikası</a>
            <a href="{{ route('carrier.index') }}">Kariyer</a>
            <a href="{{ route('kvkk.index') }}">Kişisel verilerin korunması kanunu</a>
            <a href="{{ route('user.policy') }}">Kullanıcı sözleşmesi</a>
        </div>


        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="profile-menu-logout">
            <i class="bi bi-box-arrow-right me-2"></i> Çıkış yap
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
   <div class="profile-menu-container" id="bell-menu">
        <div class="profile-menu-header d-flex justify-content-between align-items-center">
            <span class="profile-menu-username">Bildirimler</span>
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-x-lg bell-menu-close-btn"></i>
            </div>
        </div>
   <div class="profile-menu-list">
        @forelse (\Modules\Notification\Models\Customlogs::where('user_id',Auth::user()->id)->get() as $take)
            <a href="#" class="profile-menu-item">
                <div class="profile-menu-icon"><i class="bi bi-person-fill"></i></div>
                <span>{{ $take->content }}</span>
                <i class="bi bi-arrow-right profile-menu-right-icon"></i>
            </a>
        @empty
        <div class="text-center">
            <svg id="&#x421;&#x43B;&#x43E;&#x439;_1" height="72" viewBox="0 0 128 128" width="72" xmlns="http://www.w3.org/2000/svg"><circle cx="114" cy="12" r="2"/><circle cx="106" cy="12" r="2"/><circle cx="98" cy="12" r="2"/><path d="m121 0h-114a7 7 0 0 0 -7 7v114a7 7 0 0 0 7 7h114a7 7 0 0 0 7-7v-114a7 7 0 0 0 -7-7zm-114 4h114a3 3 0 0 1 3 3v13h-120v-13a3 3 0 0 1 3-3zm114 120h-114a3 3 0 0 1 -3-3v-97h120v97a3 3 0 0 1 -3 3z"/><path d="m64.1 84.3c-7.82 0-14.92 3.4-18.1 8.7a2 2 0 1 0 3.43 2c2.47-4.09 8.23-6.73 14.67-6.73 6.07 0 11.69 2.44 14.32 6.21a2 2 0 1 0 3.28-2.28c-3.4-4.86-10.15-7.9-17.6-7.9z"/><path d="m48.59 71.41a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 -2.82-2.82l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58z"/><path d="m95.41 52.59a2 2 0 0 0 -2.82 0l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58 6.59 6.58a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 0-2.82z"/></svg>
            <p class="mt-2"><b>Henüz hiç kaydedilen yok</b></p>
        </div>
        @endforelse






        </div>
    </div>

  <!-- Main Content Start -->
    <!-- Main Content Area -->
    <div class="container-fluid">
        <div class="row" style="margin-top: 50px">
            <!-- Sol Menü (Tablet ve Üstü) -->
            <div class="col-lg-3 col-md-3 sidebar">
                <div class="home-sidebar p-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mt-5">
                            <a href="{{ route('dashboard.index') }}" class="nav-link text-dark">
                                <i class="bi bi-house-door me-2"></i>Anasayfa
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <a href="{{ route('discover.index') }}" class="nav-link text-dark">
                                <i class="bi bi-compass me-2"></i>Keşfet
                            </a>
                        </li>
                        @if(Auth::user()->role === 'business')
                        <li class="nav-item mb-1">
                            <a href="{{ route('product.create') }}" class="nav-link text-dark">
                                <i class="bi bi-plus-circle me-2"></i>Ürün oluştur
                            </a>
                        </li>
                        @endif
                        <li class="nav-item mb-1">
                            <a href="{{ route('community.index') }}" class="nav-link text-dark">
                                <i class="bi bi-people me-2"></i>Koleksiyonlar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('save.index') }}" class="nav-link text-dark">
                                <i class="bi bi-heart me-2"></i>Kaydedilenler
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('my.profile') }}" class="nav-link text-dark">
                                <i class="bi bi-person-circle me-2"></i>Profilim
                            </a>
                        </li>


                    </ul>
                </div>
            </div>

            @yield('content')

            <!-- Sağ Öneriler (Desktop ve Üstü) -->
            <div class="col-lg-3 col-md-3 d-none d-lg-block sidebar_right">

                <div class="sidebar_right_content">
                    <div class="sidebar_right_line"></div>
                    <div class="meet-sidebar">Öneriler</div>
                    <div class="sidebar_left_line"></div>
                </div>

                <livewire:suggested-users />


                <div class="sidebar_right_content">
                    <div class="sidebar_right_line"></div>
                    <a href="#" class="show-more-sidebar">Daha fazla kişi</a>
                    <div class="sidebar_left_line"></div>
                </div>


            </div>



        </div>
    </div>
  <!-- Main Content End -->

    <!-- Footer -->
    <footer class="footer mt-5 py-3 text-center text-dark">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center mb-2 small">
                <a wire:navigate href="{{ route('about.index') }}" class="mx-2 text-dark text-decoration-none">Hakkında</a>
                <a wire:navigate href="{{ route('help.index') }}" class="mx-2 text-dark text-decoration-none">Yardım</a>
                <a wire:navigate href="{{ route('carrier.index') }}" class="mx-2 text-dark text-decoration-none">İş Fırsatları</a>
                <a wire:navigate href="{{ route('privacy.policy') }}" class="mx-2 text-dark text-decoration-none">Gizlilik</a>
                <a wire:navigate href="{{ route('kvkk.index') }}" class="mx-2 text-dark text-decoration-none">Kvkk</a>
                <a wire:navigate href="{{ route('user.policy') }}" class="mx-2 text-dark text-decoration-none">Kullanıcı</a>
                <a wire:navigate href="{{ route('community.rule') }}" class="mx-2 text-dark text-decoration-none">Kurallar</a>
            </div>
            <div class="small">
                © 2025 Nextalya
            </div>
        </div>
    </footer>

    <script>
        const notyf = new Notyf({
            duration: 3000,
            position: { x: "right", y: "top" },
            dismissible: true
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
                });
            });

            closeBtn.addEventListener("click", function () {
                menu.classList.remove("active");
            });
        });
    </script>
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
                });
            });

            bellcloseBtn.addEventListener("click", function () {
                bellmenu.classList.remove("active");
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @yield('js')
  <script>
const toggle = document.getElementById("darkModeToggle");

// Sayfa açıldığında kullanıcı tercihini yükle
if(localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark-mode");
    toggle.checked = true;
    changeTextColors("dark");
}

toggle.addEventListener("change", function() {
    if(this.checked) {
        document.body.classList.add("dark-mode");
        localStorage.setItem("theme", "dark");
        changeTextColors("dark");
    } else {
        document.body.classList.remove("dark-mode");
        localStorage.setItem("theme", "light");
        changeTextColors("light");
    }
});

// Fonksiyon: tüm text-darkları text-white yap, geri al
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
  @livewireScripts
</body>

</html>
