@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post-create-discussion.css') }}">
@endsection
@section('content')
<form action="{{ route('discussion.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
       <input type="hidden" name="visibility" id="visibilityInput" value="just_me">
        <div class="col-lg-6 col-md-8 col-12 discussion-post-area">

                <!-- Aşama 1: Form -->
                <div id="discussion-form-section">
                    <div class="discussion-post-header">
                        <div class="discussion-post-profile">
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile" class="discussion-post-profile-img" />
                            <div class="discussion-post-user-info">
                                <div class="discussion-post-user-name">{{ Auth::user()->name }}</div>
                                <div class="discussion-post-user-nickname">{{ '@' . Auth::user()->username }}</div>
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

                    <div class="discussion-post-title">Konuşma Başlat</div>

                    <div class="discussion-form">
                        <input type="text" name="title" required class="form-control discussion-question-input"
                            placeholder="Tartışma başlığınızı yazın..." />
                        <textarea name="description" class="form-control discussion-description-input" rows="4"
                            placeholder="Görüşlerinizi paylaşın..."></textarea>

                        <div class="discussion-action-icons">

                            <button type="button" class="discussion-icon-btn" id="discussion-image-btn"><i
                                    class="bi bi-image"></i></button>

                        </div>

                        <div id="discussion-emoji-picker" class="discussion-emoji-picker" style="display: none;"></div>

                        <img src="" alt="Preview" class="discussion-image-preview" style="display: none;" />
                        <input type="file" id="image-upload" name="image" accept="image/*" style="display: none;" />
                        <button type="submit" class="discussion-post-share">Gönder</button>
                    </div>
                </div>



            </div>
</form>

@section('js')

    <script>
        document.querySelectorAll('.discussion-post-privacy .dropdown-item').forEach(item => {
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
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll("#discussion-post-section .dropdown-menu .dropdown-item").forEach(item => {
                item.addEventListener("click", function (e) {
                    e.preventDefault();
                    const iconClass = this.getAttribute("data-icon");
                    const text = this.getAttribute("data-text");

                    const btn = document.getElementById("postedPrivacyBtn");
                    const textSpan = document.getElementById("postedPrivacyText");

                    btn.querySelector("i").className = `bi ${iconClass}`;
                    textSpan.textContent = text;
                });
            });
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
    document.getElementById('discussion-image-btn').addEventListener('click', function () {
        document.getElementById('image-upload').click();
    });
</script>
@endsection
@endsection
