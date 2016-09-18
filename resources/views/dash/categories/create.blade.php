@extends('layouts.app')

@section('contentheader_title')
    Categorías
@endsection

@section('htmlheader_title')
    Crear Categoría
@endsection

@section('breadcrumb')
    <li><a href="{{route('categories.index')}}"><i class="fa fa-dashboard"></i> @yield('contentheader_title')</a></li>
    <li><a href="{{route('categories.create')}}">Crear</a></li>
@endsection



@section('main-content')

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Crear de categorías</div>

            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" method="post" action="{{route('categories.store')}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="default">Nombre</label>
                            <input type="input" name="name" class="form-control" id="default" placeholder="">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection