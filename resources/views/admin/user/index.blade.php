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
                                                <th>Role</th>
                                                <!-- <th>Password</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="text-center">
                                                <!-- <th>ID</th> -->
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <!-- <th>Password</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="userTbody">
                                            @foreach($users as $user)

                                                <tr class="text-center">
                                                    <!-- <td>{{$user->id}}</td> -->
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->role}}</td>
                                                    <!-- <td>{{$user->password}}</td> -->
                                                    <td>

                                                        <button class="btn btn-sm btn-warning edit"><i class="fa-solid fa-pen-to-square"></i></button>

                                                        <button class="btn btn-sm btn-danger delete" data-id="{{$user->id}}"><i class="fa-solid fa-trash" ></i></button>

                                                    </td>
                                                    
                                                </tr>

                                            @endforeach
                                        </tbody>
                                       
                                    </table>

                                    {{$users->links()}}
                                </div>
                            
    </div>
</main>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-danger">
                <h1 class="modal-title fs-5 text-light" id="deleteModalLabel">Delete Confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <h3 class="text-danger"> Are You Sure Delete?</h3>
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


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5" id="editModalLabel">Change Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-primary">Are You Sure Edit Your Information?</h3>
            </div>
            <div class="modal-footer">
                <a href="{{route('backend.users.edit',$user->id)}}"> <button type="button" class="btn btn-warning" data-bs-dismiss="modal"><i class="fa-regular fa-pen-to-square"></i>Edit</button></a>
                
                <a href="{{route('backend.password.index')}}"><button type="button" class="btn btn-primary"><i class="fa-solid fa-key"></i>Change Password</button></a>
            </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function(){
            // alert ("Hello");
            $('#userTbody').on('click','.delete',function(){
                let id = $(this).data('id');
                // console.log(id);
                $('#deleteForm').prop('action','users/' +id);

                $('#deleteModal').modal('show');
            })
        })
    </script>
    
     <script>
        $(document).ready(function(){
            
            $('#userTbody').on('click','.edit',function(){
                // let id = $(this).data('id');
                // // console.log(id);
                // $('#deleteForm').prop('action','users/' +id);

                $('#editModal').modal('show');
            })
        })
    </script>
@endsection

