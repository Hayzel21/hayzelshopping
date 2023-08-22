@extends ('layouts.admin')
@section ('content')

<main>
<div class="container-fluid px-4">
                            <h1 class="my-4">Items</h1>
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
                                        <tbody>
                                            @foreach($items as $item)

                                                <tr>
                                                    <td>{{$item->codeNo}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>{{$item->dixcount}}</td>
                                                    <td>{{$item->inStock}}</td>
                                                    <td></td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{$items->links()}};
                                </div>
                            </div>
                        </div>
</main>       

@endsection