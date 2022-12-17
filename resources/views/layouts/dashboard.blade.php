<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  x-data="data()">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
    @livewireStyles()
  </head>
  <body class="font-family-karia antialiased">

    <div class="flex h-screen  dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
      <!-- Desktop sidebar -->
      <aside class="z-20 hidden w-50 overflow-y-auto bg-white shadow md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a href="{{route('home')}}" class="flex mx-4 px-8">
            <i class="fas fa-blog text-indigo-600 text-3xl hover:text-indigo-700"></i>
          </a>

          <ul class="mt-6">
            <li class="px-3 py-1 relative">
              <span class="{{ request()->route()->getName()=='home' ? 'active': '' }}" aria-hidden="true"></span>
                <a href="{{route('home')}}"class="flex items-center rounded-lg  px-4 py-2">
                  <span class="ml-3 font-medium"><i class="fa-solid fa-house"></i> Dashboard </span>
              </a>
            </li>

            @can('view categories')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='categories.index' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{route('categories.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-list"></i> categories </span>
                </a>
              </li>
            @endcan

            @can('view posts')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='posts.index' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{route('posts.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-newspaper"></i> Posts </span>
                </a>
              </li>
            @endcan

            @can('view users')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='users.index' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{route('users.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-users"></i> Users </span>
                </a>
              </li>
            @endcan

            @can('view roles')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='roles.index' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{route('roles.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-user-lock"></i> Roles </span>
                    
                </a>
              </li>
            @endcan

            @can('view permissions')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='permissions.index' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{route('permissions.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-shield-halved"></i> Permissions </span>
                </a>
              </li>
            @endcan

            @can('change own password')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='users.editpassword' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{ route('users.editpassword', Auth::user()->id) }}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                      <span class="ml-3 font-medium"><i class="fa-solid fa-unlock"></i> Update Password </span>
                  </a>
              <li>
            @endcan
            
          
            <li class="px-3 py-1 relative">
              <span class="{{ request()->route()->getName()=='logout' ? 'active': '' }}" aria-hidden="true"></span>
              <form action="{{ route('logout') }}" method="POST" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                  @csrf
                  <button onclick="return confirm('Are you sure you want to logout?')">  
                    <span class="ml-3 font-medium"><i class="fa-solid fa-power-off"></i> Logout </span>
                  </button>
              </form>
            </li>

          </ul>
        </div>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
     
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
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
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
            Windmill
          </a>
          <ul class="mt-6">
          <li class="px-3 py-1 relative">
              <span class="{{ request()->route()->getName()=='home' ? 'active': '' }}" aria-hidden="true"></span>
                <a href="{{route('home')}}"class="flex items-center rounded-lg  px-4 py-2">
                  <span class="ml-3 font-medium"><i class="fa-solid fa-house"></i> Dashboard </span>
              </a>
            </li>

            
            @can('view categories')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='categories.index' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{route('categories.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-users"></i> categories </span>
                </a>
              </li>
            @endcan

            @can('view posts')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='posts.index' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{route('posts.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-users"></i> Posts </span>
                </a>
              </li>
            @endcan

            @can('view users')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='users.index' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{route('users.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-users"></i> Users </span>
                </a>
              </li>
            @endcan

            @can('view roles')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='roles.index' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{route('roles.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-user-lock"></i> Roles </span>
                    
                </a>
              </li>
            @endcan

            @can('view permissions')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='permissions.index' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{route('permissions.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-shield-halved"></i> Permissions </span>
                </a>
              </li>
            @endcan

            @can('change own password')
              <li class="px-3 py-1 relative">
                <span class="{{ request()->route()->getName()=='users.editpassword' ? 'active': '' }}" aria-hidden="true"></span>
                  <a href="{{ route('users.editpassword', Auth::user()->id) }}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                      <span class="ml-3 font-medium"><i class="fa-solid fa-unlock"></i> Update Password </span>
                  </a>
              <li>
            @endcan
            
          
            <li class="px-3 py-1 relative">
              <span class="{{ request()->route()->getName()=='logout' ? 'active': '' }}" aria-hidden="true"></span>
              <form action="{{ route('logout') }}" method="POST" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                  @csrf
                  <button onclick="return confirm('Are you sure you want to logout?')">  
                    <span class="ml-3 font-medium"><i class="fa-solid fa-power-off"></i> Logout </span>
                  </button>
              </form>
            </li>
          </ul>

        </div>
      </aside>
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
          >
            <!-- Mobile hamburger -->
            <button
              class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
              @click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
              <div
                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
              >
                <div class="absolute inset-y-0 flex items-center pl-2">
    
                </div>
            
                
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">

              <!-- Notifications menu -->
              <li class="relative">
                <button
                  class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleNotificationsMenu"
                  @keydown.escape="closeNotificationsMenu"
                  aria-label="Notifications"
                  aria-haspopup="true"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                    ></path>
                  </svg>
                  <!-- Notification badge -->
                  <span
                    aria-hidden="true"
                    class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"
                  ></span>
                </button>
                <template x-if="isNotificationsMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeNotificationsMenu"
                    @keydown.escape="closeNotificationsMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700"
                  >
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md  hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Messages</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          13
                        </span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md  hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Sales</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          2
                        </span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md  hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Alerts</span>
                      </a>
                    </li>
                  </ul>
                </template>
              </li>
              

              
            </ul>
          </div>
        </header>
        <main class="h-full bg-white overflow-y-auto m-4 mr-10 my-8">
        @yield('content')
        </main>
      </div>
    </div>

    @vite([        
        'resources/js/alpine.js',
        'resources/js/init-alpine.js',
        'resources/js/turbolinks.js',
        ])
      @livewireScripts()
      <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>

  </body>
</html>