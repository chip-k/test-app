<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\BookComment;
use App\Models\User;
use App\Models\Book;

class Comment extends Component
{
    use WithPagination;

    public $book;
    public $bookComments;
    public $comment;
    public $user_id;
    public $bookComment;

    protected $rules = [
        'comment' => 'required|max:100',
        'user_id' => 'required',
        'book' => 'required',
    ];

    public function render()
    {
        $this->book->bookComments()->get();
        return view('livewire.comment');
    }

    // public function mount()
    // {
    //     $this->bookComments = $this->getComments();
    // }

    // public function getComments()
    // {
    //     return BookComment::orderBy('created_at', 'desc')->get();
    // }

    public function postComment()
    {
        // コメントするユーザーのIDを取得
        $this->user_id = auth()->id();

        // コメントの投稿処理を実行
        $newComment = new BookComment([
            'comment' => $this->comment,
            'user_id' => $this->user_id,
            'book_id' => $this->book->id,
        ]);
        $this->validate();
        $newComment->save();

        // コメントリストを更新
        $this->bookComments->prepend($newComment);

        // コメントフォームをクリア
        $this->comment = '';

        // フラッシュメッセージ
        session()->flash('message', 'コメントが投稿されました');
    }

    public function deleteComment($id)
    {
        BookComment::destroy($id);
    }

}
