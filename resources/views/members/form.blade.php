<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $member->exists ? 'Edit Member' : 'Tambah Member' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>{{ $member->exists ? 'Edit Member' : 'Tambah Member' }}</h2>
        <form action="{{ $member->exists ? route('members.update', $member) : route('members.store') }}" method="POST">
            @csrf
            @if($member->exists) @method('PUT') @endif

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}" required>
            </div>
            <div class="mb-3">
                <label>No. HP</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $member->phone) }}" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="address" class="form-control">{{ old('address', $member->address) }}</textarea>
            </div>
            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>