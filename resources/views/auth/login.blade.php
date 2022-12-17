@extends('layouts.app')

@section('content')
<div>
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 ">
    <div class="mx-auto max-w-lg">
      <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">
        Crypto
      </h1>

      <form class="mt-6 mb-0 space-y-4 bg-white rounded-lg p-8 shadow-2xl" method="POST" action="{{ route('login') }}">
      @csrf

      <div>
        @if (session()->has('login_error'))
        <x-danger-alert>
        {{ session('login_error') }}
        </x-danger-alert>
        @endif
    </div>

        <div>
          <div>
              <label for="username" class="text-sm font-medium">Email</label>
          </div>
      
          <div class="relative mt-1">
          <input type="email"   id="email" name="email" class="input-text" value="admin@gmail.com" placeholder="Enter email"/>  
           </div>
          @error('email')
          <span class="text-red-500" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div>
          <div>
              <label for="password" class="text-sm font-medium">Password</label>
          </div>
          <div class="relative mt-1">
            <input type="password"   id="password" name="password" class="input-text" value="12345678" placeholder="Enter password"/>      
          </div>
          @error('password')
          <span class="text-red-500" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <button type="submit" class="btn-submit">Log in </button>

        <p class="text-center text-sm text-gray-500">
          No account?
          <a class="underline" href="{{route('register')}}">Sign up</a>
        </p>
      </form>
    </div>
  </div>
</div>

@endsection
