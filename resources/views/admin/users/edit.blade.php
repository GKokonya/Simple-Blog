@extends('layouts.dashboard')

@section('content')
<div class="rounded container border border-1 bg-white mt-5">
    <div class="h1 text-center">Edit Name</div>
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="bg-light p-5 mt-3">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"  class="form-control mb-2 mt-2 rounded" id="name" name="name" value="{{$user->name}}">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection