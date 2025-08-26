@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post-types.css') }}">
@endsection
@section('content')
<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
       <input type="hidden" name="visibility" id="visibilityInput" value="just_me">
<div class="col-lg-6 offset-lg-3 col-md-12 review-post-area">
    <div class="review-post-header">
        <div class="review-post-profile">
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profil" class="review-post-profile-img" />
            <div class="review-post-user-info">
                <div class="review-post-user-name">{{ Auth::user()->name }}</div>
                <div class="review-post-user-nickname">{{ '@' . Auth::user()->username }}</div>
            </div>
        </div>
        <div class="dropdown review-post-privacy">
            <select name="visibility" id="visibility" class="form-control">
                <option value="just_me" data-icon="bi-lock">Sadece Ben</option>
                <option value="friends" data-icon="bi-people-fill">Arkadaşlar</option>
                <option value="everyone" data-icon="bi-globe">Herkes</option>
            </select>
        </div>

    </div>
    <!-- Textarea & Image -->
    <div class="post-textarea-wrapper">
        <textarea class="post-textarea" placeholder="Ne düşünüyorsun, {{ Auth::user()->name }}?" name="description" id="post-textarea"></textarea>
        <img src="" class="post-image-preview" alt="Görsel Önizleme" style="display: none;" />
        <div id="char-counter" style="font-size: 12px; color: gray; margin-top: 4px;">
            300 karakter kaldı
        </div>
    </div>
    <!-- Butonlar -->
    <div class="post-action-icons">
        <button type="button" class="post-icon-btn" id="image-btn"><i class="bi bi-image"></i></button>

    </div>
    <input type="file" id="image-upload" name="image" accept="image/*" style="display: none;" />
    <!-- Gönderiyi Öne Çıkar + Paylaş -->
    <div class="post-bottom-actions">

        <button class="btn btn-primary share-button"><i class="bi bi-send-fill"></i> Paylaş</button>
    </div>
    <!-- Emoji Picker -->
    <div id="emoji-picker" class="emoji-picker" style="display: none;"></div>
</div>
</form>
@section('js')
   <script>
        document.querySelectorAll('.review-post-privacy-dropdown .dropdown-item').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                const value = this.getAttribute('data-value');
                const iconHTML = this.querySelector('i').outerHTML;
                const text = this.textContent.trim();
                const btn = document.getElementById('privacyDropdown');
                btn.innerHTML = `${iconHTML} ${text}`;
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@4.6.2/dist/index.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const button = document.querySelector("#emoji-btn");
            const picker = new EmojiButton({
                position: 'top-start',
                theme: 'auto'
            });

            picker.on("emoji", emoji => {
                const textarea = document.querySelector(".post-textarea");
                textarea.value += emoji;
            });

            button.addEventListener("click", () => {
                picker.togglePicker(button);
            });
        });
    </script>

    <script>
        const imageInput = document.getElementById("image-upload");

        document.getElementById("image-btn").addEventListener("click", () => {
            imageInput.click();
        });

        imageInput.addEventListener("change", (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const preview = document.querySelector(".post-image-preview");
                    preview.src = event.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
<script>
    document.querySelectorAll('.dropdown-item').forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            const selectedText = this.getAttribute('data-text');
            const hiddenInput = document.getElementById('visibilityInput');

            let value = selectedText.toLowerCase().replace(/\s+/g, '_');
            hiddenInput.value = value;

            document.getElementById('dropdownToggle').innerHTML = this.innerHTML;
        });
    });
</script>
    <script>
        document.querySelectorAll('.poll-post-privacy .dropdown-item').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();

                const iconClass = this.getAttribute('data-icon');
                const text = this.getAttribute('data-text');

                const button = document.getElementById('pollPrivacyBtn');
                button.innerHTML = `<i class="bi ${iconClass}"></i> ${text}`;
            });
        });
    </script>
    <script>
    const textarea = document.getElementById('post-textarea');
    const counter = document.getElementById('char-counter');
    const maxLength = 300;

    textarea.addEventListener('input', function () {
        let currentLength = textarea.value.length;

        if (currentLength > maxLength) {
            textarea.value = textarea.value.substring(0, maxLength);
            currentLength = maxLength;
        }

        const remaining = maxLength - currentLength;
        counter.textContent = `${remaining} karakter kaldı`;

        counter.style.color = remaining <= 20 ? 'red' : 'gray';
    });
</script>
<script>
$(document).ready(function() {
    $('#visibility').select2({
        templateResult: function (option) {
            if (!option.id) return option.text;
            var icon = $(option.element).data('icon');
            return $('<span><i class="bi ' + icon + '"></i> ' + option.text + '</span>');
        },
        templateSelection: function (option) {
            if (!option.id) return option.text;
            var icon = $(option.element).data('icon');
            return $('<span><i class="bi ' + icon + '"></i> ' + option.text + '</span>');
        },
        minimumResultsForSearch: Infinity
    });
});
</script>
@endsection
@endsection
