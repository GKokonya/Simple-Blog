@extends('layouts.dashboard')

@section('content')
<form action="{{route('admin.permissions.store')}}" method="POST" class="bg-light p-5">
    @csrf
  <div class="form-group">
    <label for="name">Permission</label>
    <input type="text" class="form-control mb-2 mt-2 rounded" id="name" name="name"  placeholder="Enter Permission">
    <small style="color:red;">@error('name'){{ $message }} @enderror</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
