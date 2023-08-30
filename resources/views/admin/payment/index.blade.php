@extends ('layouts.admin')
@section ('content')

<main>


                        
                    <div class="container-fluid px-4">
                        <div class="my-5">
                        <h1 class="my-4 d-inline text-danger">Payments</h1>
                        <a href="{{route('backend.payments.create')}}" class="btn btn-primary float-end">Add Payment</a>
                        </div>
                
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Payment Lists
                                </div>
                                <div class="card-body">
                                    <table id="" class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <!-- <th>ID</th> -->
                                                <th>Name</th>
                                                <th>Logo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr class="text-center">
                                                <!-- <th>ID</th> -->
                                                <th>Name</th>
                                                <th>Logo</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($payments as $payment)

                                                <tr>
                                                    <!-- <td>{{$payment->id}}</td> -->
                                                    <td>{{$payment->name}}</td>
                                                    <td class="text-center"><img src="{{$payment->logo}}" alt="" class="w-25 h-25"></td> 
                                                    <td></td>  
                                                    
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{$payments->links()}}
                                </div>
                            </div>
                        </div>
</main>       

@endsection