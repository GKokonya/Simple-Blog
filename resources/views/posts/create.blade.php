@extends('layouts.app')

@section('content')
<div>
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 ">
    <div class="mx-auto max-w-lg">
      <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">
        Create Post
      </h1>

      <form class="mt-6 mb-0 space-y-4 bg-white rounded-lg p-8 shadow-2xl" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
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
              <label for="title" class="text-sm font-medium">Title</label>
          </div>
      
          <div class="relative mt-1">
          <input type="text" id="title" name="title" class="input-text" value="admin@gmail.com" placeholder="Enter title"/>  
           </div>
          @error('title')
          <span class="text-red-500" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div>
          <div>
              <label for="title" class="text-sm font-medium">Category</label>
          </div>
      
          <div class="relative mt-1">
            <select name="category" id="category"  class="input-text">
              @foreach ( $categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
           </div>
          @error('category')
          <span class="text-red-500" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div>
          <div>
              <label for="image" class="text-sm font-medium">Image</label>
          </div>
      
          <div class="relative mt-1">
          <input type="file" id="image" name="image" class="input-text" value="admin@gmail.com" placeholder="Select image"/>  
           </div>
          @error('image')
          <span class="text-red-500" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div>
          <div>
              <label for="content" class="text-sm font-medium">Content</label>
          </div>
      
          <div class="relative mt-1">
          <textarea name="content" id="content" class="input-text" cols="30" rows="10">Enter Content</textarea>
           </div>
          @error('content')
          <span class="text-red-500" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>


        <button type="submit" class="btn-submit">Submit</button>


      </form>
    </div>
  </div>
</div>

@endsection
