@extends('layouts.admin')
@section('content')



<div class="card m-4">
            <div class="card-header">
                <div class="row">
                    <div class="col col-10">Payment Create</div>
                    <div class="col col-2" >
                        <a href="{{route('backend.payments.index')}}"><button class="btn btn-danger ">Cancel</button></a>
                    </div>
                </div>
            </div>


            <div class="card-body">

            <form action="{{route('backend.payments.update',$payment->id)}}" method="POST" enctype= multipart/form-data>
                {{csrf_field()}}
                {{method_field('put')}}

                   <label for="name" class="form-label">Name</label>
                   <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$payment->name}}">

                   @if($errors->has('name'))
                   <div class="invalid-feedback">
                    {{$errors->first('name')}}
                   </div>

                   @endif

                   
                   

                   <label for="image" class="form-label my-3">Logo</label>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="logo-tab" data-bs-toggle="tab" data-bs-target="#logo-tab-pane" type="button" role="tab" aria-controls="logo-tab-pane" aria-selected="true">Logo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="newLogo-tab" data-bs-toggle="tab" data-bs-target="#newLogo-tab-pane" type="button" role="tab" aria-controls="newLogo-tab-pane" aria-selected="false">New Logo</button>
                            </li>
 
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="logo-tab-pane" role="tabpanel" aria-labelledby="logo-tab" tabindex="0">.

                            <img src="{{$payment->logo}}" alt="" class="w-25 h-25 my-3">
                            <input type="hidden" name="oldLogo" value="{{$payment->image}}">
                        </div>
                            
                            <div class="tab-pane fade" id="newLogo-tab-pane" role="tabpanel" aria-labelledby="newLogo-tab" tabindex="0">


                                <input type="file" name="newLogo" id="logo" class="form-control {{$errors->has('logo') ? 'is-invalid' : ''}} my-3">

                                @if($errors->has('logo'))
                                <div class="invalid-feedback">
                                {{$errors->first('logo')}}
                                </div>

                                @endif
                            </div>
                       
                        </div>
                   

                  

                   <button type="submit" class="btn btn-primary mt-5 mb-3 w-100">Save</button>

            </form>
            </div>
            
        </div>

@endsection