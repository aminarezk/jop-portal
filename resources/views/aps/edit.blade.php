@extends('layouts.app')
@extends('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('aps.update',$application->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
  
          <select name="user_id" class="form-control mb-4">
            @foreach ($user as $item)
                <option value="{{$item->id}}" {{ $application->user_id == $item->id ? 'selected' : '' }}>
                    {{$item->name}}</option>   
            @endforeach
                 
        </select> 
                                    @error('user_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


  <select name="position_id" class="form-control mb-4">
    @foreach ($position as $item)
        
    @endforeach
                <option value="{{$item->id}}" {{ $application->position_id == $item->id ? 'selected' : '' }}>
                    {{$item->title}}</option>    
        </select> 
                                   @error('position_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<select name="status" class="form-control mb-4">
                <option value="{{$application->status}}" {{ $application->status == 'pending' ? 'selected' : '' }}>pending</option>    
                <option value="{{$application->status}}" {{ $application->status == 'accepted' ? 'selected' : '' }}>accepted</option>    
                <option value="{{$application->status}}" {{ $application->status == 'rejected' ? 'selected' : '' }}>rejected</option>    
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