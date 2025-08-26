<div>
    <div class="modern-feed-grid" id="feed-container">
    @foreach($feed as $take)
        <div class="feed-item animate-fade-in" style="animation-delay: {{ $loop->index * 0.1 }}s">
            @if($take->type === 'product')
                @include('dashboard::frontend.include.product')
            @elseif($take->type === 'post')
                @include('dashboard::frontend.include.post')
            @elseif($take->type === 'poll')
                @include('dashboard::frontend.include.poll')
            @elseif($take->type === 'discussion')
                @include('dashboard::frontend.include.discussion')
            @endif
        </div>
    @endforeach
    </div>

    @if($feed->hasMorePages())
        <div class="text-center mt-5">
            <button wire:click="loadMore" class="btn-primary-enhanced btn-enhanced" wire:loading.attr="disabled">
                <span wire:loading.remove>
                    <i class="bi bi-arrow-down"></i>
                    Daha Fazla Yükle
                </span>
                <span wire:loading>
                    <div class="modern-spinner me-2"></div>
                    Yükleniyor...
                </span>
            </button>
        </div>
    @endif
    
    @if($feed->isEmpty())
        <div class="modern-empty-state">
            <div class="modern-empty-icon">
                <i class="bi bi-inbox"></i>
            </div>
            <h5 class="modern-empty-title">Henüz içerik yok</h5>
            <p class="modern-empty-description">Takip ettiğin kişiler içerik paylaştığında burada görünecek</p>
            <a href="{{ route('discover.index') }}" class="btn-primary-enhanced btn-enhanced">
                <i class="bi bi-compass"></i>
                Keşfetmeye Başla
            </a>
        </div>
    @endif

</div>
