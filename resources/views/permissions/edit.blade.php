@extends('layouts.dashboard')

@section('content')
<div class="my-1">
    {{ Breadcrumbs::render('edit permission',$permission) }}
</div>
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg">
        <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Edit Permission</h1>

        <form class="bg-white mt-6 mb-0 space-y-4 bg-white rounded-lg p-8 shadow-2xl" method="POST" action="{{ route('permissions.update', $permission) }}">
            @csrf
            @method('PATCH')
            <div>
                <div>
                    <label for="name" class="text-sm font-medium">Permission Name</label>
                </div>
            
                <div class="relative mt-1">
                    <input type="text"  id="name" name="name" class="input-text" placeholder="Enter Permission name" value="{{ old('name', $permission->name) }}" required />
                    @error('name')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            @if($roles->count())
                <div class="space-y-2">
                    <div>
                        <label for="roles" class="text-sm font-medium">Assign Role</label>
                    </div>
                    <div class="space-x-2">
                        @foreach($roles as $id => $name)
                            <div class="inline-flex space-x-1">
                                <input class="rounded-md border-gray-300 shadow-sm" type="checkbox" name="roles[]" id="role-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('role', [])) || $permission->roles->contains($id))/>
                                <label class="text-sm font-medium text-gray-700" for="role-{{ $id }}">{{ $name }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('roles')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
             @endif

             <button class="btn-submit" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection