@extends ('layouts.admin')
@section ('content')

<main>
<div class="container-fluid px-4">
                            <h1 class="my-4">Categories</h1>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Category Lists
                                </div>
                                <div class="card-body">
                                    <table id="" class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="text-center">
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($categories as $category)

                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td class="text-center"><img src="{{$category->photo}}" alt="" class="w-25 h-25 "></td>   
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