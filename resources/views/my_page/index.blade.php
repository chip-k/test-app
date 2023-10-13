<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">マイページ</h2>
  </x-slot>

  <div class="max-w-7xl mx-auto px-6 mt-6">
    <x-message :message="session('message')" />

    
  </div>

</x-app-layout>