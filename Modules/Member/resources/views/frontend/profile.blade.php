@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')
  <!-- Orta Alan: Profile Tab -->
            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
                <div class="profile-tab-section-saved-posts-wrapper">
                      <div
                        class="profile-tab-section-saved-posts-header d-flex justify-content-between align-items-start">
                        <div class="profile-general d-flex align-items-center">
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile Picture"
                                class="profile-tab-section-saved-posts-image">
                            <div class="ms-3">
                                <h4 class="profile-tab-section-saved-posts-name">{{ Auth::user()->name }}</h4>

                                <div class="d-flex align-items-center mt-1">
                                    <span class="profile-tab-section-saved-posts-rating">{{ '@' . Auth::user()->username }}</span>
                                </div>
                                <div class="profile-tab-section-saved-posts-stats d-flex mt-2">
                                       <a href="{{ route('follower.index') }}" class="profile-tab-section-saved-posts-stat-item me-3">
                                        <span class="profile-tab-section-saved-posts-stat-number">{{ Auth::user()->followersCount() }}</span>
                                        <span class="profile-tab-section-saved-posts-stat-label">Takipçi</span>
                                    </a>
                                    <a href="{{ route('following.index') }}" class="profile-tab-section-saved-posts-stat-item me-3">
                                        <span class="profile-tab-section-saved-posts-stat-number"> {{ Auth::user()->followingsCount() }}</span>
                                        <span class="profile-tab-section-saved-posts-stat-label">Takip edilen</span>
                                    </a>

                                </div>

                            </div>
                        </div>


                    </div>


                    <p class="profile-tab-section-saved-posts-description mt-2">
                        {{ Auth::user()->bio }}
                    </p>


                </div>

                <div class="search-page-container">
                    <div class="profile-tab-section-posts-new-tabs-wrapper">
                        <div class="profile-tab-section-posts-new-tab-buttons">
                            @if(Auth::user()->role == 'business')
                            <button class="profile-tab-section-posts-new-tab-button @if(Auth::user()->role == 'business') active @endif" data-tab="products">
                                <i class="bi bi-box-seam"></i> Ürünler
                            </button>
                            @endif
                            <button class="profile-tab-section-posts-new-tab-button @if(Auth::user()->role == 'user') active @endif" data-tab="repost">
                                <i class="bi bi-repeat"></i> Repost
                            </button>
                            <button class="profile-tab-section-posts-new-tab-button" data-tab="posts">
                                <i class="bi bi-pencil-square"></i> Gönderiler
                            </button>
                        </div>

                        <div class="profile-tab-section-posts-new-tab-content  @if(Auth::user()->role == 'business') active @endif "
                            id="profile-tab-section-posts-new-tab-products">
                            <div class="row product-posts-container gx-4 gy-4">
                                <div class="profile-tab-section-posts-new-grid-wrapper">

                                  <livewire:member::profile-product :userId="Auth::user()->id"/>


                                </div>
                            </div>
                        </div>

                        <div class="profile-tab-section-posts-new-tab-content @if(Auth::user()->role == 'user') active @endif" id="profile-tab-section-posts-new-tab-repost">
                            <div class="row product-posts-container gx-4 gy-4">
                                <div class="profile-tab-section-posts-new-grid-wrapper">
                                <div class="col-lg-12 col-md-12">
                                    <!-- Product Posts Section -->
                                    <div class="row product-posts-container">

                                        <livewire:member::repost :userId="Auth::user()->id" />

                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>

                        <div class="profile-tab-section-posts-new-tab-content"
                            id="profile-tab-section-posts-new-tab-posts">
                             <div class="row product-posts-container gx-4 gy-4">
                                <div class="profile-tab-section-posts-new-grid-wrapper">
                                    <livewire:member::accountpost :userId="Auth::user()->id" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buttons = document.querySelectorAll(".profile-tab-section-posts-new-tab-button");
            const contents = document.querySelectorAll(".profile-tab-section-posts-new-tab-content");

            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    const tab = button.getAttribute("data-tab");

                    buttons.forEach(btn => btn.classList.remove("active"));
                    button.classList.add("active");

                    contents.forEach(content => content.classList.remove("active"));

                    document.getElementById("profile-tab-section-posts-new-tab-" + tab).classList.add("active");
                });
            });
        });
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
