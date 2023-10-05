<x-app-layout>
    <div>
        <form method="post" action="{{ route('book.update', $book) }}">
            @csrf
            @method('patch')

            <label for="title">タイトル</label>
            <input type="text" name="title" value="{{old('title', $book->title)}}">
            <label for="body">本文</label>
            <textarea name="body" id="body" cols="30" rows="10">{{old('body', $book->body)}}</textarea>
            <x-primary-button>
                更新する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>