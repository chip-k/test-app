<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class BookmarkController extends Controller
{
    public function store($bookId) {
        $user = auth();
        if (!$user->is_bookmark($bookId)) {
            $user->bookmark_books()->attach($bookId);
        }
        return back();
    }

    public function destroy($bookId) {
        $user = auth();
        if ($user->is_bookmark($bookId)) {
            $user->bookmark_books()->detach($bookId);
        }
        return back();
    }
}
