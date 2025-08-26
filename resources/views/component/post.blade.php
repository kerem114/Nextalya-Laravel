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

    </div>

    <img class="product-post-image" src="{{ asset('storage/post/' . $take->image) }}" alt="" class="search-product-image" />


    <div class="product-post-description">
        {{ $take->content }}
    </div>
    <div class="product-post-footer">
        <div class="product-post-left-icons">
            <a href="#" style="margin-top: 5px" class="product-link-post-icon">
                <i class="bi bi-heart-fill"></i>
                <span class="like-count">0</span>
            </a>
            <a href="#" class="product-post-icon">
                <i class="bi bi-chat"></i>
                <span>4</span>
            </a>
        </div>
        <div class="product-post-right-icons">

            <a href="#" data-bs-toggle="modal" data-bs-target="#shareModal{{ $take->id }}" class="product-post-icon">
                <i class="bi bi-share"></i>
            </a>
        </div>
    </div>
</div>

<div class="modal fade" id="shareModal{{ $take->id }}" tabindex="-1" aria-labelledby="shareModalLabel{{ $take->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel{{ $take->id }}">Paylaş</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div class="d-flex justify-content-center gap-3 mb-3">
                    <a href="mailto:?body={{ urlencode(route('post.detail',$take->post_token)) }}" class="btn btn-outline-secondary"><i class="bi bi-envelope"></i></a>
                    <a href="https://wa.me/?text={{ urlencode(route('post.detail',$take->post_token)) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('post.detail',$take->post_token)) }}" target="_blank" class="btn btn-outline-primary"><i class="bi bi-linkedin"></i></a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('post.detail',$take->post_token)) }}" target="_blank" class="btn btn-outline-dark"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('post.detail',$take->post_token)) }}" target="_blank" class="btn btn-outline-primary"><i class="bi bi-facebook"></i></a>
                </div>
                <div class="input-group">
                    <input type="text" id="shareLink{{ $take->id }}" class="form-control" value="{{ route('post.detail',$take->post_token) }}" readonly>
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

@endsection
