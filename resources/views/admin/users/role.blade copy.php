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
    <div class="footer"> <span class="text-success"></span></div>
</div>




@endsection
