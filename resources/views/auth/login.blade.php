@extends('base')
@section('content')

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card " style="width: 500px;">
            <div class="card-header border-bottom-none">
                <h1 class="uppercase text-2xl font-bold my-3">Login</h1>
            </div>
            <div class="card-body">
                <form method='POST' action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" class="form-control" name='username' />

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name='password' />
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn text-white text-xl uppercase px-12" style="background-color: #ff6700;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
