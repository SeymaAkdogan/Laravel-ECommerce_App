@extends("base")
@section("content")

<style>
    .list-group-item {
        background-color: #e5e7eb;
    }
</style>
<div class="row">
    <div class="col-md-4 bg-gray-200 h-96">

        <div class="container pt-6">
            <form method="GET" action="/products">
                <div class="form-group mb-3">
                    <label for="category" class="mb-2 uppercase font-semibold">Category</label>
                    <select class="uppercase form-control hover:shadow-lg focus:shadow-lg active:shadow-lg hover:shadow-gray-900 focus:shadow-gray-900 active:shadow-gray-900 hover:border-gray-900 focus:border-gray-900" id="category" name="category">
                        <option value="">CHOOSE</option>

                        @foreach($categories as $category)
                            @if(isset($selected_category))
                                @if($selected_category == $category['category_id'])
                                <option selected value="{{$category['category_id']}}" class="uppercase">{{$category['name']}}</option>
                                @else
                                <option value="{{$category['category_id']}}" class="uppercase">{{$category['name']}}</option>
                                @endif
                            @else
                            <option value="{{$category['category_id']}}" class="uppercase">{{$category['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price" class="mb-2 uppercase font-semibold">Price</label>
                    <div class="row">
                        <div class="col-md-4">
                            @if(isset($min_price))
                            <input type="text" class="form-control hover:shadow-lg focus:shadow-lg active:shadow-lg hover:shadow-gray-900 focus:shadow-gray-900 active:shadow-gray-900 hover:border-gray-900 focus:border-gray-900" name="min" value="{{$min_price}}">
                            @else
                            <input type="text" class="form-control hover:shadow-lg focus:shadow-lg active:shadow-lg hover:shadow-gray-900 focus:shadow-gray-900 active:shadow-gray-900 hover:border-gray-900 focus:border-gray-900" name="min" placeholder="min">
                            @endif
                        </div>
                        <div class="col-md-1">
                            -
                        </div>
                        <div class="col-md-4">
                            @if(isset($max_price))
                            <input type="text" class="form-control hover:shadow-lg focus:shadow-lg active:shadow-lg hover:shadow-gray-900 focus:shadow-gray-900 active:shadow-gray-900 hover:border-gray-900 focus:border-gray-900" name="max" value="{{$max_price}}">
                            @else
                            <input type="text" class="form-control hover:shadow-lg focus:shadow-lg active:shadow-lg hover:shadow-gray-900 focus:shadow-gray-900 active:shadow-gray-900 hover:border-gray-900 focus:border-gray-900" name="max" placeholder="max">
                            @endif
                        </div>
                    </div>
                </div>

                <button class="btn px-44 text-white uppercase mt-6 mb-3 hover:shadow-none focus:shadov-orange-400" style="background-color: #f75e27;">filter</button>
            </form>
            <div class="d-flex justify-content-end">
                <a href="/products" class="text-md text-blue-600 focus:text-blue-700 hover:text-blue-700 underline">
                    Clear Filter  <i class="fas fa-trash-alt"></i>
                </a>
            </div>

        </div>
    </div>

    <div class="col-md-8">
        <div class="row px-3">
            @foreach($products as $product)
            <div class="col-md-4" style="border: 1px solid white;border-left: none;border-color: #B3B3B3;">
                <div class="card my-5 mx-4" style="border: none;">

                    <a href="/product/{{$product['product_id']}}" class="">
                        <img src="/image/{{$product['imageUrl']}}" class="card-img-top section" alt="..." style="height: 180px;">
                        <p class="text-gray-800 text-center text-lg pt-4 uppercase">{{$product['name']}}</p>
                        <p class="text-left text-md mt-2 uppercase text-gray-700" >{{$product['price']}} $</p>
                    </a>
                    <div class="flex justify-between text-black text-2xl">
                        <a href="/add-to-fav/{{$product['product_id']}}"><i class="fas fa-heart"></i></a>
                        <a href="/add-to-cart/{{$product['product_id']}}"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>






@endsection
