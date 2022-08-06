@props(['listing'])

<a class="p-2 bg-gray-200 hover:bg-blue-500 hover:text-white cursor-pointer rounded-lg flex flex-row gap-2"
  href="/listings/{{ $listing->id }}">
  <img class="w-12 h-12" src="{{ $listing->logo ?? asset('storage/images/' . env('DEFAULT_LOGO')) }}" alt="">
  <div>
    <h2 class="font-bold">{{ $listing->title }}</h2>
    <p class="italic">{{ $listing->company }}</p>
  </div>
</a>
