@extends('layouts.app')

@section('contentheader_title')
    Subcategorías
@endsection

@section('htmlheader_title')
    Actualizar Subcategoría
@endsection

@section('breadcrumb')
    <li><a href="{{route('subcategories.index')}}"><i class="fa fa-dashboard"></i> @yield('contentheader_title')</a></li>
    <li><a href="{{route('subcategories.edit',['category' =>$subcategory->uuid])}}">Actualizar {{$subcategory->name}}</a></li>
@endsection

@section('main-content')

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">@yield('htmlheader_title')</div>

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
                <form role="form" method="post" action="{{route('subcategories.update',['uuid'=>$subcategory->uuid])}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="default">Nombre</label>
                            <input type="input" name="name" value="{{$subcategory->name}}" class="form-control"
                                   id="default" placeholder="">
                        </div>
                        <div class="form-group">
                        <label for="type">Categoría</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option <?=($category->id==$subcategory->category_id) ? "selected":""; ?> class="form-control" value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
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