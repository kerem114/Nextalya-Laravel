@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post.css') }}">
@endsection
@section('content')
            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
                <div class="product-entry-selection">

                    <div class="product-method-header">
                        <div class="product-method-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h2 class="product-method-title">Bir Ürün Ekleme Yöntemi Seçin</h2>
                        <p class="product-method-description">
                            Hemen başlamak için aşağıdaki seçeneklerden birini seçin.<br>
                            Excel ile ürün ekleyebilir ya da kendi ürününüzü oluşturarak paylaşabilirsiniz.<br>
                            Size en uygun yöntemi seçin ve paylaşmaya başlayın.
                        </p>
                    </div>

                    <div class="product-entry-box">
                        <div class="product-entry-icon"><i class="bi bi-link-45deg"></i></div>
                        <h2 class="product-entry-title">Excel ile Ürün Ekle</h2>
                        <p class="product-entry-desc">
                            Excel ile ürün eklemek isterseniz aşağıdaki butona tıklayınız. Eklediğiniz ürünleri kendiniz
                            düzenleyip paylaşabilirsiniz.
                        </p>
                        <a href="{{ route('link.product.create') }}" class="product-entry-button gold">Excel ile Ekle</a>
                    </div>

                    <div class="product-entry-box">
                        <div class="product-entry-icon"><i class="bi bi-plus-square"></i></div>
                        <h2 class="product-entry-title">Yeni Ürün Ekle</h2>
                        <p class="product-entry-desc">
                            Yeni ürün oluşturmak için aşağıdaki butona tıklayınız. Ürün bilgilerini manuel olarak girip
                            paylaşabilirsiniz.
                        </p>
                        <a href="{{ route('manual.product.create') }}" class="product-entry-button black">Yeni Ürün Ekle</a>
                    </div>

                </div>
            </div>

@endsection
