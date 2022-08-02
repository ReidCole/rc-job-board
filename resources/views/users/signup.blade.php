<x-layout>
  <x-container>

    <h1 class="text-2xl mt-6 text-center">Sign Up</h1>
    <form class="flex flex-col items-center gap-6 py-6" action="/users" method="POST">
      @csrf
      <x-form-input type="text" name="name" text="Name" />
      <x-form-input type="email" name="email" text="Email" />
      <x-form-input type="password" name="password" text="Password" />
      <x-form-input type="password" name="password_confirmation" text="Confirm Password" />
      <input class="bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer" type="submit" value="Sign up">

    </form>
    <a class="text-blue-600 underline text-center mb-6 block" href="/login">Already have an account? Log in here</a>
  </x-container>
</x-layout>
