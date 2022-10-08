@extends('layouts.dashboard')

@section('content')
<form method="POST" action="{{ route('admin.permissions.update', $permission) }}" class="bg-light p-5">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="name">Permission</label>
    <input type="text" class="form-control mb-2 mt-2 rounded" id="name" name="name"  value="{{$permission->name}}">
    <small style="color:red;">@error('name'){{ $message }} @enderror</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="rounded bg-white mt-5">
  <div class="pt-2 text-center h1 text-bold">Permissions</div>
    <hr>
      <div class="d-flex pl-2 pr-2 pt-2 pb-2" >
        @foreach ($permission->roles as $rol)
          <form method="POST" action="{{route('admin.permissions.roles.remove',[$permission->id,$rol->id])}}">
            @csrf
            @method('DELETE')
            <button class="bg-primary rounded text-white m-1" onClick="return confirm('Are you Sure?')" type="submit">{{$rol->name}}</button>
          </form>
        @endforeach
      </div>
    <div class="footer"> <span class="text-success">{{ Session::get('remove-role'); }}</span></div>
</div>

<form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}" class="bg-light p-5 mt-3">
    @csrf
  <div class="form-group">
    <label for="name">Assign Role</label>
    <select class="form-control mb-2 mt-2 rounded" id="role" name="role">
    @foreach ($roles as $role)
    <option value="{{$role->name}}">{{$role->name}}</option>
    @endforeach  
    
    </select>

    <span class="text-danger">{{ Session::get('assign-role'); }}</span>

  </div>

  <button type="submit" class="btn btn-primary">Assign</button>
</form>
@endsection
