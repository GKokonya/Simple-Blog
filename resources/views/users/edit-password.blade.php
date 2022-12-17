@extends('layouts.dashboard')

@section('content')
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg">
      <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">
        Update Password
      </h1>

      <form class="bg-white mt-6 mb-0 space-y-4 bg-white rounded-lg p-8 shadow-2xl" method="POST" action="{{ route('users.updatepassword', $user->id) }}">
        @method('PUT')
        @csrf

        @if (session()->has('success-message'))
        <x-success-alert>
         {{ session('success-message') }}
        </x-success-alert>
        @endif

        @if (session()->has('error-message'))
        <x-error-alert>
         {{ session('error-message') }}
        </x-error-alert>
        @endif

        <div>
            <div>
            <label for="password" class="text-sm font-medium">Enter Old Password</label>
            </div>
            
            <div class="relative mt-1">
            <input type="password"  id="old_password" name="old_password" class="input-text" placeholder="Enter password" />
            @error('old_password')
            <span class="text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
        </div>

        <div>
            <div>
            <label for="new_password" class="text-sm font-medium">Enter New Password</label>
            </div>
            
            <div class="relative mt-1">
            <input type="password"   id="new_password" name="new_password" class="input-text" placeholder="Enter password" />
            @error('new_password')
            <span class="text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
        </div>

        <div>
            <div>
                <label for="new_password_confirm" class="text-sm font-medium">Confirm Password</label>
            </div>

            <div class="relative mt-1">
                <input type="password" id="new_password_confirm" name="new_password_confirmation" class="input-text" placeholder="Enter password" />
                @error('new_password_confirmation')
                <span class="text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>

        <button type="submit" class="btn-submit">Submit</button>


      </form>
    </div>
  </div>
@endsection