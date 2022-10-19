@extends('layouts.dashboard')

@section('content')

<div class="container mt-5 mb-5 rounded shadow bg-white p-3 w-75">
    <div class="text-center h1">Create New Post</div>
    <div class="body">
      <form method="POST" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label class="label" for="username">Title</label>
        <input type="text" class="form-control" placeholder="title" name="title">
      </div>
      <div class="mb-6">
        <label class="label" for="image">Image</label>
        <input type="file" class="form-control" id="exampleInput8" name="image" accept=".jpg">
        <span class="text-danger">{{Session::get('image')}}</span>
      </div>
      <div class="mb-6">
        <label class="label" for="image">Content</label>
        <textarea id="editor1" name="content" placeholder="Content"></textarea>
      </div>

      <button type="submit" class="btn btn-outline-secondary mt-2 rounded">Send</button>
      </form>
    </div>
  </div>
</div>

<!-- Include the Quill library -->
<script src="//cdn.ckeditor.com/4.19.1/basic/ckeditor.js"></script>

<!-- Initialize Quill editor -->
<script>
   CKEDITOR.replace( 'editor1' );
</script>
@endsection()
