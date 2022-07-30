@props(['href' => '#'])

<a href="{{ $href }}" class="p-2 text-lg flex flex-row items-center gap-1">
  {{ $slot }}
</a>
