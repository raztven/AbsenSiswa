<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Absensi Siswa</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4 class="fw-bold text-primary mb-0"><i class="fas fa-graduation-cap me-2"></i>Absensi</h4>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('admin.users.create') }}"><i class="fas fa-user-plus"></i> Tambah Siswa</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-calendar-check"></i> Riwayat Absen</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-file-alt"></i> Laporan</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-cog"></i> Pengaturan</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded-3 mb-4">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-light d-md-none">
                        <i class="fas fa-align-left"></i>
                    </button>

                    <div class="ms-auto d-flex align-items-center">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366f1&color=fff" class="rounded-circle me-2" width="32" height="32">
                                <span class="fw-semibold text-dark d-none d-sm-inline">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i> Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid p-0">
                <!-- Welcome Section -->
                <div class="mb-4">
                    <h2 class="h3 fw-bold text-dark">Ringkasan Dashboard</h2>
                    <p class="text-muted">Selamat datang kembali, Admin! Berikut adalah statistik hari ini.</p>
                </div>

                <!-- Stat Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted small text-uppercase fw-bold">Total Siswa</h6>
                                        <h2 class="fw-bold mb-0">{{ $students->count() }}</h2>
                                    </div>
                                    <div class="bg-primary-subtle p-3 rounded-3 text-primary">
                                        <i class="fas fa-users fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card shadow-sm h-100 border-success" style="border-left-color: #198754 !important;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted small text-uppercase fw-bold">Hadir Hari Ini</h6>
                                        <h2 class="fw-bold mb-0">0</h2>
                                    </div>
                                    <div class="bg-success-subtle p-3 rounded-3 text-success">
                                        <i class="fas fa-user-check fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card shadow-sm h-100 border-warning" style="border-left-color: #ffc107 !important;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted small text-uppercase fw-bold">Izin / Sakit</h6>
                                        <h2 class="fw-bold mb-0">0</h2>
                                    </div>
                                    <div class="bg-warning-subtle p-3 rounded-3 text-warning">
                                        <i class="fas fa-user-clock fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card shadow-sm h-100 border-danger" style="border-left-color: #dc3545 !important;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted small text-uppercase fw-bold">Alpa</h6>
                                        <h2 class="fw-bold mb-0">0</h2>
                                    </div>
                                    <div class="bg-danger-subtle p-3 rounded-3 text-danger">
                                        <i class="fas fa-user-times fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Students Table Card -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Daftar Siswa Terbaru</h5>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-1"></i> Tambah Baru
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="px-4 py-3 text-secondary small fw-bold">NAMA SISWA</th>
                                        <th class="px-4 py-3 text-secondary small fw-bold">EMAIL</th>
                                        <th class="px-4 py-3 text-secondary small fw-bold">STATUS</th>
                                        <th class="px-4 py-3 text-secondary small fw-bold text-center">TANGGAL DAFTAR</th>
                                        <th class="px-4 py-3 text-secondary small fw-bold text-center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                    <tr>
                                        <td class="px-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=random" class="rounded-circle me-3" width="35">
                                                <span class="fw-bold text-dark">{{ $student->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-secondary">{{ $student->email }}</td>
                                        <td class="px-4 py-3">
                                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Aktif</span>
                                        </td>
                                        <td class="px-4 py-3 text-secondary text-center">
                                            {{ $student->created_at->format('d M Y') }}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <button class="btn btn-light btn-sm"><i class="fas fa-edit text-primary"></i></button>
                                            <button class="btn btn-light btn-sm"><i class="fas fa-trash text-danger"></i></button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-5 text-center text-muted">
                                            <i class="fas fa-users-slash fa-3x mb-3 opacity-25"></i>
                                            <p class="mb-0">Belum ada data siswa.</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>