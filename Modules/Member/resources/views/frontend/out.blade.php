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
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Profile Picture"
                                class="profile-tab-section-saved-posts-image">
                            <div class="ms-3">
                                <h4 class="profile-tab-section-saved-posts-name">{{ $user->name }}</h4>

                                <div class="d-flex align-items-center mt-1">
                                    <span class="profile-tab-section-saved-posts-rating">{{ '@' . $user->username }}</span>
                                </div>
                                <div class="profile-tab-section-saved-posts-stats d-flex mt-2">
                                    <a href="#" class="profile-tab-section-saved-posts-stat-item me-3">
                                        <span class="profile-tab-section-saved-posts-stat-number">{{ $user->followersCount() }}</span>
                                        <span class="profile-tab-section-saved-posts-stat-label">Takipçi</span>
                                    </a>
                                    <a href="#" class="profile-tab-section-saved-posts-stat-item me-3">
                                        <span class="profile-tab-section-saved-posts-stat-number"> {{ $user->followingsCount() }}</span>
                                        <span class="profile-tab-section-saved-posts-stat-label">Takip edilen</span>
                                    </a>

                                </div>

                            </div>
                        </div>

                        <div class="profile-tab-section-saved-posts-follow-wrapper">

                            @if(auth()->user()->followings->contains($user->id))
                                <form action="{{ route('unfollow', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="profile-tab-section-saved-posts-follow-btn">Takibi Bırak</button>
                                </form>
                            @else
                                <form action="{{ route('follow', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="profile-tab-section-saved-posts-follow-btn">Takip Et</button>
                                </form>
                            @endif

                        </div>
                    </div>


                    <p class="profile-tab-section-saved-posts-description mt-2">
                        {{ $user->bio }}
                    </p>


                </div>

                <div class="search-page-container">
                    <div class="profile-tab-section-posts-new-tabs-wrapper">
                        <div class="profile-tab-section-posts-new-tab-buttons">
                            @if($user->role == 'business')
                            <button class="profile-tab-section-posts-new-tab-button @if($user->role == 'business') active @endif" data-tab="products">
                                <i class="bi bi-box-seam"></i> Ürünler
                            </button>
                            @endif
                            <button class="profile-tab-section-posts-new-tab-button @if($user->role == 'user') active @endif" data-tab="repost">
                                <i class="bi bi-repeat"></i> Repost
                            </button>
                            <button class="profile-tab-section-posts-new-tab-button" data-tab="posts">
                                <i class="bi bi-pencil-square"></i> Gönderiler
                            </button>
                        </div>

                        <div class="profile-tab-section-posts-new-tab-content  @if($user->role == 'business') active @endif "
                            id="profile-tab-section-posts-new-tab-products">
                            <div class="row product-posts-container gx-4 gy-4">
                                <div class="profile-tab-section-posts-new-grid-wrapper">

                                  <livewire:member::account :userId="$user->id" />


                                </div>
                            </div>
                        </div>

                        <div class="profile-tab-section-posts-new-tab-content @if($user->role == 'user') active @endif" id="profile-tab-section-posts-new-tab-repost">
                            <div class="row product-posts-container gx-4 gy-4">
                                <div class="profile-tab-section-posts-new-grid-wrapper">
                                    <livewire:member::repost :userId="$user->id" />
                                </div>
                            </div>
                        </div>

                        <div class="profile-tab-section-posts-new-tab-content"
                            id="profile-tab-section-posts-new-tab-posts">
                            <div class="row product-posts-container gx-4 gy-4">
                                <div class="profile-tab-section-posts-new-grid-wrapper">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="btn btn-primary active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Gönderiler</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="btn btn-primary" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Tartışmalar</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="btn btn-primary" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Anketler</button>
                                        </li>

                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                            <livewire:member::out.post :userId="$user->id"/>

                                        </div>

                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

                                            <livewire:member::out.discussion :userId="$user->id"/>
                                        </div>

                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">

                                            <livewire:member::out.poll :userId="$user->id"/>
                                        </div>

                                        </div>
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
