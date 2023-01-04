@extends('layouts.dashboard')
@section('content')
{{ Breadcrumbs::render('edit category',$category) }}
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
  <div class="mx-auto max-w-lg">
    <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">
    Edit Category
    </h1>
    
    <form class="bg-white mt-6 mb-0 space-y-4 rounded-lg p-8 shadow-2xl" method="POST" action="{{route('categories.update',$category->id)}}">
        @csrf
        <form  enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="mt-1">
            <label for="subject"class="text-sm font-medium"><h1>Ttile</h1></label>
            <div>
                <input type="text"  class="input-text" name="title" placeholder="Enter category title" value="{{$category->title}}">
            </div>
            @error('title')
            <span class="text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        
        <button type="submit" class="btn-submit">Submit </button>

    </form>
  </div>
</div>
@endsection