<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body text-center p-5">
                <h1 class="mb-4">Selamat Datang di Sistem Informasi Perpustakaan</h1>
                <p class="text-muted mb-4">Anda berhasil login ke sistem.</p>

                <div class="d-flex justify-content-center gap-2 mb-4">
                    <a href="{{ route('book-types.index') }}" class="btn btn-outline-primary">Tipe Buku</a>
                    <a href="{{ route('books.index') }}" class="btn btn-outline-primary">Master Buku</a>
                    <a href="{{ route('members.index') }}" class="btn btn-outline-primary">Master Member</a>
                    <a href="{{ route('transactions.index') }}" class="btn btn-outline-primary">Transaksi</a>
                </div>

                <hr class="my-4">

                <!-- Form Logout -->
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>