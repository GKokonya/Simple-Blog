<div>
    <div class="my-1">
    {{ Breadcrumbs::render('roles') }}
    </div>
    <div class="block md:flex md:justify-between">    
        <div>
            <form wire:submit.prevent="search" class="md:flex md:justify-between block">
                <div>
                <input wire:model.defer="search_keyword" type="text" class="w-25 py-2 pr-12 rounded-lg border border-gray-200  text-sm shadow-sm" placeholder=" search role ...">
                </div>

                <div class="pl-2">
                <button class="btn">search</button>
                </div>
                </form>
            </div>
        
        @can('create role')
        <div class="md:mb-4 md:flex block md:mr-2">
            <a class="btn" href="{{ route('roles.create') }}">Create</a>
        </div>
        @endcan
    </div>

    <div class="overflow-hidden overflow-x-auto rounded-lg border border-gray-200 my-5">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">#ID</div>
                    </th>
                    
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">Name</div>
                    </th>
                
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">Permissions</div>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">Actions</div>
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($roles as $role)
                
                    <tr wire:key="{{$role->id}}">
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $role->id }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $role->name }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                            @foreach($role->permissions as $permission)
                                <span class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td class="whitespace-nowrap space-x-2 py-2 text-gray-700">
                            @can('edit role')
                            <a class="btn" href="{{ route('roles.edit', $role) }}">
                                Edit
                            </a>
                            @endcan

                            @can('delete role')
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn" type="submit" onclick="return confirm('Are you sure you want to delete this role?')">
                                    Delete
                                </button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-4" colspan="4">No records</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>