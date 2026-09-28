<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4 mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Transaksi Peminjaman</h2>
            <div>
                <a href="/" class="btn btn-secondary me-2">Kembali ke Home</a>
                <a href="{{ route('transactions.create') }}" class="btn btn-primary">+ Pinjam Buku</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama Member</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Buku Dipinjam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $index => $trx)
                        <tr>
                            <td>{{ $transactions->firstItem() + $index }}</td>
                            <td><span class="fw-bold">{{ $trx->member->name ?? '-' }}</span></td>
                            <td>{{ $trx->borrow_date }}</td>
                            <td>{{ $trx->return_date }}</td>
                            <td>
                                <ul class="mb-0 ps-3">
                                    @foreach($trx->details as $detail)
                                        <li>{{ $detail->book->title ?? '-' }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">Belum ada data transaksi peminjaman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Server-side Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $transactions->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>