  {{-- sidebar background --}}
  <div class="fixed h-screen w-screen bg-black opacity-70 z-10" x-show="is_sidebar_open"></div>

  <div class="h-screen w-52 bg-white fixed top-0 left-0 z-10" x-show="is_sidebar_open">

    {{-- top section --}}
    <div class="h-14 bg-gray-200 border-b border-gray-300 flex flex-row justify-end">

      {{-- close sidebar button --}}
      <button class="p-2 h-full flex items-center" x-on:click="is_sidebar_open = ! is_sidebar_open">
        <x-icons.arrow-left class="w-8 h-8" />
      </button>

    </div>

    {{-- main section --}}
    <div class="flex flex-col">

      <x-sidebar-link href="/">
        <x-icons.home /> Home
      </x-sidebar-link>

      <x-sidebar-link href="/jobs">
        <x-icons.briefcase /> Jobs
      </x-sidebar-link>

      <x-sidebar-link href="/login">
        <x-icons.login /> Log In
      </x-sidebar-link>

      <x-sidebar-link href="/account">
        <x-icons.user-circle /> Account
      </x-sidebar-link>

      <x-sidebar-link href="/logout">
        <x-icons.logout /> Log Out
      </x-sidebar-link>

    </div>

  </div>
