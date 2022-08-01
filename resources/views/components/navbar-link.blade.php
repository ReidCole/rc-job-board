@props(['href' => '#', 'post' => false])

@if ($post)
  <form action="{{ $href }}" method="POST">
    @csrf
    <button type="submit"
      class="px-3 text-lg h-full flex flex-row items-center gap-1 hover:bg-blue-500 hover:text-white">
      {{ $slot }}
    </button>
  </form>
@else
  <a href="{{ $href }}"
    class="px-3 text-lg h-full flex flex-row items-center gap-1 hover:bg-blue-500 hover:text-white">
    {{ $slot }}
  </a>
@endif
