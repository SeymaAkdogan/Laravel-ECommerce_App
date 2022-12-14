@extends('base')
@section('content')

<div class="container mt-3">
    <div class="row" style="margin-top: 75px;">
        <h1>My Profile</h1>
         <hr />
        <div class="col-md-8 mb-3">
            <form method='POST' action="/profile">
                @csrf
                @isset($error)<div class='alert alert-danger'>{{ $error }}</div>@endisset

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="username" class="form-control" name='username' value='{{ Auth::user()->username }}' disabled/>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name='email' value='{{ Auth::user()->email }}'/>
                </div>

                <div class='row mb-3'>
                    <div class='col'>
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" name='firstname' value='{{ Auth::user()->firstname }}'/>
                    </div>
                    <div class='col'>
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" name='lastname' value='{{ Auth::user()->lastname }}'/>
                    </div>
                </div>
                <div class='row mb-3'>
                    <div class='col'>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name='password'/>
                    </div>
                    <div class='col'>
                        <label for="repassword" class="form-label">RePassword</label>
                        <input type="password" class="form-control" name='repassword'/>
                    </div>
                </div>



                <button type="submit" class="btn text-white text-xl uppercase px-12" style="background-color: #ff6700;">Update</button>
            </form>
        </div>
        <div class="col-md-4 mb-3">
            <img src="/image/avatar.png" alt="" style="height: 300px;">
        </div>
    </div>



</div>

@endsection
