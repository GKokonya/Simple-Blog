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
                <span class="{{ in_array(request()->route()->getName(),$categories) ? 'active' : '' }}" aria-hidden="true"></span>
                <a href="{{route('categories.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                <span class="ml-3 font-medium"><i class="fa-solid fa-list"></i> categories </span>
            </a>
            </li>
        @endcan

        @can('view posts')
            <li class="px-3 py-1 relative">
                <span class="{{ in_array(request()->route()->getName(),$posts) ? 'active' : '' }}" aria-hidden="true"></span>
                <a href="{{route('posts.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                <span class="ml-3 font-medium"><i class="fa-solid fa-newspaper"></i> Posts </span>
            </a>
            </li>
        @endcan

        @can('view users')
            <li class="px-3 py-1 relative">
                <span class="{{ in_array(request()->route()->getName(),$users) ? 'active' : '' }}" aria-hidden="true"></span>
                <a href="{{route('users.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-users"></i> Users </span>
                </a>
            </li>
        @endcan

        @can('view roles')
            <li class="px-3 py-1 relative">
                <span class="{{ in_array(request()->route()->getName(),$roles) ? 'active' : '' }}" aria-hidden="true"></span>
                <a href="{{route('roles.index')}}" class="flex items-center rounded-lg px-4 py-2 text-gray-500  hover:text-gray-700">
                    <span class="ml-3 font-medium"><i class="fa-solid fa-user-lock"></i> Roles </span>
                </a>
            </li>
        @endcan

        @can('view permissions')
            <li class="px-3 py-1 relative">
                <span class="{{ in_array(request()->route()->getName(),$permissions) ? 'active' : '' }}" aria-hidden="true"></span>
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