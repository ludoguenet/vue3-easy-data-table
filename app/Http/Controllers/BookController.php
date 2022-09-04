<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Models\Book;

class BookController extends Controller
{
    public function index(): BookCollection
    {
        return new BookCollection(
            Book::select([
                'title',
                'description',
                'users.name AS author',
                'users.email AS email'
            ])
            ->join('users', 'books.user_id', 'users.id')
            ->get(),
//            Book::with('user')
//                ->get(),
        );
    }
}
