<div>
@forelse ($data as $take)

<div class="product-post-card mb-3">
        <div class="product-post-header mb-3">
        <a href="{{ route('user.account',$take->user->username) }}" class="product-post-profile-link">
            <img src="{{ asset('storage/'.$take->user->avatar) }}" alt="Profile"
                class="product-post-profile" />
        </a>
        <div class="product-post-user">
            <a href="{{ route('user.account',$take->user->username) }}" class="product-post-name">{{ $take->user->name }}</a>
            <a href="{{ route('user.account',$take->user->username) }}" class="product-post-username">{{ '@' . $take->user->username }}</a>
        </div>

    </div>
    @livewire('member::polloption', ['poll' => $take], key($take->id))
</div>
@empty
    <div class="text-center">
        <svg id="&#x421;&#x43B;&#x43E;&#x439;_1" height="72" viewBox="0 0 128 128" width="72" xmlns="http://www.w3.org/2000/svg"><circle cx="114" cy="12" r="2"/><circle cx="106" cy="12" r="2"/><circle cx="98" cy="12" r="2"/><path d="m121 0h-114a7 7 0 0 0 -7 7v114a7 7 0 0 0 7 7h114a7 7 0 0 0 7-7v-114a7 7 0 0 0 -7-7zm-114 4h114a3 3 0 0 1 3 3v13h-120v-13a3 3 0 0 1 3-3zm114 120h-114a3 3 0 0 1 -3-3v-97h120v97a3 3 0 0 1 -3 3z"/><path d="m64.1 84.3c-7.82 0-14.92 3.4-18.1 8.7a2 2 0 1 0 3.43 2c2.47-4.09 8.23-6.73 14.67-6.73 6.07 0 11.69 2.44 14.32 6.21a2 2 0 1 0 3.28-2.28c-3.4-4.86-10.15-7.9-17.6-7.9z"/><path d="m48.59 71.41a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 -2.82-2.82l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58z"/><path d="m95.41 52.59a2 2 0 0 0 -2.82 0l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58 6.59 6.58a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 0-2.82z"/></svg>
        <p class="mt-2"><b>Henüz hiç anket yok</b></p>
    </div>
@endforelse
@if($perPage < $total)
    <div class="text-center mt-3">
        <button wire:click="loadMore" class="btn btn-primary">
            Daha Fazla Gör
        </button>
    </div>
@endif

</div>
