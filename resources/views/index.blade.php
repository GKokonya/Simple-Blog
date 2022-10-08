@extends('layouts.app')

@section('content')
<!--start of content-->
<div class="container-fluid">
  <div class="row">
    <div class="col-9">
      <!--Start of Blog Post-->
      @foreach ($posts as $post)
      <div class="card mb-3">
          <div class="row card-body">
            <div class="col-4"><img
            class="img-fluid rounded"
            src="{{Storage::url($post->image_path)}}"
             alt="{{$post->title}}"></div>
            <div class="col-8">
              <h1>{{$post->title}}</h1>
              <hr>
              <p class="d-inline-block text-truncate" style="max-width: 150px;">{{strip_tags($post->content)}}</p>
            </div>
          </div>
        <div class="card-footer ">
          <div class="row">
            <div class="col-4 text-start font-weight-bold text-dark">{{$post->name}}</div>
            <div class="col-4 text-start"><a href="{{route('single-post',$post->id)}}">Read More</a></div>
            <div class="col-4 text-end">{{$post->created_at}}</div>
          </div>
        </div>
      </div>
      @endforeach
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
