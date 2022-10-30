 <!-- Added this wrapping div -->
<div class="flex flex-col mt-20 ml-5 mr-5">
    <div class="d-flex  mb-3 pl-2 pr-2 justify-content-end">
    @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#studentModal">
            <i class="fa fa-plus-circle m-1"></i>
            Create
        </button>
    </div>
    <span class="text-danger">{{Session::get('user')}}</span>
    <div class="table-responsive">
        <table class="table table-hover border align-middle mb-0 bg-white shadow rounded ">
            <thead class="bg-light">
                <tr class="text-left">
                    <th scope="col" class="">#ID</th>
                    <th scope="col" class="">Title</th>
                    <th scope="col" class="">Email</th>
                    <th scope="col" class="">Role</th>
                    <th scope="col" class="">Edit</th>
                    <th scope="col" class="">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $users as $user)
                <tr class="text-left">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a class="btn btn-link btn-rounded btn-sm fw-bold text-decoration-none text-secondary"  href="{{ route('admin.users.show',$user->id) }}">role</a></td>
                    <td><a class="btn btn-link btn-rounded btn-sm fw-bold text-decoration-none"  href="{{ route('admin.users.edit',$user->id) }}">edit</a></td>
                    <td>
                        <form method="POST" action="{{route('admin.users.destroy', $user->id)}}">
                            @csrf
                            @method('DELETE')
                            <button  class="btn btn-link btn-rounded btn-sm fw-bold text-decoration-none text-danger"  onClick="return confirm('Are you Sure?')" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
                 @endforeach
            </tbody>
            <caption>List of Blog users</caption>
        </table>
    </div>

    <!--------------Modal--------->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel"
    aria-hidden="true">
     <div class="modal-dialog" role="document">

            <div class="modal-content">
             
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Create User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="form-group">
                        <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>
                            <input wire.model.defer="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                            {{$name}}
                            @error('name')
                                <span class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label>
                            <input wire.model.defer="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" >
                            @error('email')<span class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                            <input wire.model.defer="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                            @error('password')<span class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                        
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                            <input wire.model.defer="password_confirmation" id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>

                                                
                        <div class="form-group">

                        <button type="submit" class="btn btn-primary">Save</button>
                           
                        </div>

                        </form>

                    </div>
  
                </div>

        </div>
    </div>
    <!--------------Modal--------->


</div>
