<div>
    <input type="text" wire:model.live="search" placeholder="Bir koleksiyon arayın..." class="form-control mb-3">
    <div class="row meet-user-card-grid">

        @forelse ($users as $user)
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
            <div class="meet-user-card">
                <div class="meet-user-content">
                    <a href="{{ route('user.account', $user->username) }}">
                        <img src="{{ asset('storage/'.$user->avatar) }}" class="meet-user-image"
                             alt="{{ $user->name }}" />
                    </a>
                    <div class="meet-user-info">
                        <div class="meet-user-name">{{ $user->name }}</div>
                        <div class="meet-user-followers">
                            @if($user->community_products_count > 0)
                                {{ $user->community_products_count }} Ürün
                            @else
                                {{ $user->communities_count }} Topluluk
                            @endif
                        </div>
                        <div class="meet-user-description">{{ '@'.$user->username }}</div>
                    </div>
                    @if($user->communities_count > 0)
                        <a href="{{ route('user.community.detail', $user->username) }}"
                           class="meet-follow-button">
                            Görüntüle
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
    <div class="text-center">
        <svg id="&#x421;&#x43B;&#x43E;&#x439;_1" height="72" viewBox="0 0 128 128" width="72" xmlns="http://www.w3.org/2000/svg"><circle cx="114" cy="12" r="2"/><circle cx="106" cy="12" r="2"/><circle cx="98" cy="12" r="2"/><path d="m121 0h-114a7 7 0 0 0 -7 7v114a7 7 0 0 0 7 7h114a7 7 0 0 0 7-7v-114a7 7 0 0 0 -7-7zm-114 4h114a3 3 0 0 1 3 3v13h-120v-13a3 3 0 0 1 3-3zm114 120h-114a3 3 0 0 1 -3-3v-97h120v97a3 3 0 0 1 -3 3z"/><path d="m64.1 84.3c-7.82 0-14.92 3.4-18.1 8.7a2 2 0 1 0 3.43 2c2.47-4.09 8.23-6.73 14.67-6.73 6.07 0 11.69 2.44 14.32 6.21a2 2 0 1 0 3.28-2.28c-3.4-4.86-10.15-7.9-17.6-7.9z"/><path d="m48.59 71.41a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 -2.82-2.82l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58z"/><path d="m95.41 52.59a2 2 0 0 0 -2.82 0l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58 6.59 6.58a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 0-2.82z"/></svg>
        <p class="mt-2"><b>Henüz hiç koleksiyon yok</b></p>
    </div>
        @endforelse

    </div>
    {{ $users->links() }}
</div>
