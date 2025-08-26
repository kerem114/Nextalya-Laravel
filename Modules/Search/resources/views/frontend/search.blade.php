@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')
            <div class="search-page-new-post-tabs-wrapper">

                <div class="search-page-new-post-tab-buttons">
                    <button class="search-page-new-post-tab-button active" data-tab="user">Kullanıcı</button>
                    <button class="search-page-new-post-tab-button" data-tab="product">Ürün</button>
                    <button class="search-page-new-post-tab-button" data-tab="post">Gönderi</button>
                    <button class="search-page-new-post-tab-button" data-tab="community">Koleksiyon</button>
                </div>

                <!-- Tab Contents -->
                <div class="search-page-new-post-tab-content" id="tab-user">
                    <!-- Orta Alan: Add Post -->
                    <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">

                    <div class="meet-posts-container">

                        <!-- Start Discovering -->
                        <div class="row meet-user-card-grid">
                            @forelse($users as $user)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="meet-user-card">
                                    <div class="meet-user-content">
                                        <img src="{{ asset('storage/'. $user->avatar) }}" class="meet-user-image"
                                            alt="" />
                                        <div class="meet-user-info">
                                            <div class="meet-user-name">{{ $user->name }}</div>
                                            <div class="meet-user-followers">{{ $user->followersCount() }} takipçi</div>
                                        </div>
                                        <a href="{{ route('user.account',$user->username) }}" class="meet-follow-button">Profil</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center">
                               <svg id="&#x421;&#x43B;&#x43E;&#x439;_1" height="64" viewBox="0 0 128 128" width="64" xmlns="http://www.w3.org/2000/svg"><circle cx="114" cy="12" r="2"/><circle cx="106" cy="12" r="2"/><circle cx="98" cy="12" r="2"/><path d="m121 0h-114a7 7 0 0 0 -7 7v114a7 7 0 0 0 7 7h114a7 7 0 0 0 7-7v-114a7 7 0 0 0 -7-7zm-114 4h114a3 3 0 0 1 3 3v13h-120v-13a3 3 0 0 1 3-3zm114 120h-114a3 3 0 0 1 -3-3v-97h120v97a3 3 0 0 1 -3 3z"/><path d="m64.1 84.3c-7.82 0-14.92 3.4-18.1 8.7a2 2 0 1 0 3.43 2c2.47-4.09 8.23-6.73 14.67-6.73 6.07 0 11.69 2.44 14.32 6.21a2 2 0 1 0 3.28-2.28c-3.4-4.86-10.15-7.9-17.6-7.9z"/><path d="m48.59 71.41a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 -2.82-2.82l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58z"/><path d="m95.41 52.59a2 2 0 0 0 -2.82 0l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58 6.59 6.58a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 0-2.82z"/></svg>
                                <p class="mt-2">Üzgünüm herhangi bir sonuç bulunamadı :(</p>
                                <p style="margin-top: -15px">Lütfen bekleyin veya sayfayı yenileyin</p>
                                <a href="javascript:void(0);" onclick="location.reload();" class="btn btn-outline-primary">Sayfayı Yenile</a>
                            </div>
                            @endforelse

                        </div>

                    </div>
                    </div>
                </div>

                <div class="search-page-new-post-tab-content" id="tab-product" style="display: none;">
                    <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
                        <div class="search-page-container">



                            <div class="col-md-12 search-product-grid">
                                @forelse($realProducts as $take)
                                       @include('component.product')
                                @empty
                            <div class="text-center">
                               <svg id="&#x421;&#x43B;&#x43E;&#x439;_1" height="64" viewBox="0 0 128 128" width="64" xmlns="http://www.w3.org/2000/svg"><circle cx="114" cy="12" r="2"/><circle cx="106" cy="12" r="2"/><circle cx="98" cy="12" r="2"/><path d="m121 0h-114a7 7 0 0 0 -7 7v114a7 7 0 0 0 7 7h114a7 7 0 0 0 7-7v-114a7 7 0 0 0 -7-7zm-114 4h114a3 3 0 0 1 3 3v13h-120v-13a3 3 0 0 1 3-3zm114 120h-114a3 3 0 0 1 -3-3v-97h120v97a3 3 0 0 1 -3 3z"/><path d="m64.1 84.3c-7.82 0-14.92 3.4-18.1 8.7a2 2 0 1 0 3.43 2c2.47-4.09 8.23-6.73 14.67-6.73 6.07 0 11.69 2.44 14.32 6.21a2 2 0 1 0 3.28-2.28c-3.4-4.86-10.15-7.9-17.6-7.9z"/><path d="m48.59 71.41a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 -2.82-2.82l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58z"/><path d="m95.41 52.59a2 2 0 0 0 -2.82 0l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58 6.59 6.58a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 0-2.82z"/></svg>
                                <p class="mt-2">Üzgünüm herhangi bir sonuç bulunamadı :(</p>
                                <p style="margin-top: -15px">Lütfen bekleyin veya sayfayı yenileyin</p>
                                <a href="javascript:void(0);" onclick="location.reload();" class="btn btn-outline-primary">Sayfayı Yenile</a>
                            </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="search-page-new-post-tab-content" id="tab-post" style="display: none;">
                    <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">



                            <div class="col-md-12 search-product-grid">
                                @forelse($posts as $take)
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

                                    </div>

                                    <img class="product-post-image" src="{{ asset('storage/post/' . $take->image) }}" alt="" class="search-product-image" />


                                    <div class="product-post-description">
                                        {{ $take->content }}
                                    </div>
                                    <div class="product-post-footer">
                                        <div class="product-post-left-icons">

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
                            @empty
                           <div class="text-center">
                               <svg id="&#x421;&#x43B;&#x43E;&#x439;_1" height="64" viewBox="0 0 128 128" width="64" xmlns="http://www.w3.org/2000/svg"><circle cx="114" cy="12" r="2"/><circle cx="106" cy="12" r="2"/><circle cx="98" cy="12" r="2"/><path d="m121 0h-114a7 7 0 0 0 -7 7v114a7 7 0 0 0 7 7h114a7 7 0 0 0 7-7v-114a7 7 0 0 0 -7-7zm-114 4h114a3 3 0 0 1 3 3v13h-120v-13a3 3 0 0 1 3-3zm114 120h-114a3 3 0 0 1 -3-3v-97h120v97a3 3 0 0 1 -3 3z"/><path d="m64.1 84.3c-7.82 0-14.92 3.4-18.1 8.7a2 2 0 1 0 3.43 2c2.47-4.09 8.23-6.73 14.67-6.73 6.07 0 11.69 2.44 14.32 6.21a2 2 0 1 0 3.28-2.28c-3.4-4.86-10.15-7.9-17.6-7.9z"/><path d="m48.59 71.41a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 -2.82-2.82l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58z"/><path d="m95.41 52.59a2 2 0 0 0 -2.82 0l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58 6.59 6.58a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 0-2.82z"/></svg>
                                <p class="mt-2">Üzgünüm herhangi bir sonuç bulunamadı :(</p>
                                <p style="margin-top: -15px">Lütfen bekleyin veya sayfayı yenileyin</p>
                                <a href="javascript:void(0);" onclick="location.reload();" class="btn btn-outline-primary">Sayfayı Yenile</a>
                            </div>
                            @endforelse
                    </div>
                    </div>
                </div>

                <div class="search-page-new-post-tab-content" id="tab-community" style="display: none;">
                    <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">

                    <div class="meet-posts-container">

                        <!-- Start Discovering -->
                        <div class="row meet-user-card-grid">

                            @forelse($communities as $take)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                                <div class="community-collections-box p-3" style="background: #fff;border-radius:20px;box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h5 class="community-collections-title">{{ $take->name }}</h5>
                                            <div class="community-collections-box-actions d-flex gap-2">
                                               <a href="#" data-bs-toggle="modal" data-bs-target="#shareModal{{ $take->id }}">
                                                    <i class="bi bi-share-fill"></i>
                                                </a>
                                                <a href="{{ route('community.detail',$take->community_token) }}"><i class="bi bi-three-dots-vertical"></i></a>
                                            </div>
                                        </div>
                                        <div class="community-collections-items d-flex gap-2 mb-2">
                                            @foreach (\Modules\Community\Models\Communityproducts::where('community_id',$take->id)->limit(3)->get() as $takeProduct)

                                              @if(Str::startsWith($takeProduct->product->image, 'http'))

                                                 <img src="{{ $takeProduct->product->image }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ $takeProduct->product->title }}" class="img-thumbnail" alt="">

                                                @else
                                                 <img src="{{ asset('storage/product/'.$takeProduct->product->image) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ $takeProduct->product->title }}" class="img-thumbnail" alt="">
                                                  @endif
                                            @endforeach

                                        </div>

                                        <div class="community-collections-info d-flex align-items-center gap-3">
                                            <small><i class="bi bi-box2-heart"></i> {{ \Modules\Community\Models\Communityproducts::where('community_id',$take->id)->count() }} Ürün</small>
                                            <small><i class="bi bi-eye"></i> 5</small>
                                        </div>
                                </div>
                            </div>

                            @empty
                            <div class="text-center">
                               <svg id="&#x421;&#x43B;&#x43E;&#x439;_1" height="64" viewBox="0 0 128 128" width="64" xmlns="http://www.w3.org/2000/svg"><circle cx="114" cy="12" r="2"/><circle cx="106" cy="12" r="2"/><circle cx="98" cy="12" r="2"/><path d="m121 0h-114a7 7 0 0 0 -7 7v114a7 7 0 0 0 7 7h114a7 7 0 0 0 7-7v-114a7 7 0 0 0 -7-7zm-114 4h114a3 3 0 0 1 3 3v13h-120v-13a3 3 0 0 1 3-3zm114 120h-114a3 3 0 0 1 -3-3v-97h120v97a3 3 0 0 1 -3 3z"/><path d="m64.1 84.3c-7.82 0-14.92 3.4-18.1 8.7a2 2 0 1 0 3.43 2c2.47-4.09 8.23-6.73 14.67-6.73 6.07 0 11.69 2.44 14.32 6.21a2 2 0 1 0 3.28-2.28c-3.4-4.86-10.15-7.9-17.6-7.9z"/><path d="m48.59 71.41a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 -2.82-2.82l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58z"/><path d="m95.41 52.59a2 2 0 0 0 -2.82 0l-6.59 6.58-6.59-6.58a2 2 0 0 0 -2.82 2.82l6.58 6.59-6.58 6.59a2 2 0 1 0 2.82 2.82l6.59-6.58 6.59 6.58a2 2 0 0 0 2.82-2.82l-6.58-6.59 6.58-6.59a2 2 0 0 0 0-2.82z"/></svg>
                                <p class="mt-2">Üzgünüm herhangi bir sonuç bulunamadı :(</p>
                                <p style="margin-top: -15px">Lütfen bekleyin veya sayfayı yenileyin</p>
                                <a href="javascript:void(0);" onclick="location.reload();" class="btn btn-outline-primary">Sayfayı Yenile</a>
                            </div>
                            @endforelse


                        </div>

                    </div>
                    </div>
                </div>
            </div>
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabButtons = document.querySelectorAll(".search-page-new-post-tab-button");
            const tabContents = document.querySelectorAll(".search-page-new-post-tab-content");

            tabButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const tab = this.getAttribute("data-tab");

                    tabButtons.forEach(btn => btn.classList.remove("active"));
                    this.classList.add("active");

                    tabContents.forEach(content => {
                        content.style.display = "none";
                    });

                    document.getElementById("tab-" + tab).style.display = "block";
                });
            });
        });
    </script>

@endsection
@endsection
