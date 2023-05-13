@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Informacion de proyectos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-alumnos')
                                <div class="container text-center">
                                    <div class="page-header">
                                        <h1>
                                            <a class="btn btn-primary" href="{{ route('proyectos.create') }}">Crear Nuevo Proyecto</a>
                                        </h1>
                                    </div>
                                </div>
                            @endcan


                            <div class="col-12">
                                <label class="text-general-color label-text " for="selectEstatus">Búsqueda
                                    por:</label>
                                <div class="input-group col-8">
                                    <form action="{{route('filtroProyecto')}}" method="POST" class="form-inline">
                                        @csrf

                                        <select class="form-control input-text-font" id="busquedaPor"
                                                style=" margin-right:  8px" name="busquedaPor" required>
                                            <option value="1" selected>Clave de proyecto</option>
                                            <option value="2">Nombre del proyecto</option>
                                        </select>

                                        <input type="text" style=" margin-right:10px;" maxlength="35"
                                               class="form-control input-text-font"
                                               placeholder="Introduce tu búsqueda"
                                               aria-describedby="buttonBuscar" name="inputBuscar" id="inputBuscar">

                                        <button type="submit" class="btn btn-success m-1"><i
                                                    class="fas fa-search"></i></button>
                                        <a class="btn btn-warning" type="button" id="buttonReset"
                                           href="{{route('proyectos.index')}}">
                                            Mostrar todos
                                        </a>
                                    </form>
                                </div>
                            </div>


                            <table class="table table-striped mt-2" style="width: 100%;">
                                <thead style="background-color:#6777ef">
                                <th style="color: #fff;">Nombre</th>
                                <th style="color: #fff;">Clave del proyecto</th>
                                <th style="color: #fff;">Programa educativo</th>
                                <th style="color: #fff;">Linea de investigacion</th>
                                <th style="color: #fff;">responsable</th>
                                <th style="color: #fff;">estado</th>
                                <th style="color: white;">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach($proyectos as $proyecto)
                                    <tr>

                                        <td>{{$proyecto->nombre}}</td>
                                        <td>{{$proyecto->clave}}</td>
                                        <td>{{$proyecto->programa}}</td>
                                        <td>{{$proyecto->linea}}</td>
                                        <td>{{$proyecto->getResponsable->nombre}} {{$proyecto->getResponsable->apellidoP}} {{$proyecto->getResponsable->apellidoM}}</td>

                                        <td>
                                            @php
                                                $type = $proyecto->estado;
                                                if($type){
                                                    echo 'Completado';
                                                } else {  echo 'No completado';}
                                            @endphp
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a class="btn btn-info"
                                                   href="{{route('proyectos.show', $proyecto->id)}}"><i
                                                            class="fas fa-eye"></i></a>
                                                @can('editar-alumnos')
                                                    <a class="btn btn-info"
                                                       href="{{route('proyectos.edit', $proyecto->id)}}"><i
                                                                class="fas fa-edit"></i></a>
                                            @endcan

                                            @csrf

                                            @can('borrar-alumnos')

                                                {!! Form::open(['method'=>'DELETE','route'=>['proyectos.destroy',$proyecto->id],'style'=>'display:inline']) !!}
                                                {!! Form::hidden('alumnoId', $value = $proyecto->id) !!}
                                                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}
                                                {!! Form::close() !!}

                                            @endcan
                                            <!--</form>-->
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--Centramos la paginacion a la derecha-->
                            <div class="pagination justify-content-end">
                                {!! $proyectos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection