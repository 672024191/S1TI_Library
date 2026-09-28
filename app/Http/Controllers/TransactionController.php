<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Member;
use App\Models\Book;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['member', 'details.book'])->latest()->paginate(5);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $members = Member::all();
        $books = Book::all();
        return view('transactions.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id'   => 'required|exists:members,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:borrow_date',
            'book_ids'    => 'required|array|min:1',
            'book_ids.*'  => 'required|exists:books,id',
        ]);

        $transaction = Transaction::create([
            'member_id'   => $request->member_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
        ]);

        foreach ($request->book_ids as $book_id) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'book_id'        => $book_id,
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaksi peminjaman berhasil disimpan.');
    }
}