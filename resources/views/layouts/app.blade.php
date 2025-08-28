<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nextalya - Sosyal Alışveriş Platformu')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @yield('styles')
    @livewireStyles
</head>
<body>
    <!-- Header -->
    <header class="header-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="logo">
                        <a href="{{ route('dashboard') }}">
                            <h3 class="text-primary fw-bold">Nextalya</h3>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6 d-none d-md-block">
                    <div class="search-box">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="Ürün, kullanıcı veya koleksiyon ara...">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="header-right d-flex align-items-center justify-content-end">
                        @auth
                            <div class="notification-icon me-3">
                                <i class="bi bi-bell fs-5"></i>
                                <span class="notification-badge">3</span>
                            </div>
                            
                            <div class="dropdown">
                                <a href="#" class="profile-dropdown" data-bs-toggle="dropdown">
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile" class="profile-img">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="bi bi-person me-2"></i>Profilim
                                    </a></li>
                                    <li><a class="dropdown-item" href="{{ route('settings') }}">
                                        <i class="bi bi-gear me-2"></i>Ayarlar
                                    </a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bi bi-box-arrow-right me-2"></i>Çıkış Yap
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Giriş Yap</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">Kayıt Ol</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">
            <div class="row">
                <!-- Sol Sidebar -->
                @auth
                <div class="col-lg-3 col-md-4 d-none d-md-block">
                    <div class="sidebar">
                        <div class="sidebar-menu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                        <i class="bi bi-house-door me-2"></i>
                                        Anasayfa
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('discover') ? 'active' : '' }}" href="{{ route('discover') }}">
                                        <i class="bi bi-compass me-2"></i>
                                        Keşfet
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('collections.*') ? 'active' : '' }}" href="{{ route('collections.index') }}">
                                        <i class="bi bi-collection me-2"></i>
                                        Koleksiyonlar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('saved') ? 'active' : '' }}" href="{{ route('saved') }}">
                                        <i class="bi bi-bookmark me-2"></i>
                                        Kaydedilenler
                                    </a>
                                </li>
                                @if(Auth::user()->role === 'business')
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.create') }}">
                                        <i class="bi bi-plus-circle me-2"></i>
                                        Ürün Ekle
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                                        <i class="bi bi-person me-2"></i>
                                        Profilim
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endauth

                <!-- Ana İçerik -->
                <div class="col-lg-{{ Auth::check() ? '6' : '12' }} col-md-{{ Auth::check() ? '8' : '12' }}">
                    @yield('content')
                </div>

                <!-- Sağ Sidebar -->
                @auth
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="sidebar-right">
                        <div class="suggested-users">
                            <h6 class="fw-bold mb-3">Önerilen Kullanıcılar</h6>
                            <div class="user-suggestions">
                                <!-- Önerilen kullanıcılar buraya gelecek -->
                            </div>
                        </div>
                        
                        <div class="trending-topics mt-4">
                            <h6 class="fw-bold mb-3">Trend Konular</h6>
                            <div class="topics">
                                <span class="badge bg-light text-dark me-2 mb-2">#teknoloji</span>
                                <span class="badge bg-light text-dark me-2 mb-2">#moda</span>
                                <span class="badge bg-light text-dark me-2 mb-2">#ev</span>
                                <span class="badge bg-light text-dark me-2 mb-2">#spor</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </main>

    <!-- Mobile Bottom Navigation -->
    @auth
    <div class="mobile-nav d-md-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-menu">
                        <a href="{{ route('dashboard') }}" class="mobile-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="bi bi-house-door"></i>
                            <span>Ana Sayfa</span>
                        </a>
                        <a href="{{ route('discover') }}" class="mobile-nav-item {{ request()->routeIs('discover') ? 'active' : '' }}">
                            <i class="bi bi-compass"></i>
                            <span>Keşfet</span>
                        </a>
                        <a href="{{ route('post.create') }}" class="mobile-nav-item">
                            <i class="bi bi-plus-circle"></i>
                            <span>Ekle</span>
                        </a>
                        <a href="{{ route('saved') }}" class="mobile-nav-item {{ request()->routeIs('saved') ? 'active' : '' }}">
                            <i class="bi bi-bookmark"></i>
                            <span>Kaydedilen</span>
                        </a>
                        <a href="{{ route('profile') }}" class="mobile-nav-item {{ request()->routeIs('profile') ? 'active' : '' }}">
                            <i class="bi bi-person"></i>
                            <span>Profil</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
    @livewireScripts
</body>
</html>