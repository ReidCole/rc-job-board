@props(['type' => 'text', 'name' => '', 'text' => '', 'value' => null])

<div class="flex flex-col w-full sm:w-2/3">
  <label for="{{ $name }}">
    {{ $text }}
  </label>
  <input value="{{ $value ?? old($name) }}" class="p-2 rounded-lg bg-gray-300" type="{{ $type }}"
    name="{{ $name }}">

  <x-form-error-msg input_name="{{ $name }}" />
</div>
