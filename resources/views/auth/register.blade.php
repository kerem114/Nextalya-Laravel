@extends('layouts.auth')

@section('title', 'Kayıt Ol - Nextalya')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header text-center mb-4">
            <h2 class="auth-logo">
                <span class="text-dark">Next</span><span class="text-primary">alya</span>
            </h2>
            <p class="text-muted">Yeni hesap oluşturun</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group mb-3">
                <label for="name" class="form-label">Ad Soyad</label>
                <input type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}" 
                       placeholder="Adınız ve soyadınız"
                       required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="username" class="form-label">Kullanıcı Adı</label>
                <input type="text" 
                       class="form-control @error('username') is-invalid @enderror" 
                       id="username" 
                       name="username" 
                       value="{{ old('username') }}" 
                       placeholder="Benzersiz kullanıcı adınız"
                       required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email" class="form-label">E-posta Adresi</label>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       placeholder="ornek@email.com"
                       required>
                @error('email')
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
                           placeholder="Güçlü bir şifre oluşturun"
                           required>
                    <button type="button" class="password-toggle" onclick="togglePassword('password')">
                        <i class="bi bi-eye" id="passwordToggleIcon"></i>
                    </button>
                </div>
                <div class="password-strength mt-2">
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar" id="strengthBar" style="width: 0%"></div>
                    </div>
                    <small class="text-muted" id="strengthText">Şifre gücü</small>
                </div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password_confirmation" class="form-label">Şifre Onayı</label>
                <div class="password-input-group">
                    <input type="password" 
                           class="form-control" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           placeholder="Şifrenizi tekrar girin"
                           required>
                    <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                        <i class="bi bi-eye" id="confirmToggleIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">
                <i class="bi bi-person-plus me-2"></i>
                Hesap Oluştur
            </button>
        </form>

        <div class="auth-footer text-center">
            <p class="mb-0">Zaten hesabınız var mı? 
                <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                    Giriş yapın
                </a>
            </p>
        </div>
    </div>
</div>

<script>
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(inputId === 'password' ? 'passwordToggleIcon' : 'confirmToggleIcon');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}

// Password strength checker
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');
    
    let strength = 0;
    let text = 'Çok zayıf';
    let color = 'bg-danger';
    
    if (password.length >= 8) strength += 25;
    if (/[A-Z]/.test(password)) strength += 25;
    if (/[0-9]/.test(password)) strength += 25;
    if (/[^A-Za-z0-9]/.test(password)) strength += 25;
    
    if (strength >= 75) {
        text = 'Güçlü';
        color = 'bg-success';
    } else if (strength >= 50) {
        text = 'Orta';
        color = 'bg-warning';
    } else if (strength >= 25) {
        text = 'Zayıf';
        color = 'bg-warning';
    }
    
    strengthBar.className = `progress-bar ${color}`;
    strengthBar.style.width = strength + '%';
    strengthText.textContent = text;
});
</script>
@endsection