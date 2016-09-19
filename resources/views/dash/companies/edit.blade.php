@extends('layouts.app')

@section('contentheader_title')
    Empresas
@endsection

@section('htmlheader_title')
    Actualizar Empresa
@endsection

@section('breadcrumb')
    <li><a href="{{route('companies.index')}}"><i class="fa fa-dashboard"></i> @yield('contentheader_title')</a></li>
    <li><a href="{{route('companies.create')}}">Actualizar {{$company->name}}</a></li>
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
                <form role="form" method="post" action="{{route('companies.update',['company'=>$company->uuid])}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="default">Nombre</label>
                            <input type="input" name="name" value="{{old('name',$company->name)}}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="default">Dirección</label>
                            <input type="input" name="address" value="{{old('address',$company->address)}}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="default">Teléfono</label>
                            <input type="number" name="phone" value="{{old('phone',$company->phone)}}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="type">Subcategoría</label>
                            <select class="form-control" name="subcategory_id">
                                @foreach ($subcategories as $subcategory)
                                    <option class="form-control" value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="default">Email</label>
                            <input type="email" name="email" value="{{old('email',$company->email)}}" class="form-control"  placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="default">Web</label>
                            <input type="url" name="web" value="{{old('web',$company->web)}}" class="form-control"  placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="default">Facebook</label>
                            <input type="url" name="facebook" value="{{old('facebook',$company->facebook)}}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="default">Twitter</label>
                            <input type="url" name="twitter" value="{{old('twitter',$company->twitter)}}" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="default">Descripción</label>
                            <textarea name="description"  class="form-control" rows="3" placeholder="">{{old('description',$company->description)}}</textarea>
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