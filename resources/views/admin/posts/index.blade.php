@extends('layouts.dashboard')

@section('content')

<div class="flex flex-col mt-20 ml-5 mr-5">
  <a class="btn" href="{{route('admin.posts.create')}}">Create</a>
  <div class="table-responsive">
    <table class="table table-hover table-bordered  table-light">
      <thead class="table-dark">
        <tr>
          <th scope="col" class="">#ID</th>
          <th scope="col" class="">Title</th>
          <th scope="col" class="">Date Posted</th>
          <th scope="col" class="">Edit</th>
          <th scope="col" class="">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>
          <td>{{$post->created_at}}</td>
          <td><a class="btn btn-secondary" href="{{ route('admin.posts.edit',$post->id) }}">edit</a></td>
          <td>
          <form method="POST" action="{{route('admin.posts.destroy',$post->id)}}">
          @csrf
          @method('DELETE')
          <button  class="btn btn-secondary" onClick="return confirm('Are you Sure?')" type="submit">delete</button>
        </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      <caption>List of Blog Posts</caption>
    </table>
  </div>
</div>


@endsection()