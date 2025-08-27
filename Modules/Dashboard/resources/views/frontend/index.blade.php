@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')

            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area animate-slide-up">

<div class="container-fluid px-0">
@if(!$hasFollowing)
    <div class="card-enhanced text-center my-5 p-5 animate-scale-in">
        <div class="mb-4">
            <i class="bi bi-heart-eyes text-gradient" style="font-size: 4rem;"></i>
        </div>
        <h3 class="fw-bold text-gradient mb-3">Hoşgeldin, {{ $user->name }}! 🎉</h3>
        <p class="text-muted mb-4">Henüz kimseyi takip etmiyorsun. Takip edeceğin kişiler bul ve içerikleri keşfet!</p>
        
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card-enhanced p-4 h-100 hover-lift">
                    <div class="text-center">
                        <i class="bi bi-compass text-gradient mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="fw-bold mb-3">Keşfet</h5>
                        <p class="text-muted mb-3">Trend ürünleri ve popüler içerikleri keşfet</p>
                        <a href="{{ route('discover.index') }}" class="btn-primary-enhanced btn-enhanced">
                            <i class="bi bi-search"></i>
                            Keşfetmeye Başla
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-enhanced p-4 h-100 hover-lift">
                    <div class="text-center">
                        <i class="bi bi-people text-gradient mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="fw-bold mb-3">Topluluk</h5>
                        <p class="text-muted mb-3">İlgi alanlarına göre koleksiyonları incele</p>
                        <a href="{{ route('community.index') }}" class="btn-outline-enhanced btn-enhanced">
                            <i class="bi bi-collection"></i>
                            Koleksiyonları Gör
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-5">
            <h5 class="fw-bold mb-4">Takip edebileceğin kişiler</h5>
            <livewire:suggested-users />
        </div>
    </div>
@else
    <div class="feed-container">
        <!-- Quick Actions -->
        <div class="card-enhanced p-4 mb-4 animate-fade-in">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Merhaba, {{ $user->name }}! 👋</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('post.index') }}" class="btn-primary-enhanced btn-enhanced btn-sm">
                        <i class="bi bi-plus"></i>
                        Yeni Gönderi
                    </a>
                    @if(Auth::user()->role === 'business')
                    <a href="{{ route('product.create') }}" class="btn-outline-enhanced btn-enhanced btn-sm">
                        <i class="bi bi-box"></i>
                        Ürün Ekle
                    </a>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Feed Content -->
        <livewire:dashboard::dashboard-feed />
    </div>
@endif
</div>

@endsection
