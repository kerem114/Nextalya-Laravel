<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Nextalya')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
</head>

<body>

    <canvas id="background-animation"></canvas>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top">
            <div class="container-fluid">
                <!-- Logo -->
                <div class="homepage-logo me-4 d-flex justify-content-start">
                    <a href="/" class="text-dark text-decoration-none fw-bold fs-4 d-block">
                        <span class="text-dark">NEXT</span><span class="text-gold">ALYA</span>
                    </a>
                </div>


                <!-- Giriş Yapmamış Kullanıcı için Butonlar -->
                <div class="d-flex justify-content-end d-none d-md-flex">
                    <a href="{{ route('login') }}" class="btn btn-homepage-login btn-outline-dark ms-3">Giriş yap</a>
                    <a href="{{ route('register') }}" class="btn btn-homepage-signup fw-semibold ms-3">Kayıt ol</a>
                </div>

                <!-- Mobile Dropdown Button -->
                <div class="dropdown d-md-none ms-auto" id="mobilmenu">
                    <button class="btn btn-gold text-dark btn-sm dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('login') }}">Giriş yap</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Kayıt ol</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const canvas = document.getElementById("background-animation");
        const ctx = canvas.getContext("2d");
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particles = [];

        for (let i = 0; i < 60; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                r: Math.random() * 4 + 1,
                dx: (Math.random() - 0.5) * 0.8,
                dy: (Math.random() - 0.5) * 0.8,
            });
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            for (let p of particles) {
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle = "rgba(212, 175, 55, 0.2)";
                ctx.fill();
                p.x += p.dx;
                p.y += p.dy;

                if (p.x < 0 || p.x > canvas.width) p.dx *= -1;
                if (p.y < 0 || p.y > canvas.height) p.dy *= -1;
            }
            requestAnimationFrame(animate);
        }
        animate();
    </script>

</body>

</html>
