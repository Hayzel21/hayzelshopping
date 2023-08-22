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
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($categories as $category)

                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>{{$category->photo}}</td>   
                                                    <td></td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{$categories->links()}}
                                </div>
                            </div>
                        </div>
</main>       

@endsection