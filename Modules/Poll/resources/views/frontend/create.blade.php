@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post-types.css') }}">
@endsection
@section('content')
<form action="{{ route('poll.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

            <div class="col-lg-6 offset-lg-3 col-md-12 poll-post-area">
                <!-- Header -->
                <div class="poll-post-header">
                    <div class="poll-post-left">
                        <div class="poll-post-profile">
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profil" class="poll-post-profile-img" />
                            <div class="poll-post-user-info">
                                <div class="poll-post-user-name">{{ Auth::user()->name }}</div>
                                <div class="poll-post-user-nickname">{{ '@' . Auth::user()->username }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="poll-post-center">
                        <div class="poll-post-title">Anket Oluştur</div>
                    </div>

                    <div class="poll-post-right">
                    <div class="dropdown review-post-privacy">
                        <select name="visibility" id="visibility" class="form-control">
                            <option value="just_me" data-icon="bi-lock">Sadece Ben</option>
                            <option value="friends" data-icon="bi-people-fill">Arkadaşlar</option>
                            <option value="everyone" data-icon="bi-globe">Herkes</option>
                        </select>
                    </div>
                    </div>
                </div>


                <!-- Anket Formu -->
                <div class="poll-form">
                    <input type="text" id="poll-question" name="title" class="form-control poll-question-input mb-4"
                        placeholder="Anket sorusu yazın">
                        <hr>
                    <div id="poll-options" class="poll-options-list">
                        <div class="input-group mb-2">
                            <input type="text" name="options[]" class="form-control poll-option-input" placeholder="Seçenek 1">
                            <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()">×</button>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" name="options[]" class="form-control poll-option-input" placeholder="Seçenek 2">
                            <button type="button" class="btn btn-outline-danger" onclick="this.parentElement.remove()">×</button>
                        </div>
                    </div>
                    <div id="option-warning" class="text-danger mb-2" style="display:none;"></div>
                    <button type="button" id="poll-add-option" class="btn btn-light poll-add-option">+ Seçenek Ekle</button>
                    <button type="submit" class="btn poll-post-share">Paylaş</button>
                </div>


            </div>
        </form>
@section('js')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const addOptionBtn = document.getElementById("poll-add-option");
    const optionsContainer = document.getElementById("poll-options");
    const warningDiv = document.getElementById("option-warning");

    addOptionBtn.addEventListener("click", () => {
        const count = optionsContainer.querySelectorAll(".poll-option-input").length;

        if (count >= 5) {
            warningDiv.textContent = "En fazla 5 seçenek ekleyebilirsiniz!";
            warningDiv.style.display = "block";
            return;
        } else {
            warningDiv.style.display = "none";
        }

        const optionWrapper = document.createElement("div");
        optionWrapper.className = "input-group mb-2";

        const input = document.createElement("input");
        input.type = "text";
        input.name = "options[]";
        input.placeholder = `Seçenek ${count + 1}`;
        input.className = "form-control poll-option-input";

        const deleteBtn = document.createElement("button");
        deleteBtn.type = "button";
        deleteBtn.className = "btn btn-outline-danger";
        deleteBtn.textContent = "×";
        deleteBtn.addEventListener("click", () => {
            optionWrapper.remove();

            // Placeholder numaralarını güncelle
            optionsContainer.querySelectorAll(".poll-option-input").forEach((el, idx) => {
                el.placeholder = `Seçenek ${idx + 1}`;
            });

            warningDiv.style.display = "none"; // silinince uyarıyı gizle
        });

        optionWrapper.appendChild(input);
        optionWrapper.appendChild(deleteBtn);
        optionsContainer.appendChild(optionWrapper);
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
