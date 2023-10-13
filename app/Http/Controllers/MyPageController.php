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
        // $books = Book::get($user);
        return view('my_page.index');
    }
}
