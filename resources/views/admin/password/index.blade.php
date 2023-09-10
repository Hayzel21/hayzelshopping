@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-primary text-light">Change Password</div>

                    <div class="card-body">
                      

                        <form method="POST" action="">
                            @csrf

                            


                            <div class="form-group my-3">
                                <label for="new_password">New Password</label>
                                <input
                                    type="password"
                                    id="new_password"
                                    name="new_password"
                                    class="form-control my-2 @error('new_password') is-invalid @enderror"
                                    required
                                >
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <label for="new_password_confirmation ">Confirm New Password</label>
                                <input
                                    type="password"
                                    id="new_password_confirmation"
                                    name="new_password_confirmation"
                                    class="form-control my-2"
                                    required
                                >
                            </div>

                                <a href="/backend/users" class="btn btn-primary float-end">Change Password</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
