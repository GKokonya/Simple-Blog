@extends('layouts.app')

@section('content')
<img class="img-fluid  rounded"  style="width:1920px;  height: 300px;" src="{{Storage::url($post->image)}}" alt="{{$post->title}}">
<div class=" w-full px-5 py-24 mx-auto lg:px-32">
    <div class="flex flex-col w-full mx-auto mb-2 prose text-left prose-md">
        <div class="mb-5 border-b border-gray-200">
            <div class="flex flex-wrap items-baseline -mt-2">
                <h5>{{ $post->created_at }}</h5>
                <p class="mt-1 ml-2">{{ $post->category->title }}</p>
            </div>
        </div>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
    </div>
</div>
@endsection