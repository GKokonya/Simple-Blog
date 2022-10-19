@extends('layouts.dashboard')

@section('content')
<div class="rounded container border border-1">
    <div class="d-flex">
        <div>{{$user->name}}</div>
        <div>{{$user->email}}</div>
    </div>
</div>

<div class="rounded bg-white mt-5">
  <div class="pt-2 text-center h1 text-bold">Roles</div>
    <hr>
      <div class="d-flex pl-2 pr-2 pt-2 pb-2">
        @if($user->roles)
            @foreach ($user->roles as $user_role)
            <form method="POST" action="{{route('admin.users.roles.remove',[$user->id,$user_role->id])}}">
                @csrf
                @method('DELETE')
                <button class="bg-primary rounded text-white m-1" onClick="return confirm('Are you Sure?')" type="submit">{{$user_role->name}}</button>
            </form>
            @endforeach
        @endif
      </div>
    <div class="footer"> <span class="text-success">{{ Session::get('remove-role'); }}</span></div>
</div>

<div class="rounded bg-white mt-5">
    <form method="POST" action="{{ route('admin.users.roles', $user->id) }}" class="bg-light p-5 mt-3">
        @csrf
        <div class="form-group">
            <label for="name">Assign Role</label>
            <select class="form-control mb-2 mt-2 rounded" id="role" name="role">
                @foreach ($roles as $role)
                <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach  
            </select>
            <span class="text-danger">{{Session::get('assign-role')}}</span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Assign</button>
        </div>
    </form>
</div>
@endsection