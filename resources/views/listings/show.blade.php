<x-layout>
  <x-container>

    <div class="flex flex-row items-center justify-between gap-3 my-6">
      <div>
        <h1 class="text-3xl">{{ $listing->title }}</h1>
        <p class="italic">{{ $listing->company }}</p>
      </div>
      <img class="w-16 h-16"
        src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('storage/logos/' . env('DEFAULT_LOGO')) }}"
        alt="">
    </div>


    <h2 class="font-bold">Job Description</h2>
    <p class="mb-6">{{ $listing->description }}</p>

    <h2 class="font-bold">Location</h2>
    <p class="mb-6">
      @php
        switch ($listing->location_type) {
            case 'on-site':
                echo 'On-Site';
                break;
            case 'remote':
                echo 'Remote';
                break;
            case 'hybrid':
                echo 'Hybrid';
                break;
        }
      @endphp
      {{ $listing->location ? ' - ' . $listing->location : null }}
    </p>

    <div class="flex flex-row gap-2 mb-6">
      <form action="/listings/{{ $listing->id }}/apply" method="POST">
        @csrf
        <button class="text-white px-4 py-2 rounded-lg cursor-pointer block bg-blue-500" type="submit">Apply</button>
      </form>

      <x-button-link href="mailto:{{ $listing->email }}" class="bg-green-500">Email employer</x-button-link>

      @if (auth()->user()->id == $listing->owner_user_id)
        <x-button-link href="/listings/{{ $listing->id }}/edit" class="bg-yellow-500">Edit listing</x-button-link>
      @endif
    </div>

    <div class="mb-6 flex flex-row gap-4 justify-between italic">

      @php
        $created_at = date_create($listing->created_at);
        $created_at_formatted = date_format($created_at, 'F j, Y');
        echo '<p>Posted ' . $created_at_formatted . '</p>';
        
        $close_date = date_create($listing->close_date);
        $close_date_formatted = date_format($close_date, 'F j, Y');
        if (isset($listing->close_date)) {
            echo '<p>Closes ' . $close_date_formatted . '</p>';
        }
      @endphp
    </div>

  </x-container>
</x-layout>
