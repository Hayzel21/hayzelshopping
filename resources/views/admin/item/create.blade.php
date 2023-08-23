@extends('layouts.admin')
@section('content')


<div class="card m-3">
            <div class="card-header">
                <div class="row">
                    <div class="col col-10">Item Create</div>
                    <div class="col col-2" >
                        <button class="btn btn-danger ">Cancel</button>
                    </div>
                </div>
            </div>


            <div class="card-body">

            <form action="{{route('items.store')}}" method="POST" enctype= multipart/form-data>
                {{csrf_field()}}

                   <label for="codeNo" class="form-label">Code No</label>
                   <input type="number" name="codeNo" id="codeNo" class="form-control">

                   
                   <label for="name" class="form-label my-3">Item Name</label>
                   <input type="text" name="name" id="name" class="form-control">

                   <label for="image" class="form-label my-3">Image</label>
                   <input type="file" name="image" id="image" class="form-control">

                   <label for="price" class="form-label my-3">Price</label>
                   <input type="number" name="price" id="price" class="form-control">

                   <label for="discount" class="form-label my-3">Discount</label>
                   <input type="text" name="discount" id="discount" class="form-control">

                   <label for="inStock" class="form-label my-3">Instock</label>
                   <select name="inStock"  class="form-select">
                    <option value="1"selected>Yes</option>
                    <option value="2">No</option>
                    </select>

                    <label for="category_id" class="form-label my-3">Category</label>
                   <select name="category_id" id="category_id" class="form-select">
                    <option selected>Choose Category</option>

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    </select>

                    <label for="description" class="form-label my-3">Description</label>
                    <textarea name="description" id="description" cols="10" rows="5" class="form-control"></textarea>
                   

                   <button type="submit" class="btn btn-primary mt-5 mb-3 w-100">Save</button>

            </form>
            </div>
            
        </div>

@endsection