@extends('layouts.app')
@extends('temp.navbar')
@section('content')

<div class="container pt-3 mt-3">
    <div class="row d-flex">
        <div class="col m-auto">
            <h4 class="text-center">{{__('language.Detailes Of')}} {{ __('language.Category') }} 
                <span class="badge badge-primary"> 1</span>
            </h4>
            <table class="table table-dark text-center">
                <thead>
                    <tr>
                        <th>{{__('language.Id')}}</th>
                        <th>{{__('language.Name')}}</th>
                        <th>{{__('language.Created_at')}}</th>
                        <th>{{__('language.Updated_at')}}</th>
                        <th>{{__('language.Oprations')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                          <td>
                              <div class="d-flex flex-column align-items-center">
                               <a href={{route('home')}} class="btn btn-success">
                                <i class="fa-solid fa-house"></i>{{__('language.home')}}
                               </a>
                                    </div>
                                 </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection