<div class="product-post-card mb-3">
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
    <div class="product-post-title-row">
        <div class="product-post-title">{{ $take->title }}</div>
        @if($take->url)
        <a href="{{ $take->url }}" target="_blank">
            <i class="bi bi-box-arrow-up-right"></i>
        </a>
        @endif
    </div>

    @if(Str::startsWith($take->image, 'http'))
        <img class="product-post-image" src="{{ $take->image }}" alt="{{ $take->title }} ürün kartı, fiyatı {{ $take->price }} Türk Lirası, ürün adı {{ $take->title }}" class="search-product-image" />
    @else
        <img class="product-post-image" src="{{ asset('storage/product/' . $take->image) }}" alt="{{ $take->title }} ürün kartı, fiyatı {{ $take->price }} Türk Lirası, ürün adı {{ $take->title }}" class="search-product-image" />
    @endif
    <div class="product-post-meta">
        <div class="product-post-price">{{ $take->price }} ₺</div>
    </div>
    <div class="product-post-description">
        {{ $take->description }}
    </div>
    <div class="product-post-footer">
        <div class="product-post-left-icons">
            <a href="#" style="margin-top: 5px" class="product-link-post-icon" data-product-id="{{ $take->id }}">
                <i class="bi {{ $take->isLikedBy(auth()->user()) ? 'bi-heart-fill text-danger' : 'bi-heart' }}"></i>
                <span class="like-count">{{ $take->likes->count() }}</span>
            </a>
            <a href="{{ route('product.detail',$take->slug) }}" class="product-post-icon">
                <i class="bi bi-chat"></i>
                <span>{{ \Modules\Comment\Models\Comments::where('product_id',$take->id)->count() }}</span>
            </a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#repost-{{ $take->id }}" class="product-post-icon">
                <i class="bi bi-arrow-repeat"></i>
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

