@props(['href' => '#'])

<a href="{{ $href }}"
  class="p-2 text-lg flex flex-row items-center gap-1 {{ $_SERVER['REQUEST_URI'] == $href ? 'bg-blue-300' : '' }}">
  {{ $slot }}
</a>
