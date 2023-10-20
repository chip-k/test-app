<x-app-layout>

<div class="container mx-10 mt-3">

    <x-message :message="session('message')" />

        <div class="bg-gray-300 p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <h2 class="text-gray-900 font-bold text-xl leading-none">{{ $book->user->name }}</h2>
                <br>
                <h3 class="text-gray-900 mb-2">{{ $book->title }}</h3>
                <p class="text-gray-700 text-base">{{ $book->body }}</p>
            </div>
            <div class="flex items-center">
                <div class="text-sm">
                    <p class="text-gray-600">{{ $book->created_at->format('Y-m-d') }}</p>
                </div>
            </div>
            <div class="flex">
                <x-primary-button>
                    <a href="{{ route('book.edit', $book) }}">編集</a>
                </x-primary-button>
                <form method="post" action="{{ route('book.destroy', $book) }}">
                    @csrf
                    @method('delete')
        
                    <x-primary-button>
                        削除する
                    </x-primary-button>
                </form>

                @if (!Auth::user()->is_bookmark($book->id))
                    <form action="{{ route('bookmark.store', $book) }}" method="post">
                        @csrf
                        <button class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">ブックマーク登録</button>
                    </form>
                @else
                    <form action="{{ route('bookmark.destroy', $book) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">ブックマーク解除</button>
                    </form>
                @endif
            </div>

        </div>

    @livewire('comment', compact('book', 'bookComments'))

</div>

</x-app-layout>