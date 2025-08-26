@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')

            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">

<div class="search-page-container">
@if(!$hasFollowing)
    <div class="text-center my-5 p-4 border rounded bg-light">
        <h4>Hoşgeldiniz; {{ $user->username }} 🎉</h4>
        <p>Henüz kimseyi takip etmiyorsun. Takip edeceğin kişiler bul ve içerikleri keşfet!</p>
        <div class="mt-3">
            <h5>Takip edebileceğin kişiler</h5>
            <livewire:home-suggest />
        </div>
    </div>

    <div class="mt-5">
        <h5>Takip edebileceğin kişiler</h5>
        <livewire:home-suggest />
    </div>
@else
      <div class="search-product-cards">
    <livewire:dashboard::dashboard-feed />
    </div>
@endif




@endsection
