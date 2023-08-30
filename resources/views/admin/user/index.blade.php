@extends ('layouts.admin')
@section ('content')

<main>
    <div class="container-fluid px-4">
    <div class="my-5">
                        <h1 class="my-4 d-inline text-danger">Users</h1>
                        <a href="{{route('backend.users.create')}}" class="btn btn-primary float-end">Add user</a>
    </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    User Lists
                                </div>
                                <div class="card-body">
                                    <table id="" class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <!-- <th>ID</th> -->
                                                <th>Name</th>
                                                <th>Email</th>
                                                <!-- <th>Password</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="text-center">
                                                <!-- <th>ID</th> -->
                                                <th>Name</th>
                                                <th>Email</th>
                                                <!-- <th>Password</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($users as $user)

                                                <tr>
                                                    <!-- <td>{{$user->id}}</td> -->
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <!-- <td>{{$user->password}}</td> -->
                                                    <td>..</td>
                                                    
                                                </tr>

                                            @endforeach
                                        </tbody>
                                       
                                    </table>

                                    {{$users->links()}}
                                </div>
                            
    </div>
</main>       

@endsection