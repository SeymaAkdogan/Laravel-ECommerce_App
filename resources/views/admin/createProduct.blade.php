@extends("base")
@section("content")


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="/admin/create-product">
                @csrf
                <div class="form-group mb-3 font-medium">
                    <label for="name">PRODUCT NAME</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group mb-3 font-medium">
                    <label for="price" class="uppercase">Price</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group mb-3 font-medium">
                    <label for="category" class="uppercase">Category</label>
                    <select class="form-select uppercase" id="category" name="category" >

                        @foreach($categories as $category)
                        <option value="{{$category['category_id']}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3 font-medium">
                    <label for="description" class="uppercase">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>
                <div class="form-group mb-3 font-medium">
                    <label for="imageUrl" class="uppercase mr-2">Image</label>
                    <input type="file" class="form-control-file" id="imageUrl" name="imageUrl">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn text-white text-xl uppercase px-12" style="background-color: #ff6700;">save</button>
                    </div>
            </form>
        </div>
    </div>
</div>


@endsection
