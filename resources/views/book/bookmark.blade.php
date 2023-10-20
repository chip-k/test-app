<x-app-layout>

  <x-slot name="header">
    <div>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ブックマーク</h2>
    </div>
  </x-slot>

  <div class="max-w-7xl mx-auto px-6 mt-6">
    <x-message :message="session('message')" />

    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            @if (count($books) <= 0)
              <p>まだブックマークしていません。</p>
            @else
              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-gray-500 uppercase">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-gray-500 uppercase">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-gray-500 uppercase">created_at</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($books as $book)
                        <tr class="hover:bg-gray-200 dark:hover:bg-blue-200">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-500">{{ $book->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-500">{{ $book->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-500">{{ $book->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a class="text-blue-500 hover:text-blue-700" href="{{ route('book.show', $book)}}">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
  </div>
  {{ $books->links() }}
  
  </div>

</x-app-layout>