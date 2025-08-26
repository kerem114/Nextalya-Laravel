<div class="row">
@forelse ($data as $take)
<div class="col-md-6 mb-3">
    @include('component.product')
</div>
@empty

@endforelse
@if($perPage < $total)
    <div class="text-center mt-3">
        <button wire:click="loadMore" class="btn btn-primary">
            Daha Fazla Gör
        </button>
    </div>
@endif
</div>
