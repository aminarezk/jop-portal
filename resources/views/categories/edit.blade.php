@extends('layouts.app')
@extends('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action={{route('categories.update',$category->id)}} enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
              
                <input type="text" class="form-control mb-4" name="name_ar" value="{{$category->name_ar}}">
                                    @error('name_ar')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                <input type="text" class="form-control mb-4" name="name_en" value="{{$category->name_en}}">
                                    @error('name_en')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                <input type="submit" class="btn btn-success btn-block" value="Update">

            </form>
        </div>
    </div>
</div>
@endsection