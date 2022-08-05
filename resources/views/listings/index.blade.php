<x-layout page_title="View Jobs">
  <x-container>
    <x-searchbar class="mt-4" value="{{ $search }}" />

    <div class="flex flex-col gap-2 py-2">
      @foreach ($listings as $listing)
        <x-listing-item :listing=$listing /> {{-- :listing is shorthand for x-bind:listing from alpinejs --}}
      @endforeach
    </div>

    <div class="m-6 p-4">
      {{ $listings->links() }}
    </div>
  </x-container>
</x-layout>
