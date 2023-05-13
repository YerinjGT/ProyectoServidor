@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Informacion de los alumnos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-alumnos')
                                <a class="btn btn-warning" href="{{ route('alumnos.create') }}">Crear Nuevo Alumno</a>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                <th style="display: none">ID</th>
                                <th style="color: #fff;">Clave del proyecto:</th>
                                <th style="color: #fff;">Programa educativo:</th>
                                <th style="color: #fff;">Linea de investigación:</th>
                                <th style="color: #fff;">Nombre de licenciatura:</th>
                                <th style="color: #fff;">fecha inicio:</th>
                                <th style="color: #fff;">fecha fin:</th>
                                <th style="color: #fff;">Responsable del proyecto:</th>
                                <th style="color: #fff;">Colaboradores:</th>
                                <th style="color: white;">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach($docentes as $docente)
                                    <tr>
                                        <td style="display: none">{{$docente->id}}</td>
                                        <td>{{$docente->claveproyecto}}</td>
                                        <td>{{$docente->programaedu}}</td>
                                        <td>{{$docente->lineainves}}</td>
                                        <td>{{$docente->idcarrera}}</td>
                                        <td>{{$docente->nombredocente}}</td>
                                        <td>{{$docente->colab}}</td>

                                        <td>

                                                @can('editar-alumnos')
                                                <a class="btn btn-info" href="{{route('alumnos.edit', $alumno->id)}}">Editar</a>
                                                @endcan

                                                @csrf

                                                @can('borrar-alumnos')
                                                    {!! Form::open(['method'=>'DELETE','route'=>['alumnos.destroy',$alumno->id],'style'=>'display:inline']) !!}
                                                    {!! Form::hidden('alumnoId', $value = $alumno->id) !!}
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
                                {!! $docentes->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

