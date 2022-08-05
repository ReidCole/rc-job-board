<x-layout>
  <x-container>
    <h1 class="text-3xl font-bold text-center py-4">Account</h1>

    <h2>Applied-to Jobs</h2>
    <div class="flex flex-col gap-2 py-2">
      @foreach ($appliedListings as $listing)
        <x-listing-item :listing=$listing />
      @endforeach
    </div>

    <h2>Posted Listings</h2>
    <div class="flex flex-col gap-2 py-2">
      @foreach ($postedListings as $listing)
        <x-listing-item :listing=$listing />
      @endforeach
    </div>
  </x-container>
</x-layout>
