@extends('layouts.app')
@extends('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('positions.update',$position->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <input type="text" class="form-control mb-4" name="title_ar" value="{{$position->title_ar}}">
                                    @error('title_ar')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                <input type="text" class="form-control mb-4" name="title_en" value="{{$position->title_en}}">
                                    @error('title_en')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


                <input type="text" class="form-control mb-4" name="description_ar" value="{{$position->description_ar}}">
                                    @error('description_ar')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


                <input type="text" class="form-control mb-4" name="description_en" value="{{$position->description_en}}">
                                    @error('description_en')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


               <input type="text" class="form-control mb-4" name="salary" value="{{$position->salary}}">
                                    @error('salary')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

               <input type="text" class="form-control mb-4" name="location" value="{{$position->location}}">
                                    @error('location')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

          <select name="user_id" class="form-control mb-4">
            @foreach ($user as $item)
                <option value="{{$item->id}}" {{ $position->user_id == $item->id ? 'selected' : '' }}>
                    {{$item->name}}</option>    
          @endforeach
        </select> 
                                    @error('user_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


  <select name="category_id" class="form-control mb-4">
            @foreach ($category as $item)
                <option value="{{$item->id}}" {{ $position->category_id == $item->id ? 'selected' : '' }}>
                    {{$item->name}}</option>    
          @endforeach
        </select> 
                                   @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<select name="status" class="form-control mb-4">
                <option value="{{$position->status}}" {{ $position->status == 'pending' ? 'selected' : '' }}>pending</option>    
                <option value="{{$position->status}}" {{ $position->status == 'accepted' ? 'selected' : '' }}>accepted</option>    
                <option value="{{$position->status}}" {{ $position->status == 'rejected' ? 'selected' : '' }}>rejected</option>    
        </select> 
                                   @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


                <input type="submit" class="btn btn-success btn-block" value="Update">

            </form>
        </div>
    </div>
</div>
@endsection