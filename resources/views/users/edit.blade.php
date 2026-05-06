@extends('layouts.app')
@extends('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action={{route('users.update',$result->id)}} enctype="multipart/form-data" method="POST">
                @csrf
                <input type="text" class="form-control mb-4" name="name" value="{{$result->name}}">
                                    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <input type="email" class="form-control mb-4" name="email" value="{{$result->email}}">
                                    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <input type="password" class="form-control mb-4" name="password" value="{{$result->password}}">
                                    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<select name="role" class="form-control">
    <option value="user" {{$result->role=='user'? 'selectes' :''}}>User</option>
    <option value="admin" {{$result->role == 'admin'? 'selected':''}}>Admin</option>
</select>
                                    @error('role')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <input type="text" class="form-control mb-4" name="phone" value="{{$result->phone}}">
                                    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                <input type="submit" class="btn btn-success btn-block" value="Update">

            </form>
        </div>
    </div>
</div>
@endsection