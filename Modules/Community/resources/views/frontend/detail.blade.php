@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')

      <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
                <div class="profile-tab-section-saved-posts-wrapper">
                    <div
                        class="profile-tab-section-saved-posts-header d-flex justify-content-between align-items-start">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $data->user->avatar) }}" alt="Profile Picture"
                                class="profile-tab-section-saved-posts-image">
                            <div class="ms-3">
                                <h4 class="profile-tab-section-saved-posts-name">{{ $data->user->name }}</h4>
                                <div class="d-flex align-items-center mt-1">
                                    <span class="profile-tab-section-saved-posts-rating">{{ '@' . $data->user->username }}</span>
                                </div>
                            </div>
                        </div>


                    </div>

                    <p class="profile-tab-section-saved-posts-description mt-2">
                        {{ $data->description }}
                    </p>


                </div>

                <div class="search-page-container">
                    <div
                        class="profile-tab-section-saved-posts-toolbar d-flex justify-content-between align-items-center mt-3">
                        <div class="profile-tab-section-saved-posts-toolbar-title">
                            {{ $data->name }}
                        </div>
                        <div class="profile-tab-section-saved-posts-toolbar-icons d-flex gap-3">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#shareModal{{ $data->id }}">
                                <i class="bi bi-share-fill"></i>
                            </a>
                        </div>
                    </div>

                            <div class="row product-posts-container gx-4 gy-4">
                                <div class="profile-tab-section-posts-new-grid-wrapper">

                                    <div class="row">
                                    @forelse ($products as $take)
                                    <div class="col-md-6 mb-3">
                                    <div class="product-post-card">
                                        <div class="product-post-header">
                                            <a href="" class="product-post-profile-link">
                                                <img src="{{ asset('storage/'.$take->product->user->avatar) }}" alt="Profile"
                                                    class="product-post-profile" />
                                            </a>
                                            <div class="product-post-user">
                                                <a href="#" class="product-post-name">{{ $take->product->user->name }}</a>
                                                <a href="#" class="product-post-username">{{ '@' . $take->product->user->username }}</a>
                                            </div>
                                            <div class="product-post-actions">

                                                <a href="{{ route('product.detail',$take->product->slug) }}" class="product-post-options">
                                                    <i class="bi bi-three-dots"></i>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="product-post-title-row">
                                            <div class="product-post-title">{{ $take->product->title }}</div>
                                            <a href="#" target="_blank">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                        </div>

                                        <img src="{{ asset('storage/product/'.$take->product->image) }}" class="product-post-image"
                                            alt="Product Image">

                                        <div class="product-post-meta">
                                            <div class="product-post-price">{{ $take->product->price }} ₺</div>
                                        </div>

                                        <div class="product-post-description">
                                            {{ $take->product->description }}
                                        </div>

                                        <div class="product-post-footer">
                                            <div class="product-post-left-icons">


                                                <a href="#" class="product-link-post-icon" data-product-id="{{ $take->product->id }}">
                                                    <i class="bi {{ $take->product->isLikedBy(auth()->user()) ? 'bi-heart-fill text-danger' : 'bi-heart' }}"></i>
                                                    <span class="like-count">{{ $take->product->likes->count() }}</span>
                                                </a>
                                                <a href="#" class="product-post-icon">
                                                    <i class="bi bi-chat"></i>
                                                    <span>4</span>
                                                </a>
                                            </div>
                                            <div class="product-post-right-icons">
                                            @if(\Modules\Save\Models\Favories::isSave($take->product->id))
                                                    <a wire:navigate href="{{ route('product.favories', $take->product->id) }}" class="product-link-post-iconx"><i class="bi bi-bookmark-fill"></i></a>
                                                @else
                                                    <a wire:navigate href="{{ route('product.favories', $take->product->id) }}" class="product-link-post-iconx"><i class="bi bi-bookmark"></i></a>
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
                                        <p>Herhangi bir veri bulunamadı!</p>
                                        @endforelse

                                    </div>



                                </div>
                            </div>


                </div>
            </div>
    <!-- Modal -->
<div class="modal fade" id="shareModal{{ $data->id }}" tabindex="-1" aria-labelledby="shareModalLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel{{ $data->id }}">Paylaş</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div class="d-flex justify-content-center gap-3 mb-3">
                    <a href="mailto:?body={{ urlencode(route('community.detail',$data->community_token)) }}" class="btn btn-outline-secondary"><i class="bi bi-envelope"></i></a>
                    <a href="https://wa.me/?text={{ urlencode(route('community.detail',$data->community_token)) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('community.detail',$data->community_token)) }}" target="_blank" class="btn btn-outline-primary"><i class="bi bi-linkedin"></i></a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('community.detail',$data->community_token)) }}" target="_blank" class="btn btn-outline-dark"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('community.detail',$data->community_token)) }}" target="_blank" class="btn btn-outline-primary"><i class="bi bi-facebook"></i></a>
                </div>
                <div class="input-group">
                    <input type="text" id="shareLink{{ $data->id }}" class="form-control" value="{{ route('community.detail',$data->community_token) }}" readonly>
                    <button class="btn btn-dark" onclick="copyLink{{ $data->id }}()">Kopyala</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
function copyLink{{ $data->id }}() {
    var copyText = document.getElementById("shareLink{{ $data->id }}");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
}
</script>

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
