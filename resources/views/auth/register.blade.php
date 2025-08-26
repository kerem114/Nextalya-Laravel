@extends('auth.layout.app')
@section('title') Kayıt ol @endsection
@section('content')
    <div class="form-container">
        <h2  style="margin-bottom: 2px" class="text-center">Yeni hesap oluştur</h2>
        <small >Bilgileri doldurarak hesabınızı oluşturun</small>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Ad</label>
                <input type="text" id="name" name="name" class="input-field" placeholder="Adınız" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="input-field" placeholder="Email adresiniz" required>
            </div>
            <div class="form-group">
                <label for="username">Kullanıcı adı</label>
                <input type="text" id="username" name="username" class="input-field" placeholder="Kullanıcı adı"
                    required>
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" class="input-field" placeholder="Şifre" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Şifreyi onaylayın</label>
                <input type="password" id="password-confirm" name="password_confirmation" class="input-field"
                    placeholder="Şifreyi onayla" required>
            </div>
            <small>İlk kullanıcılarımıza özel sürpriz avantajlar 🎁</small>
            <button type="submit" class="submit-btn mt-2">Kayıt Ol</button>
        </form>
        <p class="switch-page mt-1">Hesabınız var mı? <a href="{{ route('login') }}">Giriş Yap</a></p>
    </div>

@endsection
