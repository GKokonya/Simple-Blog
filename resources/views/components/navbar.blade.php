<div>
    <nav class="bg-white shadow-lg">
        <div 
            x-data="{open: false}"
            class="max-w-3xl mx-auto py-3 px-6 md:px-0 md:flex md:items-center justify-between">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <a href="{{route('index')}}">
                    <i class="fas fa-blog text-indigo-600 text-3xl hover:text-indigo-700"></i>
                    </a>
                </div>

                <div class="flex md:hidden">
                    <button 
                    type="button" 
                    class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" 
                    arial-label="toggle menu"
                    x-on:click="open = ! open">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                            <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                        </svg>
                    </button>
                </div>
            </div>


            <!-- Menu , if mobile st to hidden -->
            <!-- Right Side Of Navbar -->
            <div :class="open? 'show': 'hidden'"
            x-transition:enter.duration.500ms
            x-transition:leave.duration.100ms 
            class="md:flex items-center md:justify-between m-4 md:block">
                <div class="flex flex-col md:flex-row md:ml-6">
                    <!--
                    <a href="#" class="my-1 text-sm text-gray-700 font-medium gover:text-indigo-500 md:mx-4 md:my-0">Home</a>
                    <a href="#" class="my-1 text-sm text-gray-700 font-medium gover:text-indigo-500 md:mx-4 md:my-0">About</a>
                    <a href="#" class="my-1 text-sm text-gray-700 font-medium gover:text-indigo-500 md:mx-4 md:my-0">Contact</a>
                    -->  
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <a class="my-1 text-sm text-gray-500 font-medium hover:text-indigo-500 md:mx-4 md:my-0" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif
                        @if (Route::has('register'))
                            <a class="my-1 text-sm text-gray-500 font-medium hover:text-indigo-500 md:mx-4 md:my-0" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                        
                    @else
                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>


                        </div>
                    @endguest
                </div>
            </div>

        </div>
    </nav>
</div>
