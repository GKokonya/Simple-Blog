@extends('layouts.dashboard')

@section('content')
<div class="table-responsive">
  <div class="d-flex  mb-3 pl-2 pr-2 justify-content-end">
    <a href="{{route('admin.roles.create')}}"  class="btn btn-secondary ">Create</a>
  </div>
  <table class="table table-hover border align-middle mb-0 bg-white shadow rounded ">
      <thead class="bg-light">
        <tr class="text-left">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($roles as $role)
      <tr class="text-left">
          <td>{{$role->id}}</td>
          <td>{{$role->name}}</td>
          <td><a class="btn btn-link btn-rounded btn-sm fw-bold text-decoration-none"  href="{{ route('admin.roles.edit',$role->id) }}">edit</a></td>
          <td>
          <form method="POST" action="{{route('admin.roles.destroy',$role)}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-link btn-rounded btn-sm fw-bold text-danger text-decoration-none"  onClick="return confirm('Are you Sure?')" type="submit">delete</button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
