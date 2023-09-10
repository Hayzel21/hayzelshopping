@extends ('layouts.admin')
@section ('content')

<main>
<div class="container-fluid px-4">
                <div class="my-5">
                        <h1 class="my-4 d-inline text-danger">Orders</h1>
                        <a href="{{route('backend.orders.index',['status' => 'Complete'])}}" class="btn btn-success float-end">Order Complete Lists</a>
                        
                        <a href="{{route('backend.orders.index',['status' => 'Accept'])}}" class="btn btn-warning float-end mx-3">Order Accept Lists</a>

                        <a href="{{route('backend.orders.index',['status' => 'Pending'])}}" class="btn btn-danger float-end mx-3">Order Pending Lists</a>

                      

                      
                        
                </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                  Order Lists
                                </div>
                                <div class="card-body">
                                    <table id="" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Vocher No</th>
                                                <th>User Name</th>
                                                <th>Status</th>
                                                <th>Payment Method</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Vocher No</th>
                                                <th>User Name</th>
                                                <th>Status</th>
                                                <th>Payment Method</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                           
                                     
                                          @foreach($orderwithUser as $order)
                                          @if ($order !== null)
                                          <tr>
                                                <td>{{$order->vocherNo}}</td>
                                                <td>{{$order->user->name}}</td>
                                                <td>{{$order->status}}</td>
                                                <td>{{$order->payment->name}}</td>
                                                <td><a href="{{route('backend.orders.detail',$order->vocherNo)}}" class="btn btn-sm btn-primary">Detail</a></td>
                                          </tr>
                                          @endif
                                          @endforeach

                                           
                                        </tbody>
                                    </table>

                                    
                                </div>
                            </div>
                        </div>
</main>  



@endsection
