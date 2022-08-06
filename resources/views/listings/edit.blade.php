<x-layout>
  <x-container>
    <h1 class="text-2xl mt-6 text-center">Edit Job Listing</h1>
    <form action="/listings/{{ $listing->id }}" method="POST" class="flex flex-col items-center gap-6 py-6"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <x-form-input type="text" name="title" text="Title" value="{{ $listing->title }}" />

      <div class="flex flex-col w-full sm:w-2/3">
        <label for="description">Description</label>
        <textarea name="description" rows="6" class="p-2 rounded-lg bg-gray-300">{{ $listing->description }}</textarea>
        <x-form-error-msg input_name="description" />
      </div>

      <x-form-input type="text" name="company" text="Company" value="{{ $listing->company }}" />
      <x-form-input type="email" name="email" text="Email" value="{{ $listing->email }}" />
      <x-form-input type="file" name="logo" text="Logo" />
      @if ($listing->logo)
        <img src="{{ asset('storage/' . $listing->logo) }}" alt="previous logo for this listing">
      @endif

      <div class="flex flex-col w-full sm:w-2/3 gap-1">
        <label for="location_type">Location Type</label>

        <div class="flex flex-row justify-between">
          <span class="flex flex-row items-center gap-1">
            <input type="radio" name="location_type" id="on-site" value="on-site"
              {{ $listing->location_type == 'on-site' ? 'checked' : null }}>
            <label for="on-site">On-Site</label>
          </span>
          <span class="flex flex-row items-center gap-1">
            <input type="radio" name="location_type" id="remote" value="remote"
              {{ $listing->location_type == 'remote' ? 'checked' : null }}>
            <label for="remote">Remote</label>
          </span>
          <span class="flex flex-row items-center gap-1">
            <input type="radio" name="location_type" id="hybrid" value="hybrid"
              {{ $listing->location_type == 'hybrid' ? 'checked' : null }} />
            <label for="hybrid">Hybrid</label>
          </span>
        </div>
        <x-form-error-msg input_name="location_type" />
      </div>

      <x-form-input type="text" name="location" text="Location" value="{{ $listing->location }}" />
      <x-form-input type="date" name="close_date" text="Close Date" value="{{ $listing->close_date }}" />

      <input class="bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer" type="submit" value="Save changes">
    </form>
  </x-container>
</x-layout>
