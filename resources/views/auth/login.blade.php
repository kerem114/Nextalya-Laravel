@extends('auth.layout.app')
@section('title') Giriş @endsection
@section('content')
    <div class="form-container">
        <h2 class="text-center">Hoşgeldiniz</h2>
        <form action="{{ route('signin') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Kullanıcı Adı</label>
                <input type="text" id="username" name="login" class="input-field" value="{{ old('login') }}" placeholder="Kullanıcı adı veya email adresiniz"
                    required>
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" class="input-field" placeholder="Şifre" required>
            </div>
            <div class="form-group">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    Beni hatırla
                </label>
                 @if (Route::has('password.request'))
                    <a style="font-size: 12px" class="text-dark float-end" href="{{ route('password.request') }}">
                        Şifremi unuttum
                    </a>
                @endif
            </div>


            <button type="submit" class="submit-btn">Giriş Yap</button>
        </form>
        <p class="switch-page mt-1">Hesabınız yok mu? <a href="{{ route('register') }}">Kayıt Ol</a></p>
    </div>

@endsection
