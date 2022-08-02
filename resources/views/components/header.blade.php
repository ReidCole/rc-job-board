<span x-data="{ is_sidebar_open: false }">

  {{-- mobile sidebar --}}
  <x-sidebar />

  {{-- header --}}
  <header class="flex flex-row justify-between items-center h-14 bg-gray-200">

    {{-- mobile open sidebar button --}}
    <button class="sm:hidden p-2 h-full flex items-center" x-on:click="is_sidebar_open = ! is_sidebar_open">
      <x-icons.menu class="w-8 h-8" />
    </button>

    @auth
      {{-- mobile account link --}}
      <a href="/account" class="sm:hidden p-2 h-full flex flex-row gap-1 text-lg items-center">
        <x-icons.user-circle class="w-8 h-8" /> {{ auth()->user()->name }}
      </a>
    @endauth



    {{-- desktop navbar --}}
    <nav class="hidden sm:flex flex-row justify-between w-full h-full">

      {{-- left side --}}
      <span class="flex flex-row">

        <x-navbar-link href="/">
          <x-icons.home /> Home
        </x-navbar-link>

        <x-navbar-link href="/listings">
          <x-icons.briefcase /> Jobs
        </x-navbar-link>

      </span>


      {{-- right side --}}
      <span class="flex flex-row">

        @auth
          <x-navbar-link href="/account">
            <x-icons.user-circle /> {{ auth()->user()->name }}
          </x-navbar-link>

          <x-navbar-link href="/logout" post>
            <x-icons.logout /> Log Out
          </x-navbar-link>
        @else
          <x-navbar-link href="/login">
            <x-icons.login /> Log In
          </x-navbar-link>
        @endauth

      </span>

    </nav>

  </header>

</span>
