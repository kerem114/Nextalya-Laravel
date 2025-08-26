@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">

@endsection
@section('content')
       <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area-2">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                    @if(Auth::user()->role == 'business')
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if(Auth::user()->role == 'business') active @endif" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Benim ürünlerim</button>
                    </li>
                    @endif
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if(Auth::user()->role == 'user') active @endif" id="pills-profile-tab " data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Kaydedilen ürünlerim</button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade @if(Auth::user()->role == 'business') show active @endif" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="search-page-container">
                        <livewire:community::my :communityId="$data->id" />
                    </div>
                    </div>
                    <div class="tab-pane fade @if(Auth::user()->role == 'user') show active @endif" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <div class="search-page-container">
                        <livewire:community::create :communityId="$data->id" />
                    </div>
                    </div>
                </div>

            </div>
@endsection
