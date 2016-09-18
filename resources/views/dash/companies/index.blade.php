@extends('layouts.app')

@section('contentheader_title')
    Categorías
@endsection

@section('htmlheader_title')
    Listado Categoría
@endsection

@section('breadcrumb')
    <li><a href="{{route('categories.index')}}"><i class="fa fa-dashboard"></i> @yield('contentheader_title')</a></li>
@endsection

@section('main-content')

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">@yield('htmlheader_title')</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-offset-11 col-xs-1 col-sm-1 clearfix">
                        <a href="{{route('categories.create')}}" type="button" class="btn btn-block btn-success"><i
                                    class="fa  fa-plus"></i> Crear</a>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <div class="col-xs-4 col-sm-3 clearfix ">
                                    <a title="Actualizar"
                                       href="{{route('categories.edit',['category'=>$category->uuid])}}">
                                        <span class="badge bg-blue"><i class="fa fa-pencil"></i></span>
                                    </a>
                                    <form style="float: right;" method="post" id="form-delete-{{$category->uuid}}"
                                          action="{{route('categories.destroy',['category'=>$category->uuid])}}">
                                        <a class="gdelete" title="Eliminar" href="#" data-id="{{$category->uuid}}"
                                           data-route="{{route('categories.destroy',['category'=>$category->uuid])}}">
                                            <span class="badge bg-red"><i class="fa fa-remove"></i></span></a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

@endsection