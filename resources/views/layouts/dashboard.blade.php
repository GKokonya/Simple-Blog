<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  x-data="data()">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="icon" href="images/bitcoin.ico" type="image/icon type">

    <title>Admin Dashboard</title>
    
    @vite('resources/css/app.css')
    @livewireStyles()
  </head>
  <body class="font-family-karia antialiased">
    <div class="flex h-screen bg-white" :class="{ 'overflow-hidden': isSideMenuOpen }">
      <!-- Desktop sidebar -->
      <aside class="z-20 hidden w-50 overflow-y-auto bg-white shadow md:block flex-shrink-0">
          <livewire:dashboard-links/>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
      >
        <livewire:dashboard-links/>
      </aside>
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md">
          <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
            <!-- Mobile hamburger -->
            <i class="fa-solid fa-bars p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu"></i>

            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
              <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                <div class="absolute inset-y-0 flex items-center pl-2"></div>
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Notifications menu -->
              <li class="font-medium relative flex space-x-1 text-gray-500">
                <i class="fa-solid fa-user my-1"></i>
                <p>{{Auth::user()->username}}</p>
              </li>
            </ul>
          </div>
        </header>
        <main class="h-full overflow-y-auto m-4 mr-10 my-8">
        @yield('content')
        </main>
      </div>
    </div>

    @vite(['resources/js/app.js'])
      @livewireScripts()
      <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>

      <script type="text/javascript">
        /**Dashboard UI */
        function data() {
            return {

              isSideMenuOpen: false,
              toggleSideMenu() {
                this.isSideMenuOpen = !this.isSideMenuOpen
              },
              closeSideMenu() {
                this.isSideMenuOpen = false
              },
            }
        }

      </script>
  </body>
</html>
