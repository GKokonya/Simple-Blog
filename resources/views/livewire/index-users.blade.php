<div>
    <div class="my-1">
    {{ Breadcrumbs::render('users') }}
    </div>
    <div class="block md:flex md:justify-between">    
        <div>
            <form wire:submit.prevent="search" class="md:flex md:justify-between block">
                <div>
                <input wire:model.defer="search_keyword" type="text" class="w-25 py-2 pr-12 rounded-lg border border-gray-200  text-sm shadow-sm" placeholder=" search username ...">
                </div>

                <div class="pl-2">
                <button class="btn">search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="overflow-hidden overflow-x-auto rounded-lg border border-gray-200 my-5">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-200">
                <tr class="bg-gray-200">
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">
                            #ID
                        </div>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">
                            Email
                        </div>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">
                        Roles
                        </div>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">
                        Actions
                        </div>
                    </th>

                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 bg-white" wire:loading.class.delay="opacity-25">
                @forelse($users as $user)
                    <tr wire:key="{{$user->id}}" >
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $user->id }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $user->email }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                            @foreach($user->roles as $role)
                                <span class="rounded-xl bg-blue-300 px-2 py-1 text-xs text-blue-700">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td class="flex space-x-2 whitespace-nowrap px-4 py-2 text-gray-700">
                            @can('edit user')
                                <a class="btn" href="{{ route('users.edit', $user) }}">
                                    Edit
                                </a>
                            @endcan

                            @can('change other user password')
                                <a class="btn" href="{{ route('users.editpassword', $user->id) }}">
                                    Change Password
                                </a>
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

        @if($users->links())
            <div class="mt-4">
                {{ $users->links('vendor.pagination.tailwind') }}
            </div>
        @endif
    </div>
</div>
