@extends('layouts.app')
@extends('temp.navbar')
@section('content')

<div class="container pt-3 mt-3">
    <div class="row d-flex">
        <div class="col m-auto">
            <h4 class="text-center">{{__('language.Detailes Of')}} {{ __('language.Position') }} 
                <span class="badge badge-primary"> 1</span>
            </h4>
            <table class="table table-dark text-center">
                <thead>
                    <tr>
                        <th>{{__('language.Id')}}</th>
                        <th>{{__('language.Title')}}</th>
                        <th>{{__('language.Description')}}</th>
                        <th>{{__('language.Salary')}}</th>
                        <th>{{__('language.Location')}}</th>
                        <th>{{__('language.user_id')}}</th>
                        <th>{{__('language.category_id')}}</th>
                        <th>{{__('language.Status')}}</th>
                        <th>{{__('language.Created_at')}}</th>
                        <th>{{__('language.Updated_at')}}</th>
                        <th>{{__('language.Oprations')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$position->id}}</td>
                        <td>{{app()->getLocale() == 'ar' ? $position->title_ar : $position->title_en}}</td>
                        <td>{{app()->getLocale() == 'ar' ? $position->description_ar : $position->description_en}}</td>
                        <td>{{$position->salary}}</td>
                        <td>{{$position->location}}</td>
                        <td>{{$position->user_id}}</td>
                        <td>{{$position->category_id}}</td>
                        <td>{{$position->status}}</td>
                        <td>{{$position->created_at}}</td>
                        <td>{{$position->updated_at}}</td>
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