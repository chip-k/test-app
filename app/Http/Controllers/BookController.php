<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BookComment;
use App\Http\Requests\SearchBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchBookRequest $request)
    {
        $books = Book::query();
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $books->where('title', 'LIKE', "%{$keyword}%");
        }

        $books = $books->paginate(10);

        if ($books->isEmpty()) {
            $message = '該当する本が見つかりませんでした';
            $request->session()->flash('message', $message);
        } else {
            $request->session()->forget('message'); 
        }

        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        $validated['user_id'] = auth()->id();

        $book = Book::create($validated);

        return redirect()->route('book.index')->with('message', '保存しました');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
        $bookComments = $book->bookComments()->orderBy('created_at', 'desc')->get();
        return view('book.show', compact('book', 'bookComments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        $validated['user_id'] = auth()->id();

        $book->update($validated);

        return redirect()->route('book.show', $book)->with('message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('message', '削除しました');
    }

    public function bookmark_books()
    {
        $books = \Auth::user()->bookmark_books()->orderBy('created_at', 'desc')->paginate(10);
        // $data = [
        //     'books' => $books,
        // ];
        return view('book.bookmark', compact('books'));
    }

    public function timeAgo($timestamp)
    {
        $time = Carbon::parse($timestamp);
        return $time->diffForHumans();
    }

}
