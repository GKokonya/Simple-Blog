@extends('layouts.dashboard')

@section('content')
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg">
        <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">
        Edit User
        </h1>

        <form class="mt-6 mb-0 space-y-4 white rounded-lg p-8 shadow-2xl"method="POST"  action="{{ route('users.update', $user) }}">
            @csrf
            @method('PATCH')

            <div class="text-base font-medium text-gray-700">Username: <span class="font-bold">{{ $user->username }}</span></div>

            @if($roles->count())
                <div class="space-y-2">
                    <label class="block text-base font-medium text-gray-700" for="permissions">Assign Role</label>
                    <div class="space-x-2">
                        @foreach($roles as $id => $name)
                            <div class="inline-flex space-x-1">
                                <input class="rounded-md border-gray-300 shadow-sm" type="checkbox" name="roles[]" id="role-{{ $id }}" value="{{ $id }}" @checked(in_array($id, old('roles', [])) || $user->roles->contains($id))>
                                <label class="text-sm font-medium text-gray-700" for="role-{{ $id }}">{{ $name }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('permissions')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            @endif

            <button class="btn-submit" type="submit">
                Save
            </button>
        </form>
    </div>
</div>
@endsection