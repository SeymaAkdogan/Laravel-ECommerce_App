@extends('base')
@section('content')


<div class="container">
    <div class="row mt-6">
        @if(count($favs)>0)
            <h3 class="text-xl text-black font-medium">FAVORITES</h3>
            <hr>
            @foreach($favs as $product)
            <div class="col-md-3">
                <div class="card mt-3" style="width: 18rem;border:1px solid darkgray;">
                    <a href="/delete-to-favList/{{$product['product_id']}}" class="flex justify-end text-md text-gray-600">
                        <i class="fas fa-times"></i>
                    </a>
                    <img src="/image/{{$product['imageUrl']}}" class="card-img-top h-48 px-2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title uppercase mb-2 text-xl" style="color:#ff6700;">{{$product['name']}}</h5>
                        <p class="card-text mb-2 text-lg font-bold">{{$product['price']}} $</p>
                        <div class="flex justify-end text-md">

                            <a href="/add-to-cart/{{$product['product_id']}}" class="btn" style="border:1px solid #ff6700;color:#ff6700;">
                                Add To Cart<i class="fas fa-shopping-cart"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="mb-3">
                <a href="/products" class="uppercase text-sm underline py-2 px-2 ">
                    <i class="fas fa-arrow-circle-left"></i> Start Shopping
                </a>
            </div>
            <div class="alert alert-warning uppercase text-center d-flex justify-center">
                Your favorite list is empty

            </div>
        @endif
    </div>
</div>


@endsection
