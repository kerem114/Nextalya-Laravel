<div class="product-card hover-lift">
    <div class="post-header">
        <img src="{{ asset('storage/' . $product->user->avatar) }}" alt="Profile" class="post-avatar">
        <div class="post-user-info flex-grow-1">
            <h6>{{ $product->user->name }}</h6>
            <small class="text-muted">{{ '@' . $product->user->username }}</small>
        </div>
        <div class="dropdown">
            <button class="btn btn-link text-muted" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#saveModal{{ $product->id }}">
                    <i class="bi bi-bookmark me-2"></i>Kaydet
                </a></li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#shareModal{{ $product->id }}">
                    <i class="bi bi-share me-2"></i>Paylaş
                </a></li>
            </ul>
        </div>
    </div>

    <div class="post-content">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <h5 class="product-title mb-0">{{ $product->title }}</h5>
            @if($product->url)
            <a href="{{ $product->url }}" target="_blank" class="btn btn-link text-primary">
                <i class="bi bi-box-arrow-up-right"></i>
            </a>
            @endif
        </div>

        @if($product->image)
        <div class="product-image-container mb-3">
            @if(Str::startsWith($product->image, 'http'))
                <img src="{{ $product->image }}" alt="{{ $product->title }}" class="product-image">
            @else
                <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->title }}" class="product-image">
            @endif
            <div class="product-price-overlay">
                <span class="badge bg-warning text-dark fw-bold fs-6">{{ $product->price }} ₺</span>
            </div>
        </div>
        @endif

        <p class="product-description">{{ $product->description }}</p>

        @if($product->features && $product->features->count() > 0)
        <div class="product-features mb-3">
            <h6 class="fw-semibold mb-2">Özellikler:</h6>
            <div class="d-flex flex-wrap gap-2">
                @foreach($product->features as $feature)
                <span class="badge badge-primary">{{ $feature->feature_name }}</span>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <div class="product-actions">
        <div class="d-flex gap-3">
            <button class="action-btn like-btn {{ $product->isLikedBy(auth()->user()) ? 'liked' : '' }}" 
                    data-product-id="{{ $product->id }}">
                <i class="bi {{ $product->isLikedBy(auth()->user()) ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                <span class="like-count">{{ $product->likes->count() }}</span>
            </button>
            
            <a href="{{ route('products.show', $product->slug) }}" class="action-btn">
                <i class="bi bi-chat"></i>
                <span>{{ $product->comments->count() ?? 0 }}</span>
            </a>
            
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#repostModal{{ $product->id }}">
                <i class="bi bi-arrow-repeat"></i>
            </button>
        </div>
        
        <div class="d-flex gap-2">
            <button class="action-btn save-btn {{ $product->isSavedBy(auth()->user()) ? 'saved' : '' }}" 
                    data-product-id="{{ $product->id }}">
                <i class="bi {{ $product->isSavedBy(auth()->user()) ? 'bi-bookmark-fill' : 'bi-bookmark' }}"></i>
            </button>
            
            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#shareModal{{ $product->id }}">
                <i class="bi bi-share"></i>
            </button>
        </div>
    </div>
</div>

<!-- Save Modal -->
<div class="modal fade" id="saveModal{{ $product->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Koleksiyona Kaydet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('collections.save', $product->id) }}" method="POST">
                    @csrf
                    <div class="collections-list">
                        @foreach(Auth::user()->collections as $collection)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="collections[]" 
                                   value="{{ $collection->id }}" id="collection{{ $collection->id }}">
                            <label class="form-check-label" for="collection{{ $collection->id }}">
                                {{ $collection->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Share Modal -->
<div class="modal fade" id="shareModal{{ $product->id }}" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Paylaş</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div class="d-flex justify-content-center gap-3 mb-3">
                    <a href="https://wa.me/?text={{ urlencode(route('products.show', $product->slug)) }}" 
                       target="_blank" class="btn btn-success">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('products.show', $product->slug)) }}" 
                       target="_blank" class="btn btn-info">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('products.show', $product->slug)) }}" 
                       target="_blank" class="btn btn-primary">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ route('products.show', $product->slug) }}" 
                           id="shareLink{{ $product->id }}" readonly>
                    <button class="btn btn-outline-secondary" onclick="copyLink({{ $product->id }})">
                        <i class="bi bi-clipboard"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.product-image-container {
    position: relative;
    overflow: hidden;
    border-radius: var(--radius-lg);
}

.product-price-overlay {
    position: absolute;
    top: 1rem;
    right: 1rem;
}

.stories-section {
    margin-bottom: var(--space-6);
}

.story-item {
    flex-shrink: 0;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.story-item:hover {
    transform: scale(1.05);
}

.story-avatar {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--primary-color);
}

.story-avatar-container {
    position: relative;
}

.add-story-btn {
    position: absolute;
    bottom: 0;
    right: 0;
    background: var(--primary-color);
    color: white;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    border: 2px solid white;
}

.create-option {
    color: var(--gray-600);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    padding: var(--space-2) var(--space-3);
    border-radius: var(--radius-md);
    flex: 1;
    text-align: center;
}

.create-option:hover {
    background: var(--gray-100);
    color: var(--gray-800);
}
</style>

<script>
function copyLink(productId) {
    const input = document.getElementById('shareLink' + productId);
    input.select();
    document.execCommand('copy');
    
    // Show success feedback
    const button = event.target.closest('button');
    const originalHTML = button.innerHTML;
    button.innerHTML = '<i class="bi bi-check"></i>';
    button.classList.remove('btn-outline-secondary');
    button.classList.add('btn-success');
    
    setTimeout(() => {
        button.innerHTML = originalHTML;
        button.classList.remove('btn-success');
        button.classList.add('btn-outline-secondary');
    }, 2000);
}

// Like functionality
document.querySelectorAll('.like-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const productId = this.dataset.productId;
        const icon = this.querySelector('i');
        const count = this.querySelector('.like-count');
        
        fetch(`/products/${productId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.liked) {
                icon.classList.remove('bi-heart');
                icon.classList.add('bi-heart-fill');
                this.classList.add('liked');
            } else {
                icon.classList.remove('bi-heart-fill');
                icon.classList.add('bi-heart');
                this.classList.remove('liked');
            }
            count.textContent = data.count;
        });
    });
});
</script>
@endsection