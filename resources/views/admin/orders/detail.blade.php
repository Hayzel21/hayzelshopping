@extends ('layouts.admin')
@section ('content')

<main>
<div class="container-fluid px-4">
                <div class="my-5">
                        <h1 class="my-4 d-inline text-danger">Order Details</h1>
                        <a href="{{route('backend.orders.index')}}" class="btn btn-primary float-end">Return</a>
                        
                </div>
                            <div class="card mb-4">
                                
                                <div class="card-body">
                                    <h3 class="text-center mb-2">Hayzel Shopping</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Name-{{$ordersFirst->user->name}}</p>
                                            <p>Phone-{{$ordersFirst->user->phoneNumber}}</p>
                                            <p>Voucher No-{{$ordersFirst->vocherNo}}</p>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <p>Date-{{$ordersFirst->created_at->format('M d,Y')}}</p>
                                            <p>Payment Method-{{$ordersFirst->payment->name}}</p>
                                            <p>Address-{{$ordersFirst->user->address}}</p>
                                        </div>

                                    </div>
                                    <table id="" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Item Name</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $i = 1;
                                                $total = 0;
                                            @endphp
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$order->item->name}}</td>
                                                    <td>{{$order->item->price}}</td>
                                                    <td>{{$order->item->discount}}</td>
                                                    <td>{{$order->qty}}</td>
                                                    <td>{{$order->qty * ($order->item->price -(($order->item->discount/100) * $order->item->price));}}</td>
                                                </tr>
                                            @php
                                                $total += $order->qty * ($order->item->price -(($order->item->discount/100) * $order->item->price));
                                            @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="5" class="text-end">Total</td>
                                                <td>{{$total}}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="row">

                                        <div class="offset-md-4 col-md-4">
                                            <img src="{{$ordersFirst->paymentSlip}}" class="img-fluid" alt="">
                                        </div>

                                        <form class="d-grid gap-2 my-3" action="{{route('backend.orders.status',$ordersFirst->vocherNo)}}" method="post">
                                            @csrf
                                            {{method_field('put')}}
                                            @if($ordersFirst->status == 'Pending')
                                                <input type="hidden" name="status" id="" value="Accept">
                                                <button class="btn btn-primary" type="submit">Order Accept</button>
                                            @elseif($ordersFirst->status == 'Accept')
                                                <input type="hidden" name="status" id="" value="Complete">
                                                <button class="btn btn-primary" type="submit">Order Complete</button>
                                            @else

                                            @endif

                                            
                                        </form>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
</main>  



@endsection
