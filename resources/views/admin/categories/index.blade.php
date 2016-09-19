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
                    <div class="col-sm-3 col-md-2 col-xs-5 col-lg-1 pull-right">
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
                                <div class="col-sm-1 col-md-1 col-xs-2 col-lg-1">
                                    <a title="Actualizar"
                                       href="{{route('categories.edit',['category'=>$category->uuid])}}">
                                        <span class="badge bg-blue"><i class="fa fa-pencil"></i></span>
                                    </a>
                                </div>
                                <div class="col-sm-1 col-md-1 col-xs-2 col-lg-1">
                                    <form class="form-inline" method="post" id="form-delete-{{$category->uuid}}"
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
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $categories->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection