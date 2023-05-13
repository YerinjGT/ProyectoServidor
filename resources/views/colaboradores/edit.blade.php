@extends('layouts.app')

@section('content')


    <div class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar colaborador</h3>
        </div>
        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('colaboradores.update',$colaboradores->id)}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required
                                       value="{{$colaboradores->nombre}}" placeholder="Ingrese el nombre">
                            </div>

                            <div class="form-group">
                                <label for="apellidoP">Apellido Paterno:</label>
                                <input class="form-control" type="text" name="apellidoP" id="apellidoP" required
                                       value="{{$colaboradores->apellidoP}}" placeholder="Ingrese el apellido Paterno">
                            </div>

                            <div class="form-group">
                                <label for="apellidoM">Apellido Materno:</label>
                                <input class="form-control" type="text" name="apellidoM" id="apellidoM" required
                                       value="{{$colaboradores->apellidoM}}" placeholder="Ingrese el apellido materno">
                            </div>

                            <div class="form-group">
                                <label for="email">Correo electronico</label>
                                <input class="form-control" type="email" name="email" id="email" required
                                       value="{{$colaboradores->email}}" placeholder="Ingrese el correo electronico">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input class="form-control" type="number" name="telefono" id="telefono" required
                                       value="{{$colaboradores->telefono}}" placeholder="Ingrese el telefono">
                            </div>

                            <div class="form-group">
                                <label for="idCarrera">carrera:</label>
                                <select name="idCarrera" id="idCarrera" class="form-control" required>
                                    <option disabled selected value>Selecciona una carrera</option>
                                    @foreach($carreras as $carrera)
                                        <option value="{{$carrera->id}}" @if($colaboradores->idCarrera=== $carrera->id) selected='selected' @endif>{{$carrera->nombrecarrera}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="colab_type">tipo de colaborador:</label>
                                <select name="colab_type" id="colab_type" class="form-control">
                                    <option disabled selected value>Selecciona un tipo</option>
                                    <option value="1" @if($colaboradores->colab_type === 1) selected='selected' @endif>Estudiante</option>
                                    <option value="2" @if($colaboradores->colab_type === 2) selected='selected' @endif>Docente </option>
                                    <option value="3" @if($colaboradores->colab_type === 3) selected='selected' @endif>ingeniero</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nControl" name="nControlLabel" id="nControlLabel">numero de Control:</label>
                                <input class="form-control" type="text" name="nControl" id="nControl"
                                       value="{{$colaboradores->nControl}}" placeholder="Ingrese el numero de control del estudiante">
                            </div>

                            <div class="form-group">

                                <label for="department" name="departmentLabel" id="departmentLabel">Departamento:</label>
                                <input class="form-control" type="text" name="department" id="department"
                                       value="{{$colaboradores->department}}" placeholder="Ingrese el departamento al que labora">
                            </div>



                            <div class="form-group text-center m-2">
                                <button type="submit" class="btn btn-success m-1">Guardar</button>
                                <a href="{{route('colaboradores.index')}}" class="btn btn-danger m-1">Cancelar</a>
                            </div>

                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        document.getElementById('nControl').style.display = 'none';
        document.getElementById('nControlLabel').style.display = 'none';
        document.getElementById('department').style.display = 'none';
        document.getElementById('departmentLabel').style.display = 'none';

        document.getElementById('colab_type').addEventListener("change", function (e) {
            if (e.target.value === "1") {
                document.getElementById('nControl').style.display = 'block';
                document.getElementById('nControlLabel').style.display = 'block';
                document.getElementById('departmentLabel').style.display = 'none';
                document.getElementById('department').style.display = 'none';
            } else  if (e.target.value === "2" ||e.target.value === "3") {
                document.getElementById('nControl').style.display = 'none';
                document.getElementById('nControlLabel').style.display = 'none';
                document.getElementById('departmentLabel').style.display = 'block';
                document.getElementById('department').style.display = 'block';
            } else{
                document.getElementById('nControl').style.display = 'none';
                document.getElementById('nControlLabel').style.display = 'none';
                document.getElementById('department').style.display = 'none';
                document.getElementById('departmentLabel').style.display = 'none';
            }
        });

    </script>


@endsection

