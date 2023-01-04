@extends('layouts.dashboard')

@section('content')
{{ Breadcrumbs::render('edit post',$post) }}
<div>
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 ">
    <div class="mx-auto max-w-lg">
      <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">
        Edit Post
      </h1>

      <form class="mt-6 mb-0 space-y-4 bg-white rounded-lg p-8 shadow-2xl" method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

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
          <input type="text" id="title" name="title" class="input-text" value="{{ $post->title }}" placeholder="Enter title"/>  
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
                <option 
                @if( $category->id == $post->category_id)
                 {{ $selected }}
                @endif
                value="{{ $category->id }}"
                >{{ $category->title }}</option>
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
          <input type="file" title=" " id="image" name="image" class="input-text" onchange="loadFile(event)" placeholder="Select image"/>  
          <img class="img-fluid rounded"  id="output" style="width:1920px;  height: 300px;" src="{{ Storage::url($post->image) }}" alt="{{$post->title}}">
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
          <textarea name="content" id="content" class="input-text" cols="30" rows="10">{{ $post->content }}</textarea>
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

<!-- Include the Quill library -->
<script src="//cdn.ckeditor.com/4.19.1/basic/ckeditor.js"></script>

<!-- Initialize Quill editor -->
<script>
   CKEDITOR.replace( 'content' );
</script>
<script>

    var loadFile=function(event){
      var output=document.getElementById('output');
      output.src=URL.createObjectURL(event.target.files[0]);
    }

</script>
@endsection()
