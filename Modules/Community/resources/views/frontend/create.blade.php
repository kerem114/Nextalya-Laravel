@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">

@endsection
@section('content')
       <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area-2">
                <div class="settings-container">
                    <div class="settings-header">
                        <span class="settings-back-icon"><i class="bi bi-arrow-left"></i></span>
                        <span class="settings-title">Yeni koleksiyon oluştur</span>
                        <span class="settings-placeholder"></span>
                    </div>

                    <div class="settings-gap"></div>

                    <!-- Tell us about your community -->
                    <div class="community-info">
                        <span class="community-title">Kendiniz için bir koleksiyon oluşturun</span>
                        <p class="community-description">Beğendiğiniz ürünlerden oluşan bir koleksiyon oluşturun ve arkadaşlarınız ile bu koleksiyonu paylaşın</p>
                    </div>
                    <form action="{{ route('community.store') }}" method="POST">
                        @csrf
                    <!-- Community name -->
                    <div class="community-name">
                        <label for="community-name" class="community-name-label">Koleksiyon adı<span
                                class="required">*</span></label>
                        <input type="text" name="name" required id="community-name" class="community-name-input"
                             />
                    </div>

                    <!-- Description -->
                    <div class="community-description">
                        <label for="description" class="community-description-label">
                            Açıklamanız<span class="required">*</span>
                        </label>
                        <textarea id="description" name="description" required class="community-description-input"
                            ></textarea>
                    </div>

                    <!-- Cancel and Warning Buttons -->
                    <div class="button-container">
                        <button type="submit" class="warning-button">Oluştur</button>
                    </div>
                    </form>
                </div>


            </div>
@endsection
