@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post-create.css') }}">
@endsection
@section('content')
            <!-- Orta Alan: Add Post -->
            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
                <div class="add-post-create-overlay">
                    <video id="camera-stream" autoplay muted playsinline></video>
                    <div class="add-post-create-buttons-wrapper">
                        <h2 class="add-post-create-title">Bir gönderi oluşturun</h2>

                        <div class="add-post-create-fab-wrapper">
                            <button class="add-post-create-fab-toggle" id="addPostCreateFabToggle">
                                <i class="bi bi-plus"></i>
                            </button>
                            <div class="add-post-create-fab-menu show">
                                <!-- <div class="add-post-create-fab-menu" id="addPostCreateFabMenu"> -->
                                <a href="{{ route('post.create') }}" class="add-post-create-fab-item" data-target="post">
                                    <i class="bi bi-star-fill"></i><span>Gönderi</span>
                                </a>
                                <a href="{{ route('poll.create') }}" class="add-post-create-fab-item" data-target="poll">
                                    <i class="bi bi-bar-chart-fill"></i><span>Anket</span>
                                </a>
                                <a href="{{ route('discussion.create') }}" class="add-post-create-fab-item" data-target="discussion">
                                    <i class="bi bi-chat-left-text-fill"></i><span>Tartışma</span>
                                </a>
                            </div>
                        </div>
                        <!-- Finish -->

                        <button id="toggle-camera" class="add-post-toggle-camera" aria-label="Switch Camera">
                            <i class="bi bi-arrow-repeat"></i>
                        </button>
                    </div>
                </div>
            </div>
@section('js')

    <script>
        let currentStream;
        let currentFacingMode = "user";

        async function startCamera(facingMode = "user") {
            if (currentStream) {
                currentStream.getTracks().forEach(track => track.stop());
            }

            try {
                const constraints = {
                    video: { facingMode: { exact: facingMode } },
                    audio: false
                };

                currentStream = await navigator.mediaDevices.getUserMedia(constraints);

                const videoElement = document.getElementById("camera-stream");
                videoElement.srcObject = currentStream;
                await videoElement.play();

            } catch (err) {
                console.warn("Kamera erişimi sağlanamadı:", err);
                fallbackToFirstCamera();
            }
        }

        async function fallbackToFirstCamera() {
            try {
                const devices = await navigator.mediaDevices.enumerateDevices();
                const videoDevices = devices.filter(device => device.kind === "videoinput");

                if (videoDevices.length > 1) {
                    const selectedDevice = videoDevices.find(d => d.label.toLowerCase().includes("back")) || videoDevices[1];
                    const constraints = {
                        video: { deviceId: selectedDevice.deviceId },
                        audio: false
                    };

                    currentStream = await navigator.mediaDevices.getUserMedia(constraints);
                    document.getElementById("camera-stream").srcObject = currentStream;
                }
            } catch (err) {
                console.error("Fallback kamera seçilemedi:", err);
            }
        }

        document.addEventListener("DOMContentLoaded", () => {
            startCamera(currentFacingMode);

            document.getElementById("toggle-camera").addEventListener("click", () => {
                currentFacingMode = currentFacingMode === "user" ? "environment" : "user";
                startCamera(currentFacingMode);
            });
        });

    </script>

@endsection
@endsection
