<div class="modern-product-card card-enhanced hover-lift-enhanced mb-4 animate-fade-in">
    <div class="modern-product-header d-flex align-items-center justify-content-between p-3">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('user.account',$take->user->username) }}" class="text-decoration-none">
                <img src="{{ asset('storage/'.$take->user->avatar) }}" alt="Profile"
                    class="rounded-circle" style="width: 48px; height: 48px; object-fit: cover;" />
            </a>
            <div>
                <a href="{{ route('user.account',$take->user->username) }}" class="fw-semibold text-decoration-none d-block">{{ $take->user->name }}</a>
                <a href="{{ route('user.account',$take->user->username) }}" class="text-muted small text-decoration-none">{{ '@' . $take->user->username }}</a>
            </div>
        </div>
        <div class="modern-dropdown">
            <button class="modern-action-btn" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu modern-dropdown-menu">
                <li><a class="modern-dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#collection-{{ $take->id }}">
                    <i class="bi bi-collection"></i>
                    <span>Koleksiyona kaydet</span>
                </a></li>
            </ul>
        </div>
    </div>
    
    <div class="px-3 pb-2">
        <div class="d-flex justify-content-between align-items-start mb-2">
            <h6 class="modern-product-title mb-0 flex-grow-1">{{ $take->title }}</h6>
            @if($take->url)
            <a href="{{ $take->url }}" target="_blank" class="modern-action-btn modern-tooltip" data-tooltip="Ürünü görüntüle">
                <i class="bi bi-box-arrow-up-right"></i>
            </a>
            @endif
        </div>
    </div>
    
    <div class="position-relative overflow-hidden">
        @if(Str::startsWith($take->image, 'http'))
            <img class="modern-product-image w-100" src="{{ $take->image }}" alt="{{ $take->title }} ürün kartı, fiyatı {{ $take->price }} Türk Lirası" loading="lazy" />
        @else
            <img class="modern-product-image w-100" src="{{ asset('storage/product/' . $take->image) }}" alt="{{ $take->title }} ürün kartı, fiyatı {{ $take->price }} Türk Lirası" loading="lazy" />
        @endif
        <div class="position-absolute top-0 end-0 m-3">
            <span class="modern-badge modern-badge-primary">{{ $take->price }} ₺</span>
        </div>
    </div>

    <div class="modern-product-content">
        <p class="modern-product-description">{{ $take->description }}</p>
        
        <div class="modern-product-actions">
            <div class="d-flex gap-2">
                <button class="modern-action-btn {{ $take->isLikedBy(auth()->user()) ? 'liked' : '' }}" data-product-id="{{ $take->id }}">
                    <i class="bi {{ $take->isLikedBy(auth()->user()) ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                    <span class="like-count">{{ $take->likes->count() }}</span>
                </button>
                <a href="{{ route('product.detail',$take->slug) }}" class="modern-action-btn">
                    <i class="bi bi-chat"></i>
                    <span>{{ \Modules\Comment\Models\Comments::where('product_id',$take->id)->count() }}</span>
                </a>
                <button class="modern-action-btn" data-bs-toggle="modal" data-bs-target="#repost-{{ $take->id }}">
                    <i class="bi bi-arrow-repeat"></i>
                </button>
            </div>
            <div class="d-flex gap-2">
                @if(\Modules\Save\Models\Favories::isSave($take->id))
                    <a wire:navigate href="{{ route('product.favories', $take->id) }}" class="modern-action-btn text-warning">
                        <i class="bi bi-bookmark-fill"></i>
                    </a>
                @else
                    <a wire:navigate href="{{ route('product.favories', $take->id) }}" class="modern-action-btn">
                        <i class="bi bi-bookmark"></i>
                    </a>
                @endif
                <button class="modern-action-btn" data-bs-toggle="modal" data-bs-target="#shareModal{{ $take->id }}">
                    <i class="bi bi-share"></i>
                </button>
            </div>
        </div>
    </div>
</div>

@include('component.collection')
@include('component.repost')

<!-- Enhanced Share Modal -->
<div class="modal fade" id="shareModal{{ $take->id }}" tabindex="-1" aria-labelledby="shareModalLabel{{ $take->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modern-modal-content">
            <div class="modern-modal-header">
                <h5 class="modern-modal-title" id="shareModalLabel{{ $take->id }}">
                    <i class="bi bi-share me-2"></i>Paylaş
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modern-modal-body text-center">
                <div class="grid-enhanced grid-cols-5 mb-4">
                    <a href="mailto:?body={{ urlencode(route('product.detail',$take->slug)) }}" class="btn-secondary-enhanced btn-enhanced modern-tooltip" data-tooltip="E-posta">
                        <i class="bi bi-envelope"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode(route('product.detail',$take->slug)) }}" target="_blank" class="btn-secondary-enhanced btn-enhanced modern-tooltip" data-tooltip="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('product.detail',$take->slug)) }}" target="_blank" class="btn-secondary-enhanced btn-enhanced modern-tooltip" data-tooltip="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('product.detail',$take->slug)) }}" target="_blank" class="btn-secondary-enhanced btn-enhanced modern-tooltip" data-tooltip="Twitter">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('product.detail',$take->slug)) }}" target="_blank" class="btn-secondary-enhanced btn-enhanced modern-tooltip" data-tooltip="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>
                <div class="form-group-enhanced">
                    <label class="form-label-enhanced">Link</label>
                    <div class="input-group">
                        <input type="text" id="shareLink{{ $take->id }}" class="form-input-enhanced" value="{{ route('product.detail',$take->slug) }}" readonly>
                        <button class="btn-primary-enhanced btn-enhanced" onclick="copyLink{{ $take->id }}()">
                            <i class="bi bi-clipboard"></i>
                            Kopyala
                        </button>
                    </div>
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
    
    // Enhanced feedback
    const button = event.target.closest('button');
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="bi bi-check"></i> Kopyalandı!';
    button.classList.add('btn-success');
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.classList.remove('btn-success');
    }, 2000);
}
</script>

<!-- Enhanced Like Functionality -->
<script>
    document.querySelectorAll('.modern-action-btn[data-product-id]').forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.preventDefault();

            const productId = this.getAttribute('data-product-id');
            const heartIcon = this.querySelector('i');
            const likeCountSpan = this.querySelector('.like-count');
            let currentCount = parseInt(likeCountSpan.textContent);
            
            // Add loading state
            this.style.pointerEvents = 'none';
            this.style.opacity = '0.7';

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
                    this.classList.add('liked');
                    heartIcon.classList.remove('bi-heart');
                    heartIcon.classList.add('bi-heart-fill');
                    currentCount += 1;
                    
                    // Add heart animation
                    heartIcon.style.animation = 'heartBeat 0.6s ease';
                } else {
                    this.classList.remove('liked');
                    heartIcon.classList.remove('bi-heart-fill');
                    heartIcon.classList.add('bi-heart');
                    currentCount = Math.max(currentCount - 1, 0);
                }
                likeCountSpan.textContent = currentCount;
                
                // Remove loading state
                this.style.pointerEvents = 'auto';
                this.style.opacity = '1';
                
                setTimeout(() => {
                    heartIcon.style.animation = '';
                }, 600);
            })
            .catch(err => console.error(err));
        });
    });
    
    // Add heart animation keyframes
    const style = document.createElement('style');
    style.textContent = `
        @keyframes heartBeat {
            0% { transform: scale(1); }
            25% { transform: scale(1.2); }
            50% { transform: scale(1); }
            75% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    `;
    document.head.appendChild(style);

</script>