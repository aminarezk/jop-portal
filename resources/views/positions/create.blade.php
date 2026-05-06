@extends('layouts.app')
@include('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('positions.store')}}" enctype="multipart/form-data" method="POST">
                @csrf

                <input type="text" class="form-control mb-4" name="title_ar"  placeholder="العنوان">
                                    @error('title_ar')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                <input type="text" class="form-control mb-4" name="title_en"  placeholder="title">
                                    @error('title_en')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

              <input type="text" class="form-control mb-4" name="description_ar"  placeholder="الوصف">
                                    @error('description_ar')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

              <input type="text" class="form-control mb-4" name="description_en"  placeholder="description">
                                    @error('description_en')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

             <input type="number" class="form-control mb-4" name="salary"  placeholder="salary">
                                    @error('salary')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

            <input type="text" class="form-control mb-4" name="location"  placeholder="location">
                                    @error('location')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                
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

 <label>Category</label>
                <select name="category_id" class="form-control mb-4">
                    @foreach ($category as $item)
                    <option></option>
                    <option value="{{$item->id}}">
                     {{$item->name}}
                    </option> 
                    @endforeach
                </select>
                                    @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<select name="status" class="form-control mb-4">
    <option value="select status">select status</option>
    <option value="open">open</option>
    <option value="close">close</option>
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