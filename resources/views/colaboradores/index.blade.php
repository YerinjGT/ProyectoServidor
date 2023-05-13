@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Informacion de los colaboradores</h3>
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
                                            <a class="btn btn-warning" href="{{ route('colaboradores.create') }}">Crear
                                                Nuevo
                                                Colaborador</a>
                                        </h1>
                                    </div>
                                </div>
                            @endcan

                            <div class="col-12">
                                <label class="text-general-color label-text " for="selectEstatus">Búsqueda
                                    por:</label>
                                <div class="input-group col-8">
                                    <form action="{{route('filtroColaborador')}}" method="POST" class="form-inline">
                                        @csrf

                                        <select class="form-control input-text-font" id="busquedaPor"
                                                style=" margin-right:  8px" name="busquedaPor" required>
                                            <option value="1" selected>Nombre</option>
                                            <option value="2">Correo electronico</option>
                                            <option value="3">Tipo de colaborador</option>
                                            <option value="4">Departamento </option>
                                            <option value="5">Numero de control</option>
                                        </select>

                                        <input type="text" style=" margin-right:10px;" maxlength="35"
                                               class="form-control input-text-font"
                                               placeholder="Introduce tu búsqueda"
                                               aria-describedby="buttonBuscar" name="inputBuscar" id="inputBuscar">

                                        <button type="submit" class="btn btn-success m-1"><i
                                                class="fas fa-search"></i></button>
                                        <a class="btn btn-warning" type="button" id="buttonReset"
                                           href="{{route('colaboradores.index')}}">
                                            Mostrar todos
                                        </a>
                                    </form>
                                </div>
                            </div>


                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                <th style="color: #fff;">nombre</th>
                                <th style="color: #fff;">Apellido Paterno</th>
                                <th style="color: #fff;">Apellido Materno</th>
                                <th style="color: #fff;">e-mail</th>
                                <th style="color: #fff;">telefono</th>
                                <th style="color: #fff;">carrera</th>
                                <th style="color: #fff;">tipo de colaborador</th>
                                <th style="color: #fff;">nControl</th>
                                <th style="color: #fff;">departamento</th>
                                <th style="color: white;">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach($colaborador as $colab)
                                    <tr>
                                        <td>{{$colab->nombre}}</td>
                                        <td>{{$colab->apellidoP}}</td>
                                        <td>{{$colab->apellidoM}}</td>
                                        <td>{{$colab->email}}</td>
                                        <td>{{$colab->telefono}}</td>
                                        <td>{{$colab->getCarerras->nombrecarrera}}</td>
                                        <td>
                                            @php
                                                $type = $colab->colab_type;
                                                if($type ==1){
                                                    echo 'Estudiante';
                                                } else if ($type ==2){
                                                    echo 'Docente';
                                                } else {  echo 'Ingeniero';}


                                            @endphp
                                        </td>
                                        <td>
                                            @php

                                                $type = $colab->nControl;
                                                if($type == null){
                                                    echo 'No es alumno';
                                                } else {  echo $type;}
                                            @endphp
                                        </td>
                                        <td>
                                            @php

                                                $type =$colab->department;
                                                if($type == null){
                                                    echo 'No es docente o ingeniero';
                                                } else {  echo $type;}
                                            @endphp
                                        </td>
                                        <td>

                                            @can('editar-alumnos')
                                                <a class="btn btn-info"
                                                   href="{{route('colaboradores.edit', $colab->id)}}">Editar</a>
                                        @endcan

                                        @csrf

                                        @can('borrar-alumnos')
                                            {!! Form::open(['method'=>'DELETE','route'=>['colaboradores.destroy',$colab->id],'style'=>'display:inline']) !!}
                                            {!! Form::hidden('alumnoId', $value = $colab->id) !!}
                                            {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                        <!--</form>-->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--Centramos la paginacion a la derecha-->
                            <div class="pagination justify-content-end">
                                {{$colaborador->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

