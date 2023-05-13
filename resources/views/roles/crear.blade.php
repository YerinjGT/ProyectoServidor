@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Nuevo Rol</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dimissible fade show" role="alert">
                                    <strong>!Revise los campos¡</strong>
                                    @foreach($errors->all() as $error)
                                        <span class="badge badge-danger">{{$error}}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"&times;></span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::open(array('route'=>'roles.store', 'method'=>'POST')) !!}
                            <div class="row">
                                <!--Formulario nuevo usuario-->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Nombre del rol:</label>
                                        {!! Form::text('name', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Permisos para este rol:</label>
                                        <br>
                                        @foreach($permission as $value)
                                            <label class="form-check-label">{!! Form::checkbox('permission[]', $value->id, false, array('class'=>'name'))
                                           ,$value->name !!}</label>
                                        <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

