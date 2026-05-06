@extends('layouts.app')
@include('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('aps.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                
                <label>User</label>
                <select name="user_id" class="form-control mb-4">
                    @foreach ($user as $item)
                    <option></option>
                    <option value="{{$item->id}}">                       
                         {{$item->name}}
                        </option> 
                    @endforeach
                </select>
                                    @error('user_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

 <label>Position</label>
                <select name="position_id" class="form-control mb-4">
                    @foreach ($position as $item)
                    <option></option>
                    <option value="{{$item->id}}">
                     {{$item->title}}
                    </option> 
                    @endforeach
                </select>
                                    @error('position_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<select name="status" class="form-control mb-4">
    <option value="select status">select status</option>
    <option value="pending">pending</option>
    <option value="accepted">accepted</option>
    <option value="rejected">rejected</option> 
</select>
                                    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                <input type="submit" class="btn btn-success btn-block" value="Create">

            </form>
        </div>
    </div>
</div>
@endsection