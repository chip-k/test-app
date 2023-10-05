<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">コメント</h2>
  </x-slot>

  <div class="max-w-7xl mx-auto px-6">
      @if(session('message'))
          <div class="text-red-600 font-bold">
              {{ session('message') }}
          </div>
      @endif

      <form method="post" action="{{ route('book_comment.store', $book) }}">
          @csrf
          
          <div class="w-full flex flex-col">
              <label for="comment" class="font-semibold mt-4">コメント</label>
              <x-input-error :messages="$errors->get('comment')" class="mt-2" />
              <textarea name="comment" class="w-auto py-2 border border-gray-300 rounded-md" id="comment" cols="30" rows="5">{{ old('comment') }}</textarea>
              <input type="hidden" name="book_id" value="{{ $book }}">
          </div>

          <x-primary-button class="mt-4">
              コメントする
          </x-primary-button>
      </form>
  </div>

</x-app-layout>