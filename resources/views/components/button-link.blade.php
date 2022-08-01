@props(['class' => '', 'href' => '#'])

<a href="{{ $href }}"
  class="text-white px-4 py-2 rounded-lg cursor-pointer block {{ $class }}">{{ $slot }}</a>
