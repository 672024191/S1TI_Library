<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookType;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Server-side pagination (5 data per halaman) dengan Eager Loading relasi bookType
        $books = Book::with('bookType')->latest()->paginate(5);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $bookTypes = BookType::all();
        return view('books.form', [
            'book' => new Book(),
            'bookTypes' => $bookTypes
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'book_type_id' => 'required|exists:book_types,id',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|numeric',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        $bookTypes = BookType::all();
        return view('books.form', compact('book', 'bookTypes'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'book_type_id' => 'required|exists:book_types,id',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|numeric',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}