<x-layout page_title="Home">
  <x-container>

    <h1 class="text-4xl font-bold pt-8 mb-1 text-center">RC Job Board</h1>
    <p class="text-center text-gray-700 mb-8">Find a developer job anywhere in the world</p>

    <x-searchbar />

    <div class="mt-14 mb-20 flex flex-row justify-evenly gap-4">
      <x-button-link href="/account" class="bg-green-500">Build your resume</x-button-link>
      <x-button-link href="/listings/create" class="bg-blue-500">Post a listing</x-button-link>
    </div>

  </x-container>
</x-layout>
