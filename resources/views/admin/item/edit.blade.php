@extends('layouts.admin')
@section('content')



<div class="card m-3">
            <div class="card-header">
                <div class="row">
                    <div class="col col-10">Item Edit</div>
                    <div class="col col-2" >
                        <a href="{{route('backend.items.index')}}"><button class="btn btn-danger ">Cancel</button></a>
                    </div>
                </div>
            </div>


            <div class="card-body">

            <form action="{{route('backend.items.update',$item->id)}}" method="POST" enctype= multipart/form-data>
                {{csrf_field()}}
                {{method_field('put')}}

                   <label for="codeNo" class="form-label">Code No</label>
                   <input type="number" name="codeNo" id="codeNo" class="form-control {{$errors->has('codeNo') ? 'is-invalid' : ''}}" value="{{$item->codeNo}}">

                   @if($errors->has('codeNo'))
                   <div class="invalid-feedback">
                    {{$errors->first('codeNo')}}
                   </div>

                   @endif

                   
                   <label for="name" class="form-label my-3">Item Name</label>
                   <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$item->name}}">

                   @if($errors->has('name'))
                   <div class="invalid-feedback">
                    {{$errors->first('name')}}
                   </div>

                   @endif

                   <label for="image" class="form-label my-3">Image</label>

                   <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Image</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="newImage-tab" data-bs-toggle="tab" data-bs-target="#newImage-tab-pane" type="button" role="tab" aria-controls="newImage-tab-pane" aria-selected="false">New Image</button>
                        </li>

                       

                    </ul>
        <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">

                    <img src="{{$item->image}}" alt="" class="w-25 h-25 py-3">
                    <input type="hidden" name="oldImage" id="" value="{{$item->image}}">

                </div>

                <div class="tab-pane fade" id="newImage-tab-pane" role="tabpanel" aria-labelledby="newImage-tab" tabindex="0">
                    <input type="file" name="newImage" id="image" class="form-control mt-3 {{$errors->has('image') ? 'is-invalid' : ''}}">

                        @if($errors->has('image'))
                        <div class="invalid-feedback">
                        {{$errors->first('image')}}
                        </div>

                        @endif
                </div>
                
        </div>


              

                   <label for="price" class="form-label my-3">Price</label>
                   <input type="number" name="price" id="price" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" value="{{$item->price}}">

                   @if($errors->has('price'))
                   <div class="invalid-feedback">
                    {{$errors->first('price')}}
                   </div>

                   @endif

                   <label for="discount" class="form-label my-3">Discount</label>
                   <input type="text" name="discount" id="discount" class="form-control {{$errors->has('discount') ? 'is-invalid' : ''}}" value="{{$item->discount}}">

                   @if($errors->has('discount'))
                   <div class="invalid-feedback">
                    {{$errors->first('discount')}}
                   </div>

                   @endif

                   <label for="inStock" class="form-label my-3">Instock</label>
                   <select name="inStock"  class="form-select">
                    <option value="1"{{$item->inStock ==1 ? 'selected' : ''}}>Yes</option>
                    <option value="2" {{$item->inStock ==2 ? 'selected' : ''}}>No</option>
                    </select>
                    

                    <label for="category_id" class="form-label my-3">Category</label>
                    <select name="category_id" id="category_id" class="form-select {{$errors->has('category_id') ? 'is-invalid' : ''}}">
                            <option value="">Choose Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$item->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category_id') }}
                        </div>
                    @endif


                    
                   

                 

                    <label for="description" class="form-label my-3">Description</label>
                    <textarea name="description" id="description" cols="10" rows="5" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}">{{$item->description}}</textarea>

                    @if($errors->has('description'))
                   <div class="invalid-feedback">
                    {{$errors->first('description')}}
                   </div>

                   @endif
                   

                   <button type="submit" class="btn btn-primary mt-5 mb-3 w-100">Save</button>

            </form>
            </div>
            
        </div>

@endsection