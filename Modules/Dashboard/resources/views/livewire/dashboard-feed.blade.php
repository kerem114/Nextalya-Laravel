<div>
    <div class="row" id="feed-container">
    @foreach($feed as $take)
        <div class="col-md-12 mb-3 feed-item">
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

<div class="text-center mt-3">
    @if($feed->hasMorePages())
        <button wire:click="loadMore" class="btn btn-primary">
            Daha Fazla Yükle
        </button>
    @endif
</div>

</div>
