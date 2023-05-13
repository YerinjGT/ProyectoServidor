@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Creacion del alumno</h3>
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

                            <!--
                           <form action="{{ route('alumnos.store') }}"  method="POST">
                               @csrf
                               <div class="row">

                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                           <label for="titulo">Titulo</label>
                                           <input type="text" name="titulo" class="form-control">
                                       </div>
                                   </div>
                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-floating">
                                           <textarea class="form-cotrol" name="contenido" style="height: 100px"></textarea>
                                           <label for="contenido">Contenido</label>
                                       </div>
                                       <button type="submit" class="btn btn-primary">Guardar</button>
                                   </div>
                               </div>
                           </form>-->
                                {!! Form::open(array('route'=>'alumnos.store', 'method'=>'POST')) !!}
                                <div class="row">
                                    <!--Formulario nuevo alumno-->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Nombre:</label>
                                            {!! Form::text('nombre', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos:</label>
                                            {!! Form::text('apellidos', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="nControl">Numero de control:</label>
                                            {!! Form::text('nControl', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="titulo">Titulo proyecto:</label>
                                            {!! Form::text('titulo', null, array('class'=>'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="telefono">Numero telefonico:</label>
                                            {!! Form::number('telefono', null, array('class'=>'form-control')) !!}
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

