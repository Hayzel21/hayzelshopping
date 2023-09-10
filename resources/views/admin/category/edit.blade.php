@extends('layouts.admin')
@section('content')



<div class="card m-4">
            <div class="card-header">
                <div class="row">
                    <div class="col col-10">Category Create</div>
                    <div class="col col-2" >
                      <a href="{{route('backend.categories.index')}}"><button class="btn btn-danger ">Cancel</button></a>
                    </div>
                </div>
            </div>


            <div class="card-body">

            <form action="{{route('backend.categories.update',$category->id)}}" method="POST" enctype= multipart/form-data>
                {{csrf_field()}}
                {{method_field('put')}}

                   <label for="name" class="form-label">Name</label>
                   <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$category->name}}">

                   @if($errors->has('name'))
                   <div class="invalid-feedback">
                    {{$errors->first('name')}}
                   </div>

                   @endif

                   
                   

                   <label for="image" class="form-label my-3">Photo</label>

                   <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="photo-tab" data-bs-toggle="tab" data-bs-target="#photo-tab-pane" type="button" role="tab" aria-controls="photo-tab-pane" aria-selected="true">Photo</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="newPhoto-tab" data-bs-toggle="tab" data-bs-target="#newPhoto-tab-pane" type="button" role="tab" aria-controls="newPhoto-tab-pane" aria-selected="false">New Photo</button>
                        </li>

                       
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="photo-tab-pane" role="tabpanel" aria-labelledby="photo-tab" tabindex="0">
                            <img src="{{$category->photo}}" alt="" class="w-25 h-25 py-3">

                            <input type="hidden" name="oldPhoto" value="{{$category->photo}}">
                        </div>

                        <div class="tab-pane fade py-3" id="newPhoto-tab-pane" role="tabpanel" aria-labelledby="newPhoto-tab" tabindex="0">

                        <input type="file" name="newPhoto" id="photo" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}">

                            @if($errors->has('photo'))
                            <div class="invalid-feedback">
                            {{$errors->first('photo')}}
                            </div>

                            @endif
                        </div>
                        
                    </div>
                   

                  

                   <button type="submit" class="btn btn-primary mt-5 mb-3 w-100">Save</button>

            </form>
            </div>
            
        </div>

@endsection