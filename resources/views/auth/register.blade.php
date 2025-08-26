@extends('auth.layout.app')
@section('title') Kayıt ol @endsection
@section('content')
    <div class="form-container card-enhanced animate-scale-in">
        <div class="text-center mb-4">
            <div class="modern-logo mb-3" style="font-size: 2rem;">NEXTALYA</div>
            <h2 class="heading-modern mb-2">Yeni hesap oluştur</h2>
            <p class="text-modern">Bilgileri doldurarak hesabınızı oluşturun</p>
            <div class="modern-badge modern-badge-success mb-3">
                <i class="bi bi-gift me-1"></i>
                İlk kullanıcılarımıza özel sürpriz avantajlar 🎁
            </div>
        </div>
        
        <form action="{{ route('register') }}" method="POST" class="form-enhanced">
            @csrf
            <div class="form-group-enhanced">
                <label for="name" class="form-label-enhanced">
                    <i class="bi bi-person me-2"></i>Ad Soyad
                </label>
                <input type="text" id="name" name="name" class="form-input-enhanced" placeholder="Adınız ve soyadınız" required>
            </div>
            <div class="form-group-enhanced">
                <label for="email" class="form-label-enhanced">
                    <i class="bi bi-envelope me-2"></i>E-posta Adresi
                </label>
                <input type="email" id="email" name="email" class="form-input-enhanced" placeholder="ornek@email.com" required>
            </div>
            <div class="form-group-enhanced">
                <label for="username" class="form-label-enhanced">
                    <i class="bi bi-at me-2"></i>Kullanıcı Adı
                </label>
                <input type="text" id="username" name="username" class="form-input-enhanced" placeholder="kullaniciadi"
                    required>
                <small class="text-muted">Bu, profilinizde görünecek benzersiz adınız olacak</small>
            </div>
            <div class="form-group-enhanced">
                <label for="password" class="form-label-enhanced">
                    <i class="bi bi-lock me-2"></i>Şifre
                </label>
                <div class="position-relative">
                    <input type="password" id="password" name="password" class="form-input-enhanced" placeholder="Güçlü bir şifre oluşturun" required>
                    <button type="button" class="position-absolute end-0 top-50 translate-middle-y me-3 border-0 bg-transparent" onclick="togglePassword('password')">
                        <i class="bi bi-eye" id="toggleIcon1"></i>
                    </button>
                </div>
                <div class="mt-2">
                    <div class="modern-progress">
                        <div class="modern-progress-bar" id="passwordStrength" style="width: 0%"></div>
                    </div>
                    <small class="text-muted" id="passwordStrengthText">Şifre gücü</small>
                </div>
            </div>
            <div class="form-group-enhanced">
                <label for="confirm-password" class="form-label-enhanced">
                    <i class="bi bi-shield-check me-2"></i>Şifreyi Onaylayın
                </label>
                <div class="position-relative">
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-input-enhanced"
                    placeholder="Şifreyi onayla" required>
                    <button type="button" class="position-absolute end-0 top-50 translate-middle-y me-3 border-0 bg-transparent" onclick="togglePassword('password-confirm')">
                        <i class="bi bi-eye" id="toggleIcon2"></i>
                    </button>
                </div>
            </div>
            
            <button type="submit" class="btn-primary-enhanced btn-enhanced w-100 mb-3">
                <i class="bi bi-person-plus me-2"></i>
                Hesap Oluştur
            </button>
        </form>
        
        <div class="text-center">
            <p class="text-modern mb-0">Zaten hesabınız var mı? 
                <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                    Giriş Yap
                </a>
            </p>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(inputId === 'password' ? 'toggleIcon1' : 'toggleIcon2');
            
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
        
        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('passwordStrengthText');
            
            let strength = 0;
            let text = 'Çok zayıf';
            
            if (password.length >= 8) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;
            
            if (strength >= 75) text = 'Güçlü';
            else if (strength >= 50) text = 'Orta';
            else if (strength >= 25) text = 'Zayıf';
            
            strengthBar.style.width = strength + '%';
            strengthText.textContent = text;
            
            if (strength >= 75) strengthBar.style.background = 'linear-gradient(90deg, #10b981, #059669)';
            else if (strength >= 50) strengthBar.style.background = 'linear-gradient(90deg, #f59e0b, #d97706)';
            else strengthBar.style.background = 'linear-gradient(90deg, #ef4444, #dc2626)';
        });
    </script>

@endsection
