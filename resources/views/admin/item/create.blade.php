@extends('layouts.admin')
@section('content')



<div class="card m-3">
            <div class="card-header">
                <div class="row">
                    <div class="col col-10">Item Create</div>
                    <div class="col col-2" >
                        <a href="{{route('backend.items.index')}}"><button class="btn btn-danger ">Cancel</button></a>
                    </div>
                </div>
            </div>


            <div class="card-body">

            <form action="{{route('backend.items.store')}}" method="POST" enctype= multipart/form-data>
                {{csrf_field()}}

                   <label for="codeNo" class="form-label">Code No</label>
                   <input type="number" name="codeNo" id="codeNo" class="form-control {{$errors->has('codeNo') ? 'is-invalid' : ''}}">

                   @if($errors->has('codeNo'))
                   <div class="invalid-feedback">
                    {{$errors->first('codeNo')}}
                   </div>

                   @endif

                   
                   <label for="name" class="form-label my-3">Item Name</label>
                   <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">

                   @if($errors->has('name'))
                   <div class="invalid-feedback">
                    {{$errors->first('name')}}
                   </div>

                   @endif

                   <label for="image" class="form-label my-3">Image</label>
                   <input type="file" name="image" id="image" class="form-control {{$errors->has('image') ? 'is-invalid' : ''}}">

                   @if($errors->has('image'))
                   <div class="invalid-feedback">
                    {{$errors->first('image')}}
                   </div>

                   @endif

                   <label for="price" class="form-label my-3">Price</label>
                   <input type="number" name="price" id="price" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}">

                   @if($errors->has('price'))
                   <div class="invalid-feedback">
                    {{$errors->first('price')}}
                   </div>

                   @endif

                   <label for="discount" class="form-label my-3">Discount</label>
                   <input type="text" name="discount" id="discount" class="form-control {{$errors->has('discount') ? 'is-invalid' : ''}}">

                   @if($errors->has('discount'))
                   <div class="invalid-feedback">
                    {{$errors->first('discount')}}
                   </div>

                   @endif

                   <label for="inStock" class="form-label my-3">Instock</label>
                   <select name="inStock"  class="form-select">
                    <option value="1"selected>Yes</option>
                    <option value="2">No</option>
                    </select>
                    

                    <label for="category_id" class="form-label my-3">Category</label>
                    <select name="category_id" id="category_id" class="form-select {{$errors->has('category_id') ? 'is-invalid' : ''}}">
                            <option value="">Choose Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category_id') }}
                        </div>
                    @endif


                    
                   

                 

                    <label for="description" class="form-label my-3">Description</label>
                    <textarea name="description" id="description" cols="10" rows="5" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}"></textarea>

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