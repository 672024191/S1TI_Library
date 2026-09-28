<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookTypes = BookType::all();
        return response()->json($bookTypes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:book_types,name|max:255',
            'description' => 'nullable|string',
        ]);

        $bookType = BookType::create($validated);

        return response()->json([
            'message' => 'BookType created successfully',
            'data' => $bookType,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookType $bookType)
    {
        return response()->json($bookType);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookType $bookType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookType $bookType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:book_types,name,' . $bookType->id,
            'description' => 'nullable|string',
        ]);

        $bookType->update($validated);

        return response()->json([
            'message' => 'BookType updated successfully',
            'data' => $bookType,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookType $bookType)
    {
        $bookType->delete();

        return response()->json([
            'message' => 'BookType deleted successfully',
        ]);
    }
}