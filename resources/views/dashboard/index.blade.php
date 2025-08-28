@extends('layouts.app')

@section('title', 'Anasayfa - Nextalya')

@section('content')
<div class="dashboard-content">
    <!-- Hoş Geldin Mesajı -->
    <div class="welcome-card post-card fade-in">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="fw-bold mb-2">Merhaba, {{ Auth::user()->name }}! 👋</h4>
                <p class="text-muted mb-0">Bugün ne keşfetmek istiyorsun?</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus me-1"></i>
                    Yeni Gönderi
                </a>
                @if(Auth::user()->role === 'business')
                <a href="{{ route('products.create') }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-box me-1"></i>
                    Ürün Ekle
                </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Hikayeler -->
    <div class="stories-section post-card fade-in">
        <h6 class="fw-bold mb-3">Hikayeler</h6>
        <div class="stories-container d-flex gap-3 overflow-auto">
            <div class="story-item text-center">
                <div class="story-avatar-container position-relative">
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Hikayem" class="story-avatar">
                    <div class="add-story-btn">
                        <i class="bi bi-plus"></i>
                    </div>
                </div>
                <small class="mt-2 d-block">Hikayem</small>
            </div>
            
            @for($i = 1; $i <= 8; $i++)
            <div class="story-item text-center">
                <img src="https://images.pexels.com/photos/{{ 1000000 + $i }}/pexels-photo-{{ 1000000 + $i }}.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&dpr=1" alt="Hikaye {{ $i }}" class="story-avatar">
                <small class="mt-2 d-block">kullanici{{ $i }}</small>
            </div>
            @endfor
        </div>
    </div>

    <!-- Gönderi Oluştur -->
    <div class="create-post-card post-card fade-in">
        <div class="d-flex align-items-center">
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile" class="post-avatar me-3">
            <div class="flex-grow-1">
                <a href="{{ route('post.create') }}" class="form-control text-start text-muted" style="cursor: pointer;">
                    Ne düşünüyorsun, {{ Auth::user()->name }}?
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-3 pt-3 border-top">
            <a href="{{ route('post.create') }}" class="create-option">
                <i class="bi bi-image text-success me-2"></i>
                Fotoğraf
            </a>
            <a href="{{ route('products.create') }}" class="create-option">
                <i class="bi bi-box text-primary me-2"></i>
                Ürün
            </a>
            <a href="{{ route('poll.create') }}" class="create-option">
                <i class="bi bi-bar-chart text-warning me-2"></i>
                Anket
            </a>
        </div>
    </div>

    <!-- Feed -->
    <div class="feed-container">
        @forelse($feedItems as $item)
            @if($item->type === 'product')
                @include('components.product-card', ['product' => $item])
            @elseif($item->type === 'post')
                @include('components.post-card', ['post' => $item])
            @elseif($item->type === 'poll')
                @include('components.poll-card', ['poll' => $item])
            @endif
        @empty
            <div class="empty-state post-card text-center">
                <div class="mb-4">
                    <i class="bi bi-heart-eyes text-primary" style="font-size: 4rem;"></i>
                </div>
                <h5 class="fw-bold mb-3">Henüz kimseyi takip etmiyorsun!</h5>
                <p class="text-muted mb-4">Takip edeceğin kişiler bul ve içerikleri keşfet!</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ route('discover') }}" class="btn btn-primary">
                        <i class="bi bi-compass me-2"></i>
                        Keşfet
                    </a>
                    <a href="{{ route('collections.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-collection me-2"></i>
                        Koleksiyonlar
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>

<style>
.stories-container {
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.stories-container::-webkit-scrollbar {
    display: none;
}

.story-item {
    flex-shrink: 0;
    cursor: pointer;
}

.story-avatar {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--primary-color);
    transition: all 0.3s ease;
}

.story-avatar:hover {
    transform: scale(1.05);
}

.story-avatar-container {
    position: relative;
}

.add-story-btn {
    position: absolute;
    bottom: 0;
    right: 0;
    background: var(--primary-color);
    color: white;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    border: 2px solid white;
}

.create-option {
    color: var(--gray-600);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    padding: var(--space-2) var(--space-3);
    border-radius: var(--radius-md);
}

.create-option:hover {
    background: var(--gray-100);
    color: var(--gray-800);
}
</style>
@endsection