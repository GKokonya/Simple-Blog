@extends('layouts.app')

@section('content')
<!--start of content-->
<div class="container-fluid bg-white card p-3 rounded">
  <div class="row mb-2">
      <div class="col">
      <img class="img-fluid  rounded"  style="width:1920px;  height: 576px;"
      src="{{Storage::url($post->image_path)}}" 
      alt="{{$post->title}}">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h1 class="text-center text-bold">{{$post->title}}</h1>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p class="">{{strip_tags($post->content)}}</p>
        <hr>
      </div>
    </div> 
    <div class="row">
      <div class="col-4 text-start">Author:{{$post->name}}</div>
      <div class="col-4 text-end">{{$post->created_at}}</div> 
</div>

<!--end of contents-->
@endsection
