<section>
  <!-- 垂直省略記号 -->
  <p class="justify-end"><a href="#menu_{{ $bookComment->id }}" class="modal-open">⁝</a></p>
  
  <!-- メニュー -->
  <section id="menu_{{ $bookComment->id }}" style="display: none;">
    {{ $bookComment->user->name }}・{{ $bookComment->created_at->diffForHumans() }}
    <br>
    <div class="flex justify-between">
      {{ $bookComment->comment }}

      {{-- <form wire:submit.click="deleteComment"> --}}
      <form action="{{ route('book_comment.destroy', $bookComment) }}" method="post">
      @csrf
      @method('delete')
        {{-- <input type="hidden" wire:model="bookComment" value="{{ $bookComment }}" /> --}}
        <x-primary-button>
          <p>削除する</p>
        </x-primary-button>
      </form>

    </div> 
  </section>
