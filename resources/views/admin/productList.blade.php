@extends("base")
@section("content")

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Is Delete</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <th><img src="/image/{{$product['imageUrl']}}" alt="" class="h-24"></th>
                <td>{{$product['name']}}</td>
                <td>{{$product['price']}}</td>
                <td>
                @if($product['deleted_at'] != NULL)
                <input type="checkbox" class="form-check-input" id="is_delete" checked disabled>
                @else
                <input type="checkbox" class="form-check-input" id="is_delete" disabled>
                @endif
                </td>
                <td>
                    <a href="/admin/edit-product/{{$product['product_id']}}"><i class="fas fa-edit"></i></a>
                    <a href="/admin/delete-product/{{$product['product_id']}}"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>


@endsection
