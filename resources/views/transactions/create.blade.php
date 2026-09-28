<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4 mb-5">
        <h2 class="mb-4">Tambah Peminjaman Buku</h2>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong class="d-block mb-1">Gagal menyimpan data:</strong>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf

            <div class="mb-3">
                <label for="member_id" class="form-label fw-bold">Member / Peminjam</label>
                <select name="member_id" id="member_id" class="form-select" required>
                    <option value="">-- Pilih Member --</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="borrow_date" class="form-label fw-bold">Tanggal Pinjam</label>
                    <input type="date" class="form-control" id="borrow_date" name="borrow_date" value="{{ old('borrow_date', date('Y-m-d')) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="return_date" class="form-label fw-bold">Tanggal Kembali</label>
                    <input type="date" class="form-control" id="return_date" name="return_date" value="{{ old('return_date') }}" required>
                </div>
            </div>

            <hr class="my-4">
            <h5 class="mb-3">Daftar Buku yang Dipinjam</h5>

            <div id="book-items">
                @if(old('book_ids'))
                    @foreach(old('book_ids') as $index => $oldBookId)
                        <div class="row mb-3 book-row">
                            <div class="col-md-10">
                                <select name="book_ids[]" class="form-select" required>
                                    <option value="">-- Pilih Buku --</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}" {{ $oldBookId == $book->id ? 'selected' : '' }}>
                                            {{ $book->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-outline-danger w-100 remove-book-btn" {{ $loop->first ? 'style=display:none;' : '' }}>Hapus</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row mb-3 book-row">
                        <div class="col-md-10">
                            <select name="book_ids[]" class="form-select" required>
                                <option value="">-- Pilih Buku --</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger w-100 remove-book-btn" style="display: none;">Hapus</button>
                        </div>
                    </div>
                @endif
            </div>

            <button type="button" id="add-book-btn" class="btn btn-outline-primary mb-4">+ Tambah Buku Lain</button>

            <br>
            <button type="submit" class="btn btn-success">Simpan Transaksi</button>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        document.getElementById('add-book-btn').addEventListener('click', function() {
            const container = document.getElementById('book-items');
            const firstRow = container.querySelector('.book-row');
            const newRow = firstRow.cloneNode(true);
            
            newRow.querySelector('select').value = '';
            const removeBtn = newRow.querySelector('.remove-book-btn');
            removeBtn.style.display = 'block';
            removeBtn.onclick = function() {
                newRow.remove();
            };

            container.appendChild(newRow);
        });

        document.querySelectorAll('.remove-book-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                btn.closest('.book-row').remove();
            });
        });
    </script>
</body>
</html>