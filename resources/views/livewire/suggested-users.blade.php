<div class="p-0" wire:init="loadUsers">
    @foreach($this->users as $user)
        <div class="card-enhanced p-3 mb-3 hover-lift-enhanced animate-fade-in" wire:key="user-{{ $user->id }}">
            <div class="d-flex align-items-center">
                <a href="{{ route('user.account', $user->username) }}" class="text-decoration-none">
                    <img src="{{ asset('storage/' . $user->avatar) }}"
                         class="rounded-circle me-3" style="width: 48px; height: 48px; object-fit: cover;" alt="{{ $user->username }}">
                </a>
                <div class="flex-grow-1">
                    <a href="{{ route('user.account', $user->username) }}" class="text-decoration-none">
                        <h6 class="mb-1 fw-semibold">{{ $user->name }}</h6>
                        <p class="text-muted small mb-1">{{ '@' . $user->username }}</p>
                    </a>
                    <div class="small">
                        @if(auth()->user()->isFollowedBy($user))
                            <span class="modern-badge modern-badge-success">Seni takip ediyor</span>
                        @elseif($user->created_at->diffInDays() < 7)
                            <span class="modern-badge modern-badge-primary">Yeni Katıldı</span>
                        @else
                            <span class="text-muted">{{ $user->products_count ?? 0 }} ürün</span>
                        @endif
                    </div>
                </div>
                
                <div class="ms-auto">
                    @if(auth()->user()->isFollowing($user))
                        <button wire:click="unfollow({{ $user->id }})"
                                class="btn-secondary-enhanced btn-enhanced btn-sm">
                            <i class="bi bi-check"></i>
                            Takip Ediliyor
                        </button>
                    @else
                        <button wire:click="follow({{ $user->id }})"
                                class="btn-primary-enhanced btn-enhanced btn-sm">
                            <i class="bi bi-plus"></i>
                            Takip Et
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    @if($loaded && $this->users->isEmpty())
        <div class="modern-empty-state">
            <div class="modern-empty-icon">
                <i class="bi bi-people"></i>
            </div>
            <h6 class="modern-empty-title">Önerilecek kullanıcı kalmadı</h6>
            <p class="modern-empty-description">Yeni kullanıcılar katıldığında burada görünecek</p>
        </div>
    @endif
</div>
