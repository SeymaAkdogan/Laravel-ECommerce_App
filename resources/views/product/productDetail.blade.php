@extends("base")
@section("content")

<div class="container mx-auto mt-8">
    <div class="row mb-3">
        <div class="col-md-5">
            <img src="/image/{{$product['imageUrl']}}" class="card-img-top section" style="height: 350px;">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h3 class="text-2xl font-semibold uppercase">{{$product['name']}}</h3>
            <div class="my-3">
                <p class="text-xl mb-4" style="color: #ff6700;">{{$product['price']}} $</p>
                <p>{{$product['description']}}</p>
            </div>
            <div class="d-flex justify-end">

                <a href="/add-to-cart/{{$product['product_id']}}" class="btn btn-block text-xl text-white hover:shadow-none focus:shadow-none" style="background-color: #ff6700;">
                    Add To Cart <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </div>

    <hr class="my-3">
    <h4 class="uppercase text-md font-bold">Similar Product</h4>
    <div class="">
        <div class="row">
            @foreach($similar_products as $similar_product)
            <div class="col-md-3">
                <div class="card my-3 mx-4" style="border: none;">
                    <a href="/product/{{$similar_product['product_id']}}" class="">
                        <img src="/image/{{$similar_product['imageUrl']}}" class="card-img-top section" alt="..." style="height: 180px;">
                        <p class="text-gray-800 text-center text-lg pt-4 uppercase">{{$similar_product['name']}}</p>
                        <p class="text-left text-md mt-2 uppercase text-gray-700" >{{$similar_product['price']}} $</p>
                    </a>
                    <div class="flex justify-between text-black text-2xl">
                        <a href="/add-to-fav/{{$similar_product['product_id']}}"><i class="fas fa-heart"></i></a>
                        <a href="/add-to-cart/{{$similar_product['product_id']}}"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>




@endsection
