<div class="mt-3" wire:init="loadUsers">
    @foreach($this->users as $user)
        <div class="d-flex align-items-center mb-3" wire:key="user-{{ $user->id }}">
            <img src="{{ asset('storage/' . $user->avatar) }}"
                 class="rounded-circle me-2 profile-img-sm" alt="{{ $user->username }}">
            <div class="flex-grow-1">
                <a href="{{ route('user.account', $user->username) }}">
                   <p class="text-dark"> {{ $user->username }}</p>
                </a>
                <div class="small text-muted">
                    @if(auth()->user()->isFollowedBy($user))
                        <span class="text-success">Seni takip ediyor</span>
                    @elseif($user->created_at->diffInDays() < 7)
                        Yeni Katıldı
                    @else
                        {{ $user->full_name }}
                    @endif
                </div>
            </div>

            @if(auth()->user()->isFollowing($user))
                <button wire:click="unfollow({{ $user->id }})"
                        class="btn btn-sm ms-auto btn-secondary">
                    Takip Ediliyor
                </button>
            @else
                <button wire:click="follow({{ $user->id }})"
                        class="btn btn-sm ms-auto btn-outline-primary">
                    Takip Et
                </button>
            @endif
        </div>
    @endforeach

    @if($loaded && $this->users->isEmpty())
        <div class="text-center py-3 text-muted">
            Önerilecek kullanıcı kalmadı
        </div>
    @endif
</div>
