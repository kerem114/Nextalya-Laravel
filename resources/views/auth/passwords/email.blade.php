@extends('auth.layout.app')

@section('content')
    <div class="form-container">
        <h2 class="text-center">Şifrenizi sıfırlayın</h2>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="input-field" placeholder="Email adresiniz" required>
            </div>



            <button type="submit" class="submit-btn">Sıfırla</button>
        </form>
        <p class="switch-page mt-1">Hatırladınız mı? <a href="{{ route('login') }}">Giriş yap</a></p>
    </div>

@endsection
