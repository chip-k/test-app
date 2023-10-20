<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class BookmarkController extends Controller
{
    public function store($bookId) {
        $user = \Auth::user();
        if (!$user->is_bookmark($bookId)) {
            $user->bookmark_books()->attach($bookId);
        }
        return back()->with('message', 'ブックマークしました');
    }

    public function destroy($bookId) {
        $user = \Auth::user();
        if ($user->is_bookmark($bookId)) {
            $user->bookmark_books()->detach($bookId);
        }
        return back()->with('message', 'ブックマークを解除しました');
    }
}
