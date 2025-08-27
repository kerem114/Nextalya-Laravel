@extends('auth.layout.app')
@section('title') Giriş @endsection
@section('content')
    <div class="form-container card animate-scale-in">
        <div class="text-center mb-4">
            <div class="homepage-logo mb-3" style="font-size: 2rem;">
                <span class="text-dark">NEXT</span><span class="text-gradient">ALYA</span>
            </div>
            <h2 class="fw-bold">Hoşgeldiniz</h2>
            <p class="text-muted">Hesabınıza giriş yapın</p>
        </div>
        
        <form action="{{ route('signin') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label fw-semibold">
                    <i class="bi bi-person me-2"></i>Kullanıcı Adı veya E-posta
                </label>
                <input type="text" id="username" name="login" class="form-control @error('login') is-invalid @enderror" value="{{ old('login') }}" placeholder="Kullanıcı adı veya email adresiniz"
                    required>
                @error('login')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">
                    <i class="bi bi-lock me-2"></i>Şifre
                </label>
                <div class="position-relative">
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Şifrenizi girin" required>
                    <button type="button" class="position-absolute end-0 top-50 translate-middle-y me-3 border-0 bg-transparent" onclick="togglePassword()">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label small" for="remember">
                        Beni hatırla
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="small text-decoration-none" href="{{ route('password.request') }}">
                        <i class="bi bi-question-circle me-1"></i>Şifremi unuttum
                    </a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Giriş Yap
            </button>
        </form>
        
        <div class="text-center">
            <p class="text-muted mb-0">Hesabınız yok mu? 
                <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">
                    Kayıt Ol
                </a>
            </p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
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
