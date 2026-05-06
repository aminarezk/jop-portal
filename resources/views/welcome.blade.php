@extends('layouts.app')
@include('temp.navbar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>jop portal</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
          
        <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                  
                    @endauth
                </div>
            @endif
            <div class="content">
<div class="container">
    <p class="text-center mt-3 text-muted">
    {{__('language.Find your dream job easily 🚀')}}
</p>

    <h2 class="text-center mb-4">{{__('language.Job Search')}}</h2>

    <!-- Search Form -->
    <form method="GET" action="{{ route('jobs') }}">
        <input 
            type="text" 
            name="search" 
            value="{{ $search ?? '' }}"
            placeholder="Search jobs..."
            class="form-control mb-3"
        >
        <button class="btn btn-primary">{{__('language.Search')}}</button>
    </form>
</div>
            </div>
         </div>

    </body>
</html>
