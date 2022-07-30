@props(['class' => '', 'value' => ''])

<form class="flex flex-row rounded-lg h-10 w-full placeholder:text-gray-500 {{ $class }}" action="/listings">
  <input class="bg-gray-300 px-2 rounded-l-lg w-full" type="text" placeholder="Search for jobs..." name="search"
    value="{{ $value }}" />
  <button class="bg-blue-500 rounded-r-lg px-3 text-white" type="submit">
    <x-icons.search />
  </button>
</form>
