@extends('layouts.frontend');
@section('content');

    <div class="container my-2">
        <h3 class="text-center py-5 text-danger display-6">My Shopping Carts</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Item Discount</th>
                    <th>Item Qty</th>
                    <th>Amount</th>
                </tr>
            </thead>


            <tbody id="cartTbody">
                <tr>


                </tr>
            </tbody>
        </table>
    </div>

    <div class="d-grid gap-2">
        @guest

            <a href="/login" class="btn btn-primary" type="button">Login</a>
        @else
       
            <form action="" class="row" id="paymentForm" enctype= "multipart/form-data">


                @csrf

                <div class="col-md-6">
                    <label for="paymentSlip" class="text-success">Payment Slip</label>
                    <input type="file" name="paymentSlip" id="paymentSlip" accept="image/*" class="form-control my-2">

                </div>


                <div class="col-md-6">
                    <label for="paymentMethod" class="text-warning">Payment Method</label>
                    <select name="paymentMethod" id="paymentMethod" class="form-select my-2">
                        <option value="">Choose Payment Method</option>
                        @foreach($payments as $payment)

                            <option value="{{$payment->id}}">{{$payment->name}}</option>
                        @endforeach
                    </select>
                </div>

                     <button class="btn btn-success my-4" type="submit" id="orderNow">Order Now</button>
            </form>
        @endguest

        
    </div>

    </div>


    <!-- Success Model -->
 

    <div class="modal fade" id="orderSuccessModal" tabindex="-1" aria-labelledby="orderSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="orderSuccessModalLabel">Item Order Success</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                <p class="text-success fs-1"><i class="bi bi-check-circle-fill"></i></p>
                    <p>Your Order is Successful.</p>
                </div>
                
            </div>
            <div class="modal-footer">
                
                <a href="/" class="btn btn-primary">Ok</a>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        // $('#orderNow').click(function(){
        //     let itemString = localStorage.getItem('hayzelShop_items');

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.post("{{route('orderNow')}}",{data:itemString},function(respond){
        //         console.log(respond);
        //     })
        // });

        $(document).ready(function(){
            $('#paymentForm').on('submit',function(e){
                e.preventDefault();
                let formData = new FormData(this);
                // console.log($formData);

                let itemString = localStorage.getItem('hayzelShop_items');
                formData.append('orderItems',itemString);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    type: 'POST',
                    url : "{{route('orderNow')}}",
                    data : formData,
                    processData : false,
                    contentType : false,
                    success: function(response){
                        // console.log(response);
                        if(response){
                           

                            
                            $('#orderSuccessModal').modal('show');
                            localStorage.clear();

                       
                        }
                    },

                    error:function(xhr,status,error){
                        console.log(xhr.responseText);
                    }
                })

            })
        })
    </script>
@endsection