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