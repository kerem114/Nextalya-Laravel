@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')

            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">


                <div class="search-page-container">
                    <div
                        class="profile-tab-section-saved-posts-toolbar d-flex justify-content-between align-items-center mt-3">
                        <div class="profile-tab-section-saved-posts-toolbar-title">
                            Kaydedilenler
                        </div>

                    </div>

                    <!-- Product Cards Section -->
                    <div class="search-product-cards">
                        <div class="row">
                            @forelse ($savedItems as $take)
                            <div class="col-md-6 mb-3">
                            <div class="product-post-card">
                                <div class="product-post-header">
                                    <a href="" class="product-post-profile-link">
                                        <img src="{{ asset('storage/'.$take->getProduct->user->avatar) }}" alt="Profile"
                                            class="product-post-profile" />
                                    </a>
                                    <div class="product-post-user">
                                        <a href="#" class="product-post-name">{{ $take->getProduct->user->name }}</a>
                                        <a href="#" class="product-post-username">{{ '@' . $take->getProduct->user->username }}</a>
                                    </div>
                                    <div class="product-post-actions ">

                                        <a href="#" class="product-post-options " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Koleksiyona kaydet</a></li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="product-post-title-row">
                                    <div class="product-post-title">{{ $take->getProduct->title }}</div>
                                    <a href="{{ route('product.detail',$take->getProduct->slug) }}" target="_blank">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                </div>

                                <img src="{{ asset('storage/product/'.$take->getProduct->image) }}" class="product-post-image"
                                    alt="Product Image">

                                <div class="product-post-meta">
                                    <div class="product-post-price">{{ $take->getProduct->price }} ₺</div>
                                </div>

                                <div class="product-post-description">
                                    {{ $take->getProduct->description }}
                                </div>

                                <div class="product-post-footer">
                                    <div class="product-post-left-icons">


                                        <a href="#" class="product-link-post-icon" data-product-id="{{ $take->getProduct->id }}">
                                            <i class="bi {{ $take->getProduct->isLikedBy(auth()->user()) ? 'bi-heart-fill text-danger' : 'bi-heart' }}"></i>
                                            <span class="like-count">{{ $take->getProduct->likes->count() }}</span>
                                        </a>
                                        <a href="#" class="product-post-icon">
                                            <i class="bi bi-chat"></i>
                                            <span>4</span>
                                        </a>
                                    </div>
                                    <div class="product-post-right-icons">
                                    @if(\Modules\Save\Models\Favories::isSave($take->getProduct->id))
                                            <a wire:navigate href="{{ route('product.favories', $take->getProduct->id) }}" class="product-link-post-iconx"><i class="bi bi-bookmark-fill"></i></a>
                                        @else
                                            <a wire:navigate href="{{ route('product.favories', $take->getProduct->id) }}" class="product-link-post-iconx"><i class="bi bi-bookmark"></i></a>
                                        @endif
                                        <a href="#" class="product-post-icon">
                                            <i class="bi bi-share"></i>
                                            <span>4</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                                @empty
                                    <div class="text-center">
                                        <svg id="&#x421;&#x43B;&#x43E;&#x439;_1" height="72" viewBox="0 0 128 128" width="72" xmlns="http://www.w3.org/2000/svg"><circle cx="114" cy="12" r="2"/><circle cx="106" cy="12" r="2"/><circle cx="98" cy="12" r="2"/><path d="m121 0h-114a7 7 0 0 0 -7 7v114a7 7 0 0 0 7 7h114a7 7 0 0 0 7-7v-114a7 7 0 0 0 -7-7zm-114 4h114a3 3 0 0 1 3 3v13h-120v-13a3 3 0 0 1 3-3zm114 120h-114a3 3 0 0 1 -3-3v-97h120v97a3 3 0 0 1 -3 3z"/><path d="m64.1 84.3c-7.82 0-14.92 3.4-18.1 8.7a2 2 0 1 0 3.43 2c2.47-4.09 8.23-6.73 14.67-6.73 6.07 0 11.69 2.44 14.32 6.21a2 2 0 1 0 3.28-2.28c-3.4-4.86-10.15-7.9-17.6-7.9z"/><path d="m48.59 71.41a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 -2.82-2.82l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58z"/><path d="m95.41 52.59a2 2 0 0 0 -2.82 0l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58 6.59 6.58a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 0-2.82z"/></svg>
                                        <p class="mt-2"><b>Henüz hiç kaydedilen yok</b></p>
                                    </div>
                                @endforelse

                            </div>





                    </div>
                </div>
            </div>

@section('js')

    <script>
document.querySelectorAll('.product-link-post-icon').forEach(icon => {
    icon.addEventListener('click', function(e) {
        e.preventDefault();

        const productId = this.getAttribute('data-product-id');
        const heartIcon = this.querySelector('i');
        const likeCountSpan = this.querySelector('.like-count');
        let currentCount = parseInt(likeCountSpan.textContent);

        fetch(`/product/${productId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({})
        })
        .then(res => res.json())
        .then(data => {
            if (data.liked) {
                heartIcon.classList.add('text-danger');
                heartIcon.classList.remove('bi-heart');
                heartIcon.classList.add('bi-heart-fill');
                currentCount += 1;
            } else {
                heartIcon.classList.remove('text-danger');
                heartIcon.classList.remove('bi-heart-fill');
                heartIcon.classList.add('bi-heart');
                currentCount = Math.max(currentCount - 1, 0);
            }
            likeCountSpan.textContent = currentCount;
        })
        .catch(err => console.error(err));
    });
});



</script>
@endsection
@endsection
