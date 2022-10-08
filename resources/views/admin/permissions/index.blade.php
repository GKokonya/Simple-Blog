@extends('layouts.dashboard')

@section('content')

<div class="flex flex-col mt-20 ml-5 mr-5">
  <a class="btn" href="{{route('admin.permissions.create')}}">Create</a>
  <div class="table-responsive">
  <table class="table table-hover table-bordered  table-light">
  <thead class="table-dark">
        <tr>
          <th scope="col" class="">#ID</th>
          <th scope="col" class="">Title</th>
          <th scope="col" class="">Edit</th>
          <th scope="col" class="">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $permissions as $permission)
        <tr>
          <td>{{$permission->id}}</td>
          <td>{{$permission->name}}</td>
          <td><a class="btn btn-secondary"  href="{{ route('admin.permissions.edit',$permission->id) }}">edit</a></td>
          <td>
            <form method="POST" action="{{route('admin.permissions.destroy',$permission)}}">
              @csrf
             @method('DELETE')
              <button class="btn btn-secondary" onClick="return confirm('Are you Sure?')" type="submit">delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      <caption>List of Blog permissions</caption>
    </table>
  </div>
</div>


@endsection()