@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')

            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area animate-slide-up">

<div class="modern-container">
@if(!$hasFollowing)
    <div class="card-enhanced text-center my-5 p-5 animate-scale-in">
        <div class="modern-empty-icon mb-3">
            <i class="bi bi-heart-eyes text-gradient-enhanced" style="font-size: 4rem;"></i>
        </div>
        <h3 class="heading-modern text-gradient-enhanced mb-3">Hoşgeldiniz, {{ $user->name }}! 🎉</h3>
        <p class="text-modern mb-4">Henüz kimseyi takip etmiyorsun. Takip edeceğin kişiler bul ve içerikleri keşfet!</p>
        
        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card-enhanced p-4 h-100">
                    <div class="text-center">
                        <i class="bi bi-compass text-gradient-enhanced mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="heading-modern mb-3">Keşfet</h5>
                        <p class="text-modern mb-3">Trend ürünleri ve popüler içerikleri keşfet</p>
                        <a href="{{ route('discover.index') }}" class="btn-primary-enhanced btn-enhanced">
                            <i class="bi bi-search"></i>
                            Keşfetmeye Başla
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-enhanced p-4 h-100">
                    <div class="text-center">
                        <i class="bi bi-people text-gradient-enhanced mb-3" style="font-size: 2.5rem;"></i>
                        <h5 class="heading-modern mb-3">Topluluk</h5>
                        <p class="text-modern mb-3">İlgi alanlarına göre koleksiyonları incele</p>
                        <a href="{{ route('community.index') }}" class="btn-outline-enhanced btn-enhanced">
                            <i class="bi bi-collection"></i>
                            Koleksiyonları Gör
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-5">
            <h5 class="heading-modern mb-4">Takip edebileceğin kişiler</h5>
            <livewire:home-suggest />
        </div>
    </div>
@else
    <div class="modern-feed-container">
        <!-- Quick Actions -->
        <div class="card-enhanced p-4 mb-4 animate-fade-in">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="heading-modern mb-0">Merhaba, {{ $user->name }}! 👋</h5>
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
