{{-- コメント表示 --}}
<div id="comment-container" class="p-4">
  @if (count($bookComments) > 0)
      @foreach ($bookComments as $bookComment)
          <div class="bg-gray-200 space-y-3 flex justify-between items-center">
              <div class="flex items-center">
                  <p class="font-bold">{{ $bookComment->user->name }}</p>
                  <p class="ml-2">・{{ $bookComment->created_at->diffForHumans() }}</p>
              </div>

              @include('book_comment.destroy')

          </div>
          <p>{{ $bookComment->comment }}</p>
      @endforeach
  @else
      <p>コメントはありません。</p>
  @endif
</div>