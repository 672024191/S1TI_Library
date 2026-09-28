<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Tipe Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Master Tipe Buku</h2>
            <a href="{{ route('book-types.create') }}" class="btn btn-primary">+ Tambah Tipe Buku</a>
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
                            <th style="width: 80px;">No</th>
                            <th>Nama Tipe Buku</th>
                            <th style="width: 200px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookTypes as $index => $type)
                        <tr>
                            <td>{{ $bookTypes->firstItem() + $index }}</td>
                            <td>{{ $type->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('book-types.edit', $type) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('book-types.destroy', $type) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tipe buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-3">Belum ada data tipe buku.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Server-side Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $bookTypes->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>