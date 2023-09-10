@extends('layouts.admin')
@section('content')



<div class="card m-4">
            <div class="card-header">
                <div class="row">
                    <div class="col col-10">User Create</div>
                    <div class="col col-2" >
                        <a href="{{route('backend.users.index')}}"><button class="btn btn-danger ">Cancel</button></a>
                    </div>
                </div>
            </div>


            <div class="card-body">

            <form action="{{route('backend.users.store')}}" method="POST" enctype= multipart/form-data>
                {{csrf_field()}}

                   <label for="name" class="form-label">Name</label>
                   <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">

                   @if($errors->has('name'))
                   <div class="invalid-feedback">
                    {{$errors->first('name')}}
                   </div>

                   @endif

                   
                   

                   <label for="email" class="form-label my-3">Email</label>
                   <input type="email" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}">

                   @if($errors->has('email'))
                   <div class="invalid-feedback">
                    {{$errors->first('email')}}
                   </div>

                   @endif

                   <label for="role" class="form-label my-3">Role</label>
                   <select name="role"  class="form-select {{$errors->has('role') ? 'is-invalid' : ''}}">
                    <option value="Super Admin">Super Admin</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                    </select>

                    <label for="Phone Number" class="form-label my-3">Phone Number</label>
                   <input type="number" name="Phone Number" id="Phone Number" class="form-control {{$errors->has('Phone number') ? 'is-invalid' : ''}}">

                   @if($errors->has('Phone Number'))
                   <div class="invalid-feedback">
                    {{$errors->first('Phone Number')}}
                   </div>

                   @endif

                   
                   <label for="address" class="form-label my-3">Address</label>
                   <input type="text" name="address" id="address" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}">

                   @if($errors->has('email'))
                   <div class="invalid-feedback">
                    {{$errors->first('email')}}
                   </div>

                   @endif
                   

                   <label for="password" class="form-label my-3">Password</label>
                   <input type="password" name="password" id="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}">

                   @if($errors->has('password'))
                   <div class="invalid-feedback">
                    {{$errors->first('password')}}
                   </div>

                   @endif

                   <label for="password_confirmation" class="form-label my-3">Confirm Password</label>
                   <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}">

                   @if($errors->has('password_confirmation'))
                   <div class="invalid-feedback">
                    {{$errors->first('password_confirmation')}}
                   </div>

                   @endif

                   

                  

                   <button type="submit" class="btn btn-primary mt-5 mb-3 w-100">Save</button>

            </form>
            </div>
            
        </div>

@endsection