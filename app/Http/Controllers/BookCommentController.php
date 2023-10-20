<?php

namespace App\Http\Controllers;

use App\Models\BookComment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class BookCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($book)
    {
        // return view('book_comment.create', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $book)
    {
        // $user_id = auth()->id();

        // $bookComment = new BookComment();
        // $bookComment->comment = $request->comment;
        // $bookComment->user_id = $user_id;
        // $bookComment->book_id = $book;
        // $bookComment->save();
        
        // return redirect()->route('book.show', $book)->with('message', 'コメントしました');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookComment $bookComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookComment $bookComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookComment $bookComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookComment $bookComment)
    {
        $bookComment->delete();
        return redirect()->route('book.show', $bookComment->book_id)->with('message', 'コメントを削除しました');
    }

}
