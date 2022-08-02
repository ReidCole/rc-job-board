<x-layout>
  <x-container>
    <h1 class="text-2xl mt-6 text-center">Post a Job Listing</h1>
    <form action="/listings" method="POST" class="flex flex-col items-center gap-6 py-6">
      @csrf
      <x-form-input type="text" name="title" text="Title" />

      <div class="flex flex-col w-full sm:w-2/3">
        <label for="description">Description</label>
        <textarea name="description" rows="6" class="p-2 rounded-lg bg-gray-300"></textarea>
        <x-form-error-msg input_name="description" />
      </div>

      <x-form-input type="text" name="company" text="Company" />
      <x-form-input type="email" name="email" text="Email" />
      <x-form-input type="file" name="logo" text="Logo" />

      <div class="flex flex-col w-full sm:w-2/3 gap-1">
        <label for="location_type">Location Type</label>

        <div class="flex flex-row justify-between">
          <span class="flex flex-row items-center gap-1">
            <input type="radio" name="location_type" id="on-site" value="on-site">
            <label for="on-site">On-Site</label>
          </span>
          <span class="flex flex-row items-center gap-1">
            <input type="radio" name="location_type" id="remote" value="remote">
            <label for="remote">Remote</label>
          </span>
          <span class="flex flex-row items-center gap-1">
            <input type="radio" name="location_type" id="hybrid" value="hybrid">
            <label for="hybrid">Hybrid</label>
          </span>
        </div>
        <x-form-error-msg input_name="location_type" />
      </div>

      <x-form-input type="text" name="location" text="Location" />
      <x-form-input type="date" name="close_date" text="Close Date" />

      <input class="bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer" type="submit" value="Post listing">
    </form>
  </x-container>
</x-layout>
