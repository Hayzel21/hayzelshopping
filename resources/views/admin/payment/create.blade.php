@extends('layouts.admin')
@section('content')



<div class="card m-4">
            <div class="card-header">
                <div class="row">
                    <div class="col col-10">Payment Create</div>
                    <div class="col col-2" >
                        <button class="btn btn-danger ">Cancel</button>
                    </div>
                </div>
            </div>


            <div class="card-body">

            <form action="{{route('payments.store')}}" method="POST" enctype= multipart/form-data>
                {{csrf_field()}}

                   <label for="name" class="form-label">Name</label>
                   <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">

                   @if($errors->has('name'))
                   <div class="invalid-feedback">
                    {{$errors->first('name')}}
                   </div>

                   @endif

                   
                   

                   <label for="image" class="form-label my-3">Logo</label>
                   <input type="file" name="logo" id="logo" class="form-control {{$errors->has('logo') ? 'is-invalid' : ''}}">

                   @if($errors->has('logo'))
                   <div class="invalid-feedback">
                    {{$errors->first('logo')}}
                   </div>

                   @endif

                  

                   <button type="submit" class="btn btn-primary mt-5 mb-3 w-100">Save</button>

            </form>
            </div>
            
        </div>

@endsection