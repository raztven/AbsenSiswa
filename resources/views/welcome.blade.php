<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-primary mb-3">
                <i class="fas fa-graduation-cap me-2"></i>Absensi Siswa
            </h1>
            <p class="lead text-secondary">Sistem Manajemen Absensi Sekolah Modern</p>
        </div>

        <div class="row justify-content-center w-100">
            <div class="col-md-6 text-center">
                @if (Route::has('login'))
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg px-4 gap-3">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                </a>
                            @else
                                <a href="{{ route('student.dashboard') }}" class="btn btn-primary btn-lg px-4 gap-3">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 gap-3">
                                <i class="fas fa-sign-in-alt me-2"></i>Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">
                                    <i class="fas fa-user-plus me-2"></i>Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        <footer class="mt-5 text-muted text-center">
            <small>&copy; {{ date('Y') }} Absensi Siswa. All rights reserved.</small>
            <div class="mt-2">
                <small>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</small>
            </div>
        </footer>
    </div>
</body>
</html>