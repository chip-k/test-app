<x-app-layout>

<div class="container mx-10 mt-3">

    @if(session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif

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
            </div>
        </div>

        {{-- コメント入力 --}}
        <div class="p-4 flex flex-col justify-between leading-normal">
            <span id="comment-wrap">
                    <form action="{{ route('book_comment.store', $book) }}" method="post">
                    @csrf
                    
                    <label class="text-sm text-gray-400 pl-5">コメント入力</label>
                    <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                    <div class="flex">
                        <textarea name="comment" id="comment-text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('comment') }}</textarea>
                        <x-primary-button>
                            コメントする
                        </x-primary-button>
                    </div>
                </form>
            </span>
        </div>

    {{-- コメント表示 --}}
    <div id="comment-container" class="p-4">
        @if (count($bookComments) > 0)
            @foreach ($bookComments as $bookComment)
                <div class="bg-gray-200 space-y-3 flex justify-between items-center">
                    <div class="flex items-center">
                        <p class="font-bold">{{ $bookComment->user->name }}</p>
                        <p class="ml-2">・{{ $bookComment->created_at->diffForHumans() }}</p>
                    </div>
                    <section>
                        <!-- 垂直省略記号 -->
                        <p class="justify-end"><a href="#menu" class="modal-open">⁝</a></p>
                        
                        <!-- メニュー -->
                        <section id="menu" style="display: none;">
                            <form action="{{ route('book_comment.destroy', $bookComment) }}" method="post">
                            @csrf
                            @method('delete')

                                {{ $bookComment->user->name }}・{{ $bookComment->created_at->diffForHumans() }}
                                <br>
                                <div class="flex justify-between">
                                    {{ $bookComment->comment }}
                                    <x-primary-button>
                                        <p>削除する</p>
                                    </x-primary-button>
                                </div>
                            </form>
                        </section>
                    </section>
                </div>
                <p>{{ $bookComment->comment }}</p>
            @endforeach
        @else
            <p>コメントはありません。</p>
        @endif
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

@vite(['resources/css/app.css', 'resources/js/app.js'])

</x-app-layout>