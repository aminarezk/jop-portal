@extends('layouts.app')
@include('temp.navbar')
@section('content')
<div class="container justify-content-center">
    <div class="row d-flex ">
        <div class="col-md-6">

            <div class="card" >
                <div class="card-header">{{ __('language.User') }} <span class="badge badge-primary">{{$result->count()}}</span></div>

                <div class="card-body">
                    @if (session('mesg'))
                         <h4 class="text-center alert alert-success">{{session('mesg')}}</h4>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>{{__('language.Id')}}</th>
                                <th>{{__('language.Name')}}</th>
                                <th>{{__('language.Email')}}</th>
                                <th>{{__('language.Oprations')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                 <td>
                                <div class="d-flex align-items-center  gap-2 justify-content-center">
                               <a href={{route('users.show',$item->id)}} class="btn btn-success btn-sm">
                               <i class="fa-solid fa-eye"></i>{{__('language.show')}}
                                  </a>
                                 
                                <a href={{route('users.edit',$item->id)}} class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-trash"></i>{{__('language.edit')}}
                                   </a>
                                <form method="POST" action={{route('users.destroy',$item->id)}} class="m-0 p-0">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-pencil"></i>{{__('language.delete')}}</button>
                                  </form>

                                </div>
                                 </td>
        
                            </tr>
                                
                            @endforeach
                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card" >
                <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-header">{{ __('language.Category') }} <span class="badge badge-primary">{{$category->count()}}</span></div>
                <a href={{route('categories.create')}} class="btn btn-success">{{__('language.Create Category')}}</a>
                </div>
                <div class="card-body">
                    @if (session('mesg_cate'))
                         <h4 class="text-center alert alert-success">{{session('mesg_cate')}}</h4>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>{{__('language.Id')}}</th>
                                <th>{{__('language.Name')}}</th>
                                <th>{{__('language.Oprations')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                 <td>
                                <div class="d-flex align-items-center  gap-2 justify-content-center">
                               <a href={{route('categories.show',$item->id)}} class="btn btn-success btn-sm">
                               <i class="fa-solid fa-eye"></i>{{__('language.show')}}
                                  </a>
                                 
                                <a href={{route('categories.edit',$item->id)}} class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-trash"></i>{{__('language.edit')}}
                                   </a>
                                <form method="POST" action="{{route('categories.destroy',$item->id)}}" class="m-0 p-0">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-pencil"></i>{{__('language.delete')}}</button>
                                  </form>

                                </div>
                                 </td>
        
                            </tr>
                                
                            @endforeach
                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="card" >
                <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-header">{{ __('language.Position') }} <span class="badge badge-primary">{{$position->count()}}</span></div>
                <a href={{route('positions.create')}} class="btn btn-success">{{__('language.Create Posation')}}</a>
                </div>
                <div class="card-body">
                    @if (session('mesg_pos'))
                         <h4 class="text-center alert alert-success">{{session('mesg_pos')}}</h4>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>{{__('language.Id')}}</th>
                                <th>{{__('language.Title')}}</th>
                                <th>{{__('language.Salary')}}</th>
                                <th>{{__('language.Oprations')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($position as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->salary}}</td>
                                 <td>
                                <div class="d-flex align-items-center  gap-2 justify-content-center">
                               <a href={{route('positions.show',$item->id)}} class="btn btn-success btn-sm">
                               <i class="fa-solid fa-eye"></i>{{__('language.show')}}
                                  </a>
                                 
                                <a href={{route('positions.edit',$item->id)}} class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-trash"></i>{{__('language.edit')}}
                                   </a>
                                <form method="POST" action="{{route('positions.destroy',$item->id)}}" class="m-0 p-0">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-pencil"></i>{{__('language.delete')}}</button>
                                  </form>

                                </div>
                                 </td>
        
                            </tr>
                                
                            @endforeach
                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
                    </div>




            <div class="col-md-6">
                        <div class="card" >
                <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-header">{{ __('language.Application') }} <span class="badge badge-primary">{{$application->count()}}</span></div>
                <a href={{route('aps.create')}} class="btn btn-success">{{__('language.Create Application')}}</a>
                </div>
                <div class="card-body">
                    @if (session('mesg_aps'))
                         <h4 class="text-center alert alert-success">{{session('mesg_aps')}}</h4>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>{{__('language.Id')}}</th>
                                <th>{{__('language.Status')}}</th>
                                <th>{{__('language.Oprations')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($application as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->status}}</td>
                                 <td>
                                <div class="d-flex align-items-center  gap-2 justify-content-center">
                               <a href={{route('aps.show',$item->id)}} class="btn btn-success btn-sm">
                               <i class="fa-solid fa-eye"></i>{{__('language.show')}}
                                  </a>
                                 
                                <a href={{route('aps.edit',$item->id)}} class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-trash"></i>{{__('language.edit')}}
                                   </a>
                                <form method="POST" action="{{route('aps.destroy',$item->id)}}" class="m-0 p-0">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-pencil"></i>{{__('language.delete')}}</button>
                                  </form>

                                </div>
                                 </td>
        
                            </tr>
                                
                            @endforeach
                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
                    </div>
        




































    </div>
</div>  
@endsection
