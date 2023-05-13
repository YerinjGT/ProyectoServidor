@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="card-deck">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Responsable del proyecto</h6>
                </div>
                <div class="card-body">
                    <p>
                        Nombre: {{$proyectos->getResponsable->nombre}} {{$proyectos->getResponsable->apellidoP}} {{$proyectos->getResponsable->apellidoM}}</p>
                    <p>Correo electronico: {{$proyectos->getResponsable->email}}</p>
                    <p>Telefono: {{$proyectos->getResponsable->telefono}}</p>
                    <p>Licenciatura o posgrado involucrado: {{$proyectos->getCarerras->nombrecarrera}}</p>
                    <p>Fecha de inicio: {{date("Y-m-d",strtotime($proyectos->fechaInicio))}}</p>
                    <p>Fecha de Finalizacion:

                        @php
                            $type = $proyectos->fechaFin;
                            $idProyecto = $proyectos->id;
                            $url = route('proyectos.edit', $proyectos->id);
                            if($type === null){
                                echo '<a class="btn btn-info"
                                                  href="'.$url.'">Agregar Fecha</a>';
                            } else {  echo date("Y-m-d",strtotime($proyectos->fechaFin));}
                        @endphp</p>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Estado del proyecto</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        @php
                            $type = $proyectos->estado;
                            if($type){
                               echo '<button type="button" class="btn btn-success" type="button" class="btn btn-success" style="width:100px; height:100px"  data-toggle="modal" data-target="#exampleModal">
        <i class="far fa-check-circle" style="font-size: 80px;"></i>
    </button>';
                            } else {
                               echo ' <button type="button" class="btn btn-danger" type="button" class="btn btn-success" style="width:100px; height:100px"  data-toggle="modal" data-target="#exampleModal">
      <i class="far fa-times-circle" style="font-size: 80px;"></i>
    </button>';
                            }
                        @endphp
                    </div>
                    <br>
                    <br>
                    <br>
                    <h3 class="text-center">
                        @php
                            $type = $proyectos->estado;
                            if($type){
                                echo 'Completado';
                            } else {  echo 'No completado';}
                        @endphp
                    </h3>
                    <br><br>
                    <div class="text-center">
                        @php
                            $type = $proyectos->estado;
                            $route =  route('download', $proyectos->id);
                            if($type){
                               echo '<a class="btn btn-success " href="'.$route.'")><i class="fas fa-arrow-circle-down"></i> Descargar documento</a>';
                            } else { echo'<p>Se permitira descargar el pdf al completar el proyecto</p>'; }
                        @endphp
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Colaboradores</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <tbody>
                            @foreach($colaboradoresproyecto as $colab)
                                <tr>
                                    <td>{{$colab->getColaborador->nombre}} {{$colab->getColaborador->apellidoP}} {{$colab->getColaborador->apellidoM}}</td>
                                    <td>
                                        @can('borrar-alumnos')
                                            {!! Form::open(['method'=>'DELETE','route'=>['proyecto-colaborador.destroy',$colab->id],'style'=>'display:inline']) !!}
                                            {!! Form::button('<i class="fas fa-user-minus"></i>', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                                            {!! Form::hidden('alumnoId', $value = $colab->id) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <form action="{{route('proyecto-colaborador.store')}}" method="POST" class="form-inline">
                        @csrf
                        <input class="form-control" type="hidden" name="idProyecto" id="idProyecto"
                               value="{{$proyectos->id}}">
                        <div class="form-group row">
                            <select name="idColaborador" id="idColaborador" class="form-control col-md-8 selectpicker"
                                    data-show-subtext="true" data-live-search="true" required>
                                <option disabled selected value>Selecciona colaborador</option>
                                @foreach($colaboradores as $colaborador)
                                    <option
                                        value="{{$colaborador->id}}">{{$colaborador->nombre}} {{$colaborador->apellidoP}} {{$colaborador->apellidoM}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success ">Agregar<br/>colaborador</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <br>
    <br>
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h6>Detalles del proyecto</h6>
                        </div>
                        <div class="col-auto">
                            <button onclick="location.href = '{{route('proyectos.index')}}'"
                                    class="btn btn-info text-white">Atras
                            </button>
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped ">

                            <thead class="table" style="background-color:#6777ef">
                            <tr>
                                <th style="color:#fff">Clave</th>
                                <th style="color:#fff">nombre</th>
                                <th style="color:#fff">Descripcion</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr>

                                <td>{{$proyectos->clave}}</td>
                                <td>{{$proyectos->nombre}}</td>
                                <td>{{$proyectos->descripcion}}</td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                    <div class="table-responsive">

                        <table class="table table-striped ">

                            <thead class="table" style="background-color:#6777ef">
                            <tr>
                                <th style="color:#fff">Objetivos</th>
                                <th style="color:#fff">Programa educativo</th>
                                <th style="color:#fff">Linea de investigación</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr>
                                <td>{{$proyectos->objetivos}}</td>
                                <td>{{$proyectos->programa}}</td>
                                <td>{{$proyectos->linea}}</td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('editarestado', $proyectos->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        Una vez completado no se podran revertir los cambios, en caso contrario contacta con un
                        administrador para revertir el cambio.
                        <input class="form-control" type="hidden" name="estado" id="estado"
                               value="{{$proyectos->estado}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger ">Guardar Cambio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection





