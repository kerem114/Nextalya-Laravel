@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('/frontend/css/profile.css') }}">
@endsection
@section('content')
<div class="col-lg-6 offset-lg-3 col-md-12 add-post-area profile-tab-section-edit-wrapper">
        <!-- Form -->
    <form class="profile-tab-section-edit-form" method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data">
        @csrf
    <!-- Header -->
    <div class="profile-tab-section-edit-header d-flex align-items-center justify-content-between">
        <i class="bi bi-arrow-left-short profile-tab-section-edit-back-icon"></i>
        <h2 class="profile-tab-section-edit-title">Profil ayarları</h2>
        <div class="profile-tab-section-edit-placeholder"></div>
    </div>
    <!-- Profile Image -->
        <div class="profile-tab-section-edit-image-area text-center mt-4">
            <img id="profile-preview" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile" class="profile-tab-section-edit-profile-img">

            <div id="change-profile-pic" class="profile-tab-section-edit-change-pic mt-2" style="cursor: pointer;">
                Profil resmimi değiştir
            </div>

            <input type="file" id="profile-input" name="avatar" accept="image/*" style="display: none;">
        </div>

        <!-- Name -->
        <div class="profile-tab-section-edit-form-group">
            <label for="name" class="profile-tab-section-edit-label">Adınız soyadınız</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                class="profile-tab-section-edit-input form-control">
        </div>
        <!-- Username -->
        <div class="profile-tab-section-edit-form-group">
            <label for="username" class="profile-tab-section-edit-label">Kullanıcı adı</label>
            <input type="text" id="username" name="username" value="{{ Auth::user()->username }}"
                class="profile-tab-section-edit-input form-control">
        </div>
        <!-- Bio -->
        <div class="profile-tab-section-edit-form-group">
            <label for="bio" class="profile-tab-section-edit-label">Bio</label>
            <textarea id="bio" name="bio" rows="3"
                placeholder="Hakkınızda kısa bir bilgi yazın"
                class="profile-tab-section-edit-textarea form-control">{{ Auth::user()->bio }}</textarea>
        </div>
        <!-- Gender -->
        <div class="profile-tab-section-edit-form-group">
            <label for="gender" class="profile-tab-section-edit-label">Cinsiyet</label>
            <select id="gender" name="gender" class="form-select profile-tab-section-edit-select">
                <option selected disabled>Seçiniz</option>
                <option @selected(Auth::user()->gender == 'male') value="male">Erkek</option>
                <option @selected(Auth::user()->gender == 'female') value="female">Kadın</option>
            </select>
        </div>
        <a href="#" data-bs-toggle="modal" data-bs-target="#passwordChange" class="profile-tab-section-edit-change-pic mt-2 mb-3">Şifremi değiştir</a>
        <!-- Save Button -->
        <button type="submit" class="profile-tab-section-edit-button mt-3">
            Kaydet <i class="bi bi-chevron-down ms-2"></i>
        </button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="passwordChange" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Şifre değiştir</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('password.change') }}" method="POST">
        @csrf
      <div class="modal-body">
        <div class="profile-tab-section-edit-form-group">
            <label for="username" class="profile-tab-section-edit-label">Eski şifreniz</label>
            <input type="password" id="password" name="old_password"
                class="profile-tab-section-edit-input form-control">
        </div>
        <div class="profile-tab-section-edit-form-group">
            <label for="username" class="profile-tab-section-edit-label">Yeni şifreniz</label>
            <input type="password" id="password" name="new_password"
                class="profile-tab-section-edit-input form-control">
        </div>
        <div class="profile-tab-section-edit-form-group">
            <label for="username" class="profile-tab-section-edit-label">Yeni şifrenizi onaylayınız</label>
            <input type="password" id="password" name="new_password_confirmation"
                class="profile-tab-section-edit-input form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </div>
      </form>
    </div>
  </div>
</div>
@section('js')
<script>
    document.getElementById('change-profile-pic').addEventListener('click', function () {
        document.getElementById('profile-input').click();
    });

    document.getElementById('profile-input').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('profile-preview').src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
@endsection
