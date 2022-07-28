@props(['href' => '#'])

<a href="{{ $href }}"
  class="px-3 text-lg h-full flex flex-row items-center gap-1 hover:bg-blue-500 hover:text-white {{ $_SERVER['REQUEST_URI'] == $href ? 'bg-blue-300' : '' }}">
  {{ $slot }}
</a>
