@props(['input_name'])

@error($input_name)
  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
