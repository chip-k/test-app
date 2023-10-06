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

    @livewire('comment', compact('book', 'bookComments'))

</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

@vite(['resources/css/app.css', 'resources/js/app.js'])

</x-app-layout>