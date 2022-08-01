<x-layout>
  <x-container>

    <h1 class="text-2xl mt-6 text-center">Log In</h1>
    <form class="flex flex-col items-center gap-6 py-6" action="/authenticate" method="POST">
      @csrf
      <x-form-input type="email" name="email" text="Email" />
      <x-form-input type="password" name="password" text="Password" />
      <input class="bg-green-500 text-white px-4 py-2 rounded-lg cursor-pointer" type="submit" value="Log In">

    </form>
    <a class="text-blue-600 underline text-center mb-6 block" href="/signup">Need an account? Sign up here</a>
  </x-container>
</x-layout>
