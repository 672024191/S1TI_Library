<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'book_type_id',
        'author',
        'publisher',
        'year',
    ];

    public function bookType()
    {
        return $this->belongsTo(BookType::class);
    }
}