<div>
                @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

 <div class="search-product-cards">
        <div class="row">
        @forelse ($data as $take)
            <div class="col-md-4">
           <div class="search-product-card" data-category="shoes">
            @if($this->isInCommunity($take->id, $community_id))
                    <button type="button" class="btn btn-danger"
                        wire:click="removeProduct({{ $take->id }}, {{ $community_id }})">
                        -
                    </button>
                @else
                    <button type="button" class="btn btn-success"
                        wire:click="addProduct({{ $take->id }}, {{ $community_id }})">
                        +
                    </button>
                @endif

                <img src="{{ asset('storage/product/' . $take->image) }}" alt="{{ $take->slug }}"
                    class="search-product-image" />
                <div class="search-product-price">{{ $take->price }} ₺</div>
                <div class="search-product-name">
                    <a href="{{ route('product.detail', $take->slug) }}">
                        {{ $take->title }}
                    </a>
                </div>
            </div>
            </div>

        @empty

        @endforelse
    </div>
    </div>
    {{ $data->links() }}
</div>
