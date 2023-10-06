<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BookComment;
use App\Models\User;
use App\Models\Book;

class Comment extends Component
{

    public $book;
    public $bookComments;
    public $comment;

    public function render()
    {        
        return view('livewire.comment');
    }

    // 例
    public function mount()
    {
        $this->bookComments = $this->getComments();
    }

    public function getComments()
    {
        return BookComment::orderBy('created_at', 'desc')->get();
    }

    public function postComment()
    {
        // 認証済みユーザーのIDを取得
        $user_id = auth()->id();

        // コメントの投稿処理を実行

        // コメントの内容をデータベースに保存
        $newComment = new BookComment([
            'comment' => $this->comment,
            'user_id' => $user_id,
            'book_id' => $this->book->id,
        ]);
        $newComment->save();

        // コメントリストを更新
        $this->bookComments->prepend($newComment);

        // コメントフォームをクリア
        $this->comment = '';
    }

}
