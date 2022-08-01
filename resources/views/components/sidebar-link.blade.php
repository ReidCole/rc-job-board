@props(['href' => '#', 'post' => false])

@if ($post)
  <form action="{{ $href }}" method="POST">
    @csrf
    <button type="submit" class="p-2 text-lg flex flex-row items-center gap-1">
      {{ $slot }}
    </button>
  </form>
@else
  <a href="{{ $href }}" class="p-2 text-lg flex flex-row items-center gap-1">
    {{ $slot }}
  </a>
@endif
