<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Absensi Siswa</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="login-page">

    <div class="mobile-header-bg"></div>

    <div class="login-container">
        <div class="card p-4">
            <div class="text-center mb-4">
                <div class="brand-icon shadow-sm">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h4 class="fw-bold text-dark mb-1">Presensi Digital</h4>
                <p class="text-muted small">Masukkan email dan password sekolah</p>
            </div>

            <form action="{{ route('authenticate') }}" method="POST">
                @csrf

                <div class="mb-2">
                    <label class="form-label">Email Sekolah</label>
                    <div class="input-group-custom">
                        <i class="fas fa-envelope main-icon"></i>
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="nama@sekolah.sch.id"
                            value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                    <span class="error-feedback">
                        <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kata Sandi</label>
                    <div class="input-group-custom">
                        <i class="fas fa-lock main-icon"></i>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="••••••••" required>
                        <button type="button" id="togglePassword" class="btn-toggle-pwd">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                    @error('password')
                    <span class="error-feedback">
                        <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-login w-100 shadow-sm">
                    Masuk ke Sistem <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </form>
        </div>

        <div class="text-center mt-4">
            <p class="small text-secondary mb-0">Lupa password atau kendala akses?</p>
            <a href="#" class="text-decoration-none fw-bold text-primary small">Hubungi Admin IT Sekolah</a>
        </div>
    </div>

    <script>
        // Script untuk toggle lihat password
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        if (togglePassword) {
            togglePassword.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);

                // Ganti ikon mata
                eyeIcon.classList.toggle('fa-eye');
                eyeIcon.classList.toggle('fa-eye-slash');
            });
        }
    </script>
</body>

</html>