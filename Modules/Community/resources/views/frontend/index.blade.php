@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')
                  <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
                <div class="search-page-container">



                    <!-- Explore Gropus Section -->
                    <div class="meet-posts-container">

                        <div class="meet-post-header-container">
                            <div class="meet-post-header-title">Tüm koleksiyonlar</div>
                            <a href="{{ route('community.create') }}"><i class="bi bi-plus-circle meet-post-add-icon" id="add-icon"></i></a>

                        </div>

                        <!-- Start Discovering -->
                        <livewire:community::index />
                    </div>
                </div>
            </div>
@endsection
