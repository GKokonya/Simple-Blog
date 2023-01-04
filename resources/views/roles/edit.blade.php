@extends('layouts.dashboard')

@section('content')
<div class="my-1">
    {{ Breadcrumbs::render('edit role',$role) }}
</div>
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg">
        <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Edit Role</h1>

        <form class="bg-white mt-6 mb-0 space-y-4 bg-white rounded-lg p-8 shadow-2xl" method="POST" action="{{ route('roles.update', $role) }}">
            @csrf
            @method('PATCH')
            <div>
                <div>
                    <label for="name" class="text-sm font-medium">Role Name</label>
                </div>
            
                <div class="relative mt-1">
                    <input type="text"  class="input-text" placeholder="Enter Permission name" type="text" name="name" id="name" value="{{ old('name', $role->name) }}"  required />
                    @error('name')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            @if($permissions->count())
            <div class="space-y-2">
                <label class="block text-base font-medium text-gray-700" for="permissions">Permissions</label>
                <div class="">
                    @foreach($permissions as $id => $name)
                        <div class="space-x-1">
                            <input class="rounded-md border-gray-300 shadow-sm" type="checkbox" name="permissions[]" id="permission-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('permissions', [])) || $role->permissions->contains($id))>
                            <label class="text-sm font-medium text-gray-700"  for="permission-{{ $id }}">{{ $name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('permissions')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
        @endif
             <button class="btn-submit" type="submit">Save</button>

        </form>
    </div>
</div>
@endsection