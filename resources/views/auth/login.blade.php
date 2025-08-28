@extends('layouts.auth')

@section('title', 'Giriş Yap - Nextalya')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header text-center mb-4">
            <h2 class="auth-logo">
                <span class="text-dark">Next</span><span class="text-primary">alya</span>
            </h2>
            <p class="text-muted">Hesabınıza giriş yapın</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group mb-3">
                <label for="login" class="form-label">E-posta veya Kullanıcı Adı</label>
                <input type="text" 
                       class="form-control @error('login') is-invalid @enderror" 
                       id="login" 
                       name="login" 
                       value="{{ old('login') }}" 
                       placeholder="E-posta adresiniz veya kullanıcı adınız"
                       required>
                @error('login')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Şifre</label>
                <div class="password-input-group">
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" 
                           name="password" 
                           placeholder="Şifrenizi girin"
                           required>
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        <i class="bi bi-eye" id="passwordToggleIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            Beni hatırla
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                        Şifremi unuttum
                    </a>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Giriş Yap
            </button>
        </form>

        <div class="auth-footer text-center">
            <p class="mb-0">Hesabınız yok mu? 
                <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">
                    Kayıt olun
                </a>
            </p>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('passwordToggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('bi-eye-slash');
        toggleIcon.classList.add('bi-eye');
    }
}
</script>
@endsection