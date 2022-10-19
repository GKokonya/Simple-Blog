@extends('layouts.dashboard')

@section('content')

<div class="flex flex-col mt-20 ml-5 mr-5">
<div class="d-flex  mb-3 pl-2 pr-2 justify-content-end">
    <a href="{{route('admin.permissions.create')}}"  class="btn btn-secondary ">Create</a>
  </div>
  <div class="table-responsive">
  <table class="table table-hover border align-middle mb-0 bg-white shadow rounded">
      <thead class="bg-light">
        <tr class="text-left">
          <th scope="col" class="">#ID</th>
          <th scope="col" class="">Title</th>
          <th scope="col" class="">Edit</th>
          <th scope="col" class="">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $permissions as $permission)
        <tr class="text-left">
          <td>{{$permission->id}}</td>
          <td>{{$permission->name}}</td>
          <td><a  class="btn btn-link btn-rounded btn-sm fw-bold text-decoration-none"   href="{{ route('admin.permissions.edit',$permission->id) }}">edit</a></td>
          <td>
            <form method="POST" action="{{route('admin.permissions.destroy',$permission)}}">
              @csrf
             @method('DELETE')
              <button class="btn btn-link btn-rounded btn-sm fw-bold text-decoration-none text-danger" onClick="return confirm('Are you Sure?')" type="submit">delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      <!--<caption>List of Blog permissions</caption>-->

    </table>
    <span>{{$permissions->links()}}</span>
      <style>
        .w-5{
          display: none;
        }
      </style>
  </div>
</div>


@endsection()