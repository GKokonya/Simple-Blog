@extends('layouts.dashboard')

@section('content')
<form method="POST" action="{{ route('admin.roles.update', $role) }}" class="bg-light p-5">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="name">Edit Role</label>
    <input type="text" class="form-control mb-2 mt-2 rounded" id="name" name="name"  value="{{$role->name}}">
    <small style="color:red;">@error('name'){{ $message }} @enderror</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="rounded bg-white mt-5">
  <div class="pt-2 text-center h1 text-bold">Permissions</div>
    <hr>
      <div class="d-flex pl-2 pr-2 pt-2 pb-2" >
        @foreach ($role->permissions as $per)
          <form method="POST" action="{{route('admin.roles.permissions.revoke',[$role->id,$per->id])}}">
            @csrf
            @method('DELETE')
            <button class="bg-primary rounded text-white m-1" onClick="return confirm('Are you Sure?')" type="submit">{{$per->name}}</button>
          </form>
        @endforeach
      </div>
    <div class="footer"> <span class="text-success">{{ Session::get('revoke-permission'); }}</span></div>
</div>


  <form method="POST" action="{{ route('admin.roles.permissions', $role) }}" class="bg-light p-5 mt-3">
    @csrf
  <div class="form-group">
    <label for="name">Assign Role</label>
    <select class="form-control mb-2 mt-2 rounded" id="permission" name="permission">
    @foreach ($permissions as $permission)
    <option value="{{$permission->name}}">{{$permission->name}}</option>
    @endforeach  
    
    </select>

    <span class="text-danger">{{ Session::get('give-permission'); }}</span>

  </div>

  <button type="submit" class="btn btn-primary">Assign</button>
</form>
@endsection
