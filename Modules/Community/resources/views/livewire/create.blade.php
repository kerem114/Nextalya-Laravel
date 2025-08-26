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
            @if($this->isInCommunity($take->getProduct->id, $community_id))
                    <button type="button" class="btn btn-danger mt-2"
                        wire:click="removeProduct({{ $take->getProduct->id }}, {{ $community_id }})">
                        -
                    </button>
                @else
                    <button type="button" class="btn btn-success mt-2"
                        wire:click="addProduct({{ $take->getProduct->id }}, {{ $community_id }})">
                        +
                    </button>
                @endif

                <img src="{{ asset('storage/product/' . $take->getProduct->image) }}" alt="{{ $take->getProduct->slug }}"
                    class="search-product-image" />
                <div class="search-product-price">{{ $take->getProduct->price }} ₺</div>
                <div class="search-product-name">
                    <a href="{{ route('product.detail', $take->getProduct->slug) }}">
                        {{ $take->getProduct->title }}
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
