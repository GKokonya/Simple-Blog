@extends('layouts.dashboard')

@section('content')

<x-permissions>
    @can('create permission')
    <div class="mb-4 flex">
        <a class="rounded bg-indigo-600 px-4 py-2 text-xs font-semibold text-white" href="{{ route('permissions.create') }}">Create</a>
    </div>

    @endcan

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
            <div wire:key="{{ $permission->id }}" >
              <tr>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $permission->id }}</td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $permission->name }}</td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">                         
                  @can('edit permission')
                    <a class="rounded bg-indigo-600 px-4 py-2 text-xs font-semibold text-white" href="{{ route('permissions.edit', $permission) }}">
                      Edit
                    </a>
                  @endcan

                  @can('delete permission')
                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="rounded bg-indigo-600 px-4 py-2 text-xs font-semibold text-white" type="submit" onclick="return confirm('Are you sure you want to delete this permission?')">
                            Delete
                        </button>
                    </form>
                  @endcan
                </td>
              </tr>

            </div>
            
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

</x-permissions>
@endsection