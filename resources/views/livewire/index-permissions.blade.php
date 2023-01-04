<div>
  <div class="my-1">
    {{ Breadcrumbs::render('permissions') }}
    </div>
  <div class="flex md:justify-between">    
    <div>
        <form wire:submit.prevent="search" class="md:flex md:justify-between block">
            <div>
            <input wire:model.defer="search_keyword" type="text" class="w-25 py-2 pr-12 rounded-lg border border-gray-200  text-sm shadow-sm" placeholder=" search permission ...">
            </div>

            <div class="pl-2">
            <button class="btn">search</button>
            </div>
        </form>
    </div>
    
    @can('create permission')
    <div class="md:mb-4 md:flex block md:mr-2">
        <a class="btn" href="{{ route('permissions.create') }}">Create</a>
    </div>
    @endcan
    </div>
    <!-- Inside existing Livewire component -->
    <div class="overflow-hidden overflow-x-auto rounded-lg border border-gray-200 my-5">
      <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-200">
          <tr>
            <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
              <div class="flex items-center gap-2">
                #ID
              </div>
            </th>
            <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
              <div class="flex items-center gap-2">
              Name
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
          @forelse($permissions as $permission)
            <tr wire:key="{{ $permission->id }}">
              <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $permission->id }}</td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $permission->name }}</td>
              <td class="flex whitespace-nowrap space-x-2 py-2 text-gray-700 ">                         
                @can('edit permission')
                  <a class="btn" href="{{ route('permissions.edit', $permission) }}">
                    Edit
                  </a>
                @endcan

                @can('delete permission')
                  <form action="{{ route('permissions.destroy', $permission) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button class="btn" type="submit" onclick="return confirm('Are you sure you want to delete this permission?')">
                          Delete
                      </button>
                  </form>
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
    </div>

    <div>
    <span>{{$permissions->links('vendor.pagination.tailwind')}}</span>
  </div>
</div>
