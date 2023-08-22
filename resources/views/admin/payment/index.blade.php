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
                                                <th>Logo</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Logo</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($payments as $payment)

                                                <tr>
                                                    <td>{{$payment->id}}</td>
                                                    <td>{{$payment->name}}</td>
                                                    <td>{{$payment->logo}}</td>   
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