<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/"><i class="bi bi-book-half me-2"></i>SITI Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('book-types.index') }}">Tipe Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Data Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('members.index') }}">Member</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('transactions.index') }}">Transaksi</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="p-5 mb-4 bg-white rounded-3 shadow-sm text-center">
            <h1 class="display-5 fw-bold text-primary">Sistem Perpustakaan</h1>
            <p class="lead col-md-8 mx-auto text-muted">Selamat datang di SIM Perpustakaan. Silakan pilih menu di bawah ini untuk mengelola data.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-tags display-4 text-primary"></i>
                        <h5 class="card-title mt-3">Master Tipe Buku</h5>
                        <p class="card-text text-muted small">Kelola kategori / jenis buku.</p>
                        <a href="{{ route('book-types.index') }}" class="btn btn-outline-primary btn-sm w-100">Buka Menu</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-book display-4 text-success"></i>
                        <h5 class="card-title mt-3">Master Buku</h5>
                        <p class="card-text text-muted small">Kelola daftar seluruh koleksi buku.</p>
                        <a href="{{ route('books.index') }}" class="btn btn-outline-success btn-sm w-100">Buka Menu</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-people display-4 text-warning"></i>
                        <h5 class="card-title mt-3">Master Member</h5>
                        <p class="card-text text-muted small">Kelola data anggota / peminjam.</p>
                        <a href="{{ route('members.index') }}" class="btn btn-outline-warning btn-sm w-100">Buka Menu</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-receipt-cutoff display-4 text-danger"></i>
                        <h5 class="card-title mt-3">Transaksi</h5>
                        <p class="card-text text-muted small">Catat peminjaman buku oleh member.</p>
                        <a href="{{ route('transactions.index') }}" class="btn btn-outline-danger btn-sm w-100">Buka Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>