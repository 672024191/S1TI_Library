<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $bookType->exists ? 'Edit Tipe Buku' : 'Tambah Tipe Buku' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">{{ $bookType->exists ? 'Edit Tipe Buku' : 'Tambah Tipe Buku' }}</h2>

        <form method="POST" action="{{ $bookType->exists ? route('book-types.update', $bookType) : route('book-types.store') }}">
            @csrf
            @if($bookType->exists)
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Nama Tipe Buku</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $bookType->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('book-types.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>