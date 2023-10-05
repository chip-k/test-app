<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">ホーム</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6 mt-6">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                  <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-gray-500 uppercase">No.</th>
                        <th scope="col" class="px-6 py-3 text-left text-gray-500 uppercase">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-gray-500 uppercase">created_at</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($books as $book)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200">{{ $book->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200">{{ $book->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-800 dark:text-gray-200">{{ $book->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a class="text-blue-500 hover:text-blue-700" href="{{ route('book.show', $book)}}">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

    </div>

</x-app-layout>