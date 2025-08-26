

<div class="product-post-card">
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

