@extends ('layouts.admin')
@section ('content')

<main>
<div class="container-fluid px-4">
                <div class="my-5">
                        <h1 class="my-4 d-inline text-danger">Items</h1>
                        <a href="{{route('backend.items.create')}}" class="btn btn-primary float-end">Add Item</a>
                </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Item Lists
                                </div>
                                <div class="card-body">
                                    <table id="" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Code No</th>
                                                <th>Item Name</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Instock</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Code No</th>
                                                <th>Item Name</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Instock</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="itemTbody">
                                            @foreach($items as $item)

                                                <tr>
                                                    <td>{{$item->codeNo}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>{{$item->discount}}</td>
                                                    <td>{{$item->inStock}}</td>
                                                    <td>
                                                    <a href="{{ route('backend.items.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>


                                                        <button class="btn btn -sm btn-danger delete " data-id="{{$item->id}}"><i class="fa-solid fa-trash"></i></button>
                                                
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{$items->links()}};
                                </div>
                            </div>
                        </div>
</main>  

<!-- Delete Modal -->

<div class="modal fade modal-md" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-danger">
            <h1 class="modal-title fs-5  text-light" id="deleteModalLabel">Item Delete Comfirmation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
            <h3 class="text-danger">Are you sure delete?</h3>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

        <form action="" method="post" id="deleteForm">

        {{csrf_field()}}
        {{method_field('delete')}}


            <button type="submit" class="btn btn-danger">Yes</button>
        </form>

            
        </div>
        </div>
    </div>
</div>

@endsection
@section('script')

    <script>
        $(document).ready(function(){
            $('#itemTbody').on('click','.delete',function(){
                let id=$(this).data('id');
                // console.log(id);
                $('#deleteForm').prop('action','items/' +id);
                $('#deleteModal').modal('show');
            })
        })
    </script>
@endsection