@extends('layouts.app')
@include('temp.navbar')
@section('content')
<div class="container mt-5">

    <h2 class="text-center mb-4">{{__('language.Search Results')}}</h2>

    @if(isset($position) && $position->count() > 0)

        @foreach ($position as $item)
            <div class="card mb-3 p-3">
                <h5>{{ $item->title }}</h5>
                <p>{{ $item->description}}</p>
                <span><strong>{{__('language.Salary')}}:</strong> {{ $item->salary }}</span>

                @auth
                    <form action="{{ route('aps.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="cv" class="form-control">
                        <input type="hidden" name="position_id" value="{{ $item->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="status" value="pending">

                        <button type="submit" class="btn btn-success mt-2">
                            {{__('language.Apply')}}
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-warning mt-2">
                        {{__('language.Login To Apply')}}
                    </a>
                @endauth

            </div>
        @endforeach

    @else
        <p class="text-danger text-center">No results found</p>
    @endif

</div>
@endsection