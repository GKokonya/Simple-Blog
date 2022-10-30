@extends('layouts.dashboard')

@section('content')
<div class="shadow p-5 rounded bg-white">
<form METHOD="POST" action="{{route('admin.users.store')}}">
    @csrf


                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label">Name</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                <input type="email" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name...">
                                @error('name')<span class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"  placeholder="email...">
                                @error('email')<span class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label"> Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></i></span>
                                <input type="password" class="form-control @error('passoword') is-invalid @enderror"  placeholder="password...">
                                @error('password')<span class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="password_confirm" class="col-md-4 col-form-label">Confirm Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></i></span>
                                <input type="password"  id="password_confirm"  class="form-control @error('passoword') is-invalid @enderror"  placeholder="Username" name="password_confirmation">
                               
                            </div>
                        </div>


                                                
                        <div class="form-group mt-2">

                        <button type="submit" class="btn btn-primary">Save</button>
                           
                        </div>

                        </form>
</div>
@endsection

