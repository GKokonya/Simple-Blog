<div>
    <div class="my-1">
    {{ Breadcrumbs::render('categories') }}
    </div>

    <div class="block md:flex md:justify-between">    
        <div>
            <form wire:submit.prevent="search" class="md:flex md:justify-between block">
                <div>
                <input wire:model.defer="search_keyword" type="text" class="w-25 py-2 pr-12 rounded-lg border border-gray-200  text-sm shadow-sm" placeholder=" search category ...">
                </div>

                <div class="pl-2">
                <button class="btn">search</button>
                </div>
            </form>
        </div>

        <div class="my-2">
            @can('create category')
            <a href="{{route('categories.create')}}" class="btn">Create Category</a>
            @endcan
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
                            Title
                        </div>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">
                        Created
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
                @forelse($categories as $category)
                    <tr wire:key="{{$category->id}}" >
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $category->id }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $category->title }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $category->created_at }}</td>
                        <td class="flex space-x-2 whitespace-nowrap px-4 py-2 text-gray-700">
                            @can('edit category')
                                <a class="btn" href="{{ route('categories.edit', $category) }}">
                                    Edit
                                </a>
                            @endcan

                            @can('delete category')
                                <a class="btn" wire:click="destroy({{ $category->id }})">
                                    Delete
                                </a>
                            @endcan
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6" class="whitespace-nowrap px-4 py-2 text-gray-700">
                        <h1 class="flex justify-center font-medium py-2 text-gray-400 text-xl">No records found ...</h1>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @if($categories->links())
            <div class="mt-4">
                {{ $categories->links('vendor.pagination.tailwind') }}
            </div>
        @endif
    </div>
</div>
