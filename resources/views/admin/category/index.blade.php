@extends ('layouts.admin')
@section ('content')

<main>
<div class="container-fluid px-4">

                <div class="my-5">
                        <h1 class="my-4 d-inline text-danger">Categories</h1>
                        <a href="{{route('backend.categories.create')}}" class="btn btn-primary float-end">Add Category</a>
                </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Category Lists
                                </div>
                                <div class="card-body">
                                    <table id="" class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                               
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="text-center">
                                              
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="deleteTbody">
                                            @foreach($categories as $category)

                                                <tr>
                                                   
                                                    <td>{{$category->name}}</td>
                                                    <td class="text-center"><img src="{{$category->photo}}" alt="" class="w-25 h-25 "></td>   
                                                    <td>
                                                        <a href="{{route('backend.categories.edit',$category->id)}}" class="btn btn-sm btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>


                                                       
                                                        <button class="btn btn-sm btn-danger delete"> <i class="fa-solid fa-trash"></i></button>

                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{$categories->links()}}
                                </div>
                            </div>
                        </div>
</main> 

<!-- Delete Modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteModalLabel">Category Delete Comfirmation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary">Yes</button>
        </div>
        </div>
    </div>
</div>

@endsection

@section('script')

   <script>

        $(document).ready(function(){

            $(#deleteTbody).on('click','.delete',function(){

                // console.log(id);
            })

        })
   </script>
@endsection