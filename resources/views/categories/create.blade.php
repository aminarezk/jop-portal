@extends('layouts.app')
@include('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('categories.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                
                <input type="text" class="form-control mb-4" name="name_ar"  placeholder="الاسم">
                                    @error('name_ar')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <input type="text" class="form-control mb-4" name="name_en"  placeholder="name">
                                    @error('name_en')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                <input type="submit" class="btn btn-success btn-block" value="Create">

            </form>
        </div>
    </div>
</div>
@endsection