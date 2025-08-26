@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/add-post-create-discussion.css') }}">
@endsection
@section('content')

            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">

                <!-- Paylaş sonrası: ürün postu görünümü -->
                <div class="search-page-container">
                    <div class="product-post-card">
                    <div class="product-post-header">
                        <a href="{{ route('user.account',$take->user->username) }}" class="product-post-profile-link">
                            <img src="{{ asset('storage/'.$take->user->avatar) }}" alt="Profile"
                                class="product-post-profile" />
                        </a>
                        <div class="product-post-user">
                            <a href="{{ route('user.account',$take->user->username) }}" class="product-post-name">{{ $take->user->name }}</a>
                            <a href="{{ route('user.account',$take->user->username) }}" class="product-post-username">{{ '@' . $take->user->username }}</a>
                        </div>
                        <div class="product-post-actions ">
                            <a href="#" class="product-post-options " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#collection-{{ $take->id }}">Koleksiyona kaydet</a></li>
                            </ul>
                        </div>
                    </div>

                        <div class="product-link-post-title-row mb-2">
                            <span class="product-link-post-title">{{ $take->title }}</span>
                            @if($take->url)
                             <a href="{{ $take->url }}" class="product-link-post-link" target="_blank">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                            @endif
                        </div>

                            @if(Str::startsWith($take->image, 'http'))
                                <img class="product-post-image" src="{{ $take->image }}" alt="{{ $take->title }} ürün kartı, fiyatı {{ $take->price }} Türk Lirası, ürün adı {{ $take->title }}" class="search-product-image" />
                            @else
                                <img class="product-post-image" src="{{ asset('storage/product/' . $take->image) }}" alt="{{ $take->title }} ürün kartı, fiyatı {{ $take->price }} Türk Lirası, ürün adı {{ $take->title }}" class="search-product-image" />
                            @endif

                        <div class="product-link-post-desc-wrapper">
                            <p class="product-link-post-description">{{ $take->description }}</p>
                            <p class="product-link-post-price"></p>
                        </div>

                        <ul class="product-post-feature-list">
                            @foreach ($features as $key)
                                <li><i class="bi bi-check-circle"></i> {{ $key->feature_name }}</li>
                            @endforeach
                        </ul>

                        <div class="product-link-post-footer">
                            <div class="product-link-post-left-icons">
                                <a href="#" class="product-link-post-icon" data-product-id="{{ $take->id }}">
                                    <i class="bi {{ $take->isLikedBy(auth()->user()) ? 'bi-heart-fill text-danger' : 'bi-heart' }}"></i>
                                    <span class="like-count">{{ $take->likes->count() }}</span>
                                </a>

                            </div>
                            <div class="product-post-right-icons">
                            @if(\Modules\Save\Models\Favories::isSave($take->id))
                                    <a style="margin-top: 5px" wire:navigate href="{{ route('product.favories', $take->id) }}" class="product-link-post-iconx"><i class="bi bi-bookmark-fill"></i></a>
                                @else
                                    <a style="margin-top: 5px" wire:navigate href="{{ route('product.favories', $take->id) }}" class="product-link-post-iconx"><i class="bi bi-bookmark"></i></a>
                                @endif
                                <a href="#" data-bs-toggle="modal" data-bs-target="#shareModal{{ $take->id }}" class="product-post-icon">
                                    <i class="bi bi-share"></i>
                                </a>
                            </div>
                        </div>
                        <div class="discussion-comments">
                        <form action="{{ route('comment.store',$take->id) }}" method="POST">
                            @csrf
                        <div class="discussion-comment-input">
                            <input type="text" id="discussion-comment-input" name="comment" required placeholder="Yorum ekle...">
                            <button type="submit" class="discussion-comment-send"><i class="bi bi-send"></i></button>

                        </div>
                        </form>

                        <div class="discussion-comment-list">
                            @forelse ($comment as $takeComment)
                                <div class="discussion-comment"><strong>{{ $takeComment->user->username }}:</strong> {{ $takeComment->comment }}</div>
                            @empty
                            <div class="text-center">
                                <svg id="&#x421;&#x43B;&#x43E;&#x439;_1" height="72" viewBox="0 0 128 128" width="72" xmlns="http://www.w3.org/2000/svg"><circle cx="114" cy="12" r="2"/><circle cx="106" cy="12" r="2"/><circle cx="98" cy="12" r="2"/><path d="m121 0h-114a7 7 0 0 0 -7 7v114a7 7 0 0 0 7 7h114a7 7 0 0 0 7-7v-114a7 7 0 0 0 -7-7zm-114 4h114a3 3 0 0 1 3 3v13h-120v-13a3 3 0 0 1 3-3zm114 120h-114a3 3 0 0 1 -3-3v-97h120v97a3 3 0 0 1 -3 3z"/><path d="m64.1 84.3c-7.82 0-14.92 3.4-18.1 8.7a2 2 0 1 0 3.43 2c2.47-4.09 8.23-6.73 14.67-6.73 6.07 0 11.69 2.44 14.32 6.21a2 2 0 1 0 3.28-2.28c-3.4-4.86-10.15-7.9-17.6-7.9z"/><path d="m48.59 71.41a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 -2.82-2.82l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58z"/><path d="m95.41 52.59a2 2 0 0 0 -2.82 0l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58 6.59 6.58a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 0-2.82z"/></svg>
                                <p class="mt-2"><b>Henüz hiç yorum yok, ilk yorumu siz yapın</b></p>
                            </div>
                            @endforelse


                        </div>
                    </div>
                    </div>
                </div>
            </div>
@include('component.collection')
@include('component.repost')


<div class="modal fade" id="shareModal{{ $take->id }}" tabindex="-1" aria-labelledby="shareModalLabel{{ $take->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel{{ $take->id }}">Paylaş</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div class="d-flex justify-content-center gap-3 mb-3">
                    <a href="mailto:?body={{ urlencode(route('product.detail',$take->slug)) }}" class="btn btn-outline-secondary"><i class="bi bi-envelope"></i></a>
                    <a href="https://wa.me/?text={{ urlencode(route('product.detail',$take->slug)) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('product.detail',$take->slug)) }}" target="_blank" class="btn btn-outline-primary"><i class="bi bi-linkedin"></i></a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('product.detail',$take->slug)) }}" target="_blank" class="btn btn-outline-dark"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('product.detail',$take->slug)) }}" target="_blank" class="btn btn-outline-primary"><i class="bi bi-facebook"></i></a>
                </div>
                <div class="input-group">
                    <input type="text" id="shareLink{{ $take->id }}" class="form-control" value="{{ route('product.detail',$take->slug) }}" readonly>
                    <button class="btn btn-dark" onclick="copyLink{{ $take->id }}()">Kopyala</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
function copyLink{{ $take->id }}() {
    var copyText = document.getElementById("shareLink{{ $take->id }}");
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
