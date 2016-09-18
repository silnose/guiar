@extends('layouts.app')

@section('contentheader_title')
    Subcategorías
@endsection

@section('htmlheader_title')
    Listado Subcategorías
@endsection

@section('breadcrumb')
    <li><a href="{{route('subcategories.index')}}"><i class="fa fa-dashboard"></i> @yield('contentheader_title')</a></li>
@endsection

@section('main-content')

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">@yield('htmlheader_title')</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-offset-11 col-xs-1 col-sm-1 clearfix">
                        <a href="{{route('subcategories.create')}}" type="button" class="btn btn-block btn-success"><i
                                    class="fa  fa-plus"></i> Crear</a>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Acción</th>
                    </tr>
                    @foreach($subcategories as $subcategory)
                        <tr>
                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td>
                                <div class="col-xs-4 col-sm-3 clearfix ">
                                    <a title="Actualizar"
                                       href="{{route('subcategories.edit',['category'=>$subcategory->uuid])}}">
                                        <span class="badge bg-blue"><i class="fa fa-pencil"></i></span>
                                    </a>
                                    <form style="float: right;" method="post" id="form-delete-{{$subcategory->uuid}}"
                                          action="{{route('subcategories.destroy',['category'=>$subcategory->uuid])}}">
                                        <a class="gdelete" title="Eliminar" href="#" data-id="{{$subcategory->uuid}}"
                                           data-route="{{route('subcategories.destroy',['category'=>$subcategory->uuid])}}">
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