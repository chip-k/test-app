<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\BookComment;

class MyPageController extends Controller
{
    public function index()
    {
        $books = Book::where('user_id', auth()->id())->paginate(10);
        return view('my_page.index', compact('books'));
    }
}
