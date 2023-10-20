      {{-- コメント入力 --}}
        <div class="p-4 flex flex-col justify-between leading-normal">
            <span id="comment-wrap">
                <form wire:submit.prevent="postComment">
                @csrf
                    {{-- <div>
                        @if (session()->has('message'))
                            <div class="text-green-600 alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div> --}}
                    
                    <label class="text-sm text-gray-400 pl-5">コメント入力</label>
                    <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                    <div class="flex">
                        <textarea wire:model="comment" name="comment" id="comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        <x-primary-button>
                            コメントする
                        </x-primary-button>
                    </div>
                </form>
            </span>
        </div>
