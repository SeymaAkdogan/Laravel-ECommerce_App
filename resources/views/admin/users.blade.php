@extends('base')
@section('content')

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Is Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->firstname}} {{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form action="/admin/edit-user/{{$user['id']}}" method="post">
                        @csrf
                        @if($user->role == 'admin')
                        <input type="checkbox" class="form-check-input" id="is_admin" name="role" checked>
                        @else
                        <input type="checkbox" class="form-check-input" id="is_admin" name="role">
                        @endif
                        <button>Is Admin</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>



@endsection
