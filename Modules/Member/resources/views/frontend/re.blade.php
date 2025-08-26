@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')
       <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
                <div class="search-page-container">

                    <!-- Product Posts Section -->
                    <div class="product-posts-container">

                        <!-- Search Result Header -->
                        <div class="search-post-header-container">
                            <i class="bi bi-arrow-left search-post-back-icon" id="go-back-icon"></i>
                            <div class="search-post-header-title">RERERE</div>
                        </div>


                        <!-- Product Post 1 -->
                        <div class="product-post-card">



                            <div class="product-post-title-row">
                                <div class="product-post-title">Ürünü çok beğendim</div>
                            </div>

                            <hr>

                            <div class="product-post-collapsible">
                                <div class="product-post-header">
                                    <a href="#" class="product-post-profile-link">
                                        <img src="img/profil_picture_02.png" alt="Profile" class="product-post-profile">
                                    </a>
                                    <div class="product-post-user">
                                        <a href="#" class="product-post-name">Emma Smith</a>
                                        <a href="#" class="product-post-username">@emmasmith</a>
                                    </div>
                                    <div class="product-post-actions">
                                        <a href="#" class="product-post-follow">Follow</a>
                                        <a href="#" class="product-post-options">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="product-post-title-row">
                                    <div class="product-post-title">Elegant Backpack</div>
                                    <a href="#" target="_blank">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                </div>

                                <div class="product-post-image-wrapper" style="position:relative;">
                                    <img src="{{ asset('frontend/img/product-detail-02.png') }}" class="product-post-image" alt="Product Image">
                                    <button class="see-more-btn" style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);z-index:2;">
                                        Devamını Gör
                                    </button>
                                    <div class="product-post-hidden-content" style="display:none;">
                                        <div class="product-post-meta">
                                            <div class="product-post-price">$35</div>
                                            <div class="product-post-rating" data-rating="4.9">
                                                <i class="bi bi-star-fill" data-value="1"></i>
                                                <i class="bi bi-star-fill" data-value="2"></i>
                                                <i class="bi bi-star-fill" data-value="3"></i>
                                                <i class="bi bi-star-fill" data-value="4"></i>
                                                <i class="bi bi-star-fill" data-value="5"></i>
                                                <span class="product-post-rating-value">5.0</span>
                                            </div>
                                        </div>

                                        <div class="product-post-description">
                                            This backpack combines elegance and practicality, perfect for everyday use or
                                            weekend adventures—durable, stylish, and spacious.
                                        </div>

                                        <div class="product-post-footer">
                                            <div class="product-post-left-icons">
                                                <a href="#" class="product-post-icon">
                                                    <i class="bi bi-heart"></i>
                                                    <span>9</span>
                                                </a>
                                                <a href="#" class="product-post-icon">
                                                    <i class="bi bi-chat"></i>
                                                    <span>4</span>
                                                </a>
                                            </div>
                                            <div class="product-post-right-icons">
                                                <a href="#" class="product-post-icon">
                                                    <i class="bi bi-bookmark"></i>
                                                </a>
                                                <a href="#" class="product-post-icon">
                                                    <i class="bi bi-share"></i>
                                                    <span>4</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Product Post 2 -->
                        <div class="product-post-card">
                            <div class="product-post-header">
                                <a href="#" class="product-post-profile-link">
                                    <img src="img/profil_picture_02.png" alt="Profile" class="product-post-profile">
                                </a>
                                <div class="product-post-user">
                                    <a href="#" class="product-post-name">Emma Smith</a>
                                    <a href="#" class="product-post-username">@emmasmith</a>
                                </div>
                                <div class="product-post-actions">
                                    <a href="#" class="product-post-follow">Follow</a>
                                    <a href="#" class="product-post-options">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="product-post-title-row">
                                <div class="product-post-title">Elegant Backpack</div>
                                <a href="#" target="_blank">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            </div>

                            <img src="img/product-detail-02.png" class="product-post-image" alt="Product Image">

                            <div class="product-post-meta">
                                <div class="product-post-price">$35</div>
                                <div class="product-post-rating" data-rating="4.9">
                                    <i class="bi bi-star-fill" data-value="1"></i>
                                    <i class="bi bi-star-fill" data-value="2"></i>
                                    <i class="bi bi-star-fill" data-value="3"></i>
                                    <i class="bi bi-star-fill" data-value="4"></i>
                                    <i class="bi bi-star-fill" data-value="5"></i>
                                    <span class="product-post-rating-value">5.0</span>
                                </div>
                            </div>

                            <div class="product-post-description">
                                This backpack combines elegance and practicality, perfect for everyday use or
                                weekend adventures—durable, stylish, and spacious.
                            </div>

                            <div class="product-post-footer">
                                <div class="product-post-left-icons">
                                    <a href="#" class="product-post-icon">
                                        <i class="bi bi-heart"></i>
                                        <span>9</span>
                                    </a>
                                    <a href="#" class="product-post-icon">
                                        <i class="bi bi-chat"></i>
                                        <span>4</span>
                                    </a>
                                </div>
                                <div class="product-post-right-icons">
                                    <a href="#" class="product-post-icon">
                                        <i class="bi bi-bookmark"></i>
                                    </a>
                                    <a href="#" class="product-post-icon">
                                        <i class="bi bi-share"></i>
                                        <span>4</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@section('js')
    <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const btn = document.querySelector('.see-more-btn');
                                    const hiddenContent = document.querySelector('.product-post-hidden-content');
                                    btn.addEventListener('click', function() {
                                        hiddenContent.style.display = 'block';
                                        btn.style.display = 'none';
                                    });
                                });
                            </script>
@endsection

@endsection
