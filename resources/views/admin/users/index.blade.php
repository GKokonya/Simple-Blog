@extends('layouts.dashboard')

@section('content')

<div class="flex flex-col mt-20 ml-5 mr-5">
  <a class="btn" href="{{route('admin.users.create')}}">Create</a>
  <div class="table-responsive">
    <table class="table table-bordered  table-sm table-hover table-striped">
      <thead class="table-dark">
        <tr class="text-white">
          <th scope="col" class="">#ID</th>
          <th scope="col" class="">Title</th>
          <th scope="col" class="">Email</th>
          <th scope="col" class="">Role</th>
          <th scope="col" class="">Edit</th>
          <th scope="col" class="">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td><a class="btn btn-primary">Role</a></td>
          <td><a href="{{ route('admin.users.edit',$user->id) }}">edit</a></td>
          <td>
          <form method="user" action="{{route('admin.users.destroy',$user->id)}}">
          @csrf
          @method('DELETE')
          <button  onClick="return confirm('Are you Sure?')" type="submit">delete</button>
        </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      <caption>List of Blog users</caption>
    </table>
  </div>
</div>


@endsection()