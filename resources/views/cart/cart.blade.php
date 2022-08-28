@extends('base')
@section('content')

<div class="container">
    <div class="row mt-6">
    @if($total_price == 0)
        <div class="col-md-12">
            <div class="mb-3">
                    <a href="/products" class="uppercase text-sm underline py-2 px-2 ">
                        <i class="fas fa-arrow-circle-left"></i> Start Shopping
                    </a>
            </div>
            <div class="alert alert-warning uppercase text-center d-flex justify-center">
                Cart is empty
            </div>
        </div>
    @else
        <div class="col-md-8">
            <table class="table bg-white">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                    @foreach($products as $product)
                    @if($cart['product_id']== $product['product_id'])
                    <tr>
                        <th><img src="/image/{{$product['imageUrl']}}" alt="" class="h-24"></th>
                        <td>{{$product['name']}}</td>
                        <td>
                            <ul class="list-group list-group-horizontal">
                                <a href="/update-to-cart/minus/{{$product['product_id']}}">
                                    <li class="list-group-item" style="color:#FF4500;">
                                        -
                                    </li>
                                </a>
                                <li class="list-group-item">{{$cart['quantity']}}</li>
                                <a href="/update-to-cart/plus/{{$product['product_id']}}">
                                    <li class="list-group-item" style="color:#FF4500;">
                                        +
                                    </li>
                                </a>
                            </ul>
                        </td>
                        <td>{{$product['price'] * $cart['quantity']}}</td>
                        <td><a href="/delete-to-cart/{{$cart['id']}}">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3 mt-3">
            <div class="card py-2">
                <div class="card-body">
                    <h5 class="card-title font-medium text-xl ">Cart Summary</h5>
                    <hr>
                    <p class="card-text mt-2">
                        <div class="flex justify-between">
                            <p class="uppercase">Product Total : </p>
                            <p>{{$total_price}} $</p>
                        </div>
                    </p>
                    <p class="card-text mt-2">
                        <div class="flex justify-between">
                            <p class="uppercase">Shipping cost : </p>
                            <p>10 $</p>
                        </div>
                    </p>
                </div>
                <div class="card-footer text-right">
                {{$total_price + 10}}  $
                </div>
            </div>
        </div>
        @endif
    </div>
</div>



@endsection
