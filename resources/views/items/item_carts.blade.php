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

    </div>

@endsection

@section('script')

<!-- <script>
    getItem();
</script> -->
@endsection