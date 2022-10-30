@extends('layouts.app')

@section('content')
<style>
  /*
  .image-thumbnail {
    position: relative;
}

.image-caption {
    position: absolute;
    top: 45%;
    left: 0;
    width: 100%;
}*/
</style>
<!--start of content-->
<div class="container-fluid">
  <div class="row">
    <div class="col-9">
      <!--Start of Blog Post-->
      @foreach ($posts as $post)
      <div class="d-flex row my-2 mx-2 p-0 rounded shadow" >

      
      <div class="col-6 p-0" >
            <img class="img-fluid p-0 rounded-start" src="{{Storage::url($post->image_path)}}"alt="{{$post->title}}">
        </div>

        <div class="col-6">
          <div><p class="h1 text-secondary"> {{$post->title}}</p></div>
          <hr>
          <div class="text-truncate overflow-hidden">{{$post->content}}</div>
          
        </div>

      </div>
      @endforeach
      <div>
        {{$posts->links()}}
      </div>
     
      <!--End of Blog Post-->
    </div>

  
    <div class="col-3">

      <!--Start of About Me-->
        <div class="card text-center mb-5">
          <div class="card-header">About</div>
          <div class="card-body mt-2 mb-2">
            <h5 class="text-gray-900 text-xl font-medium mb-2">Special title treatment</h5>
            <p class="text-gray-700 text-base mb-4">With supporting text below as a natural lead-in to additional content.</p>
            <button type="button" class="btn btn-primary">Button</button>
          </div>
          <div class="card-footer">2 days ago</div>
        </div>
      <!--End of About Me-->

      <!--Start of Popular post-->
        <div class="card text-center mb-5">
          <div class="card-header">Popular Post</div>
          <div class="card-body mt-2 mb-2">
            <h5 class="text-gray-900 text-xl font-medium mb-2">Special title treatment</h5>
            <p class="text-gray-700 text-base mb-4">With supporting text below as a natural lead-in to additional content.</p>
            <button type="button" class="btn btn-primary">Button</button>
          </div>
          <div class="card-footer">2 days ago</div>
        </div>
      <!--End of Popular Post-->

      <!--Start of Popular post-->
        <div class="card text-center">
          <div class="card-header">Follow Me</div>
          <div class="card-body mt-2 mb-2">
            <h5 class="text-gray-900 text-xl font-medium mb-2">Special title treatment</h5>
            <p class="text-gray-700 text-base mb-4">With supporting text below as a natural lead-in to additional content.</p>
            <button type="button" class="btn btn-primary">Button</button>
          </div>
          <div class="card-footer">2 days ago</div>
        </div>

      <!--End of Popular Post-->
    </div>
</div>

<!--end of contents-->
@endsection
