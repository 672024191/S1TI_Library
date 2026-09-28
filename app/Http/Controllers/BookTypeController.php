<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    public function index()
    {
        // Server-side pagination (5 data per halaman)
        $bookTypes = BookType::latest()->paginate(5);
        return view('book-types.index', compact('bookTypes'));
    }

    public function create()
    {
        return view('book-types.form', ['bookType' => new BookType()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:book_types,name',
        ]);

        BookType::create($validated);

        return redirect()->route('book-types.index')->with('success', 'Tipe buku berhasil ditambahkan.');
    }

    public function edit(BookType $bookType)
    {
        return view('book-types.form', compact('bookType'));
    }

    public function update(Request $request, BookType $bookType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:book_types,name,' . $bookType->id,
        ]);

        $bookType->update($validated);

        return redirect()->route('book-types.index')->with('success', 'Tipe buku berhasil diperbarui.');
    }

    public function destroy(BookType $bookType)
    {
        $bookType->delete();

        return redirect()->route('book-types.index')->with('success', 'Tipe buku berhasil dihapus.');
    }
}