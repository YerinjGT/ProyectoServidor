@extends('layouts.app')

@section('content')


    <div class="section">
        <div class="section-header">
            <h3 class="page__heading">Creacion de colaborador</h3>
        </div>
        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('colaboradores.store')}}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required
                                       placeholder="Ingrese el nombre">
                            </div>

                            <div class="form-group">
                                <label for="apellidoP">Apellido Paterno:</label>
                                <input class="form-control" type="text" name="apellidoP" id="apellidoP" required
                                       placeholder="Ingrese el apellido Paterno">
                            </div>

                            <div class="form-group">
                                <label for="apellidoM">Apellido Materno:</label>
                                <input class="form-control" type="text" name="apellidoM" id="apellidoM" required
                                       placeholder="Ingrese el apellido materno">
                            </div>

                            <div class="form-group">
                                <label for="email">Correo electronico</label>
                                <input class="form-control" type="email" name="email" id="email" required
                                       placeholder="Ingrese el correo electronico">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input class="form-control" type="number" name="telefono" id="telefono" required
                                       placeholder="Ingrese el telefono">
                            </div>

                            <div class="form-group">
                                <label for="idCarrera">carrera:</label>
                                <select name="idCarrera" id="idCarrera" class="form-control" required>
                                    <option disabled selected value>Selecciona una carrera</option>
                                    @foreach($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->nombrecarrera}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="colab_type">tipo de colaborador:</label>
                                <select name="colab_type" id="colab_type" class="form-control">
                                    <option disabled selected value>Selecciona un tipo</option>
                                    <option value="1">Estudiante</option>
                                    <option value="2">Docente</option>
                                    <option value="3">ingeniero</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nControl" name="nControlLabel" id="nControlLabel">numero de Control:</label>
                                <input class="form-control" type="text" name="nControl" id="nControl"
                                       placeholder="Ingrese el numero de control del estudiante">
                            </div>

                            <div class="form-group">

                                <label for="department" name="departmentLabel" id="departmentLabel">Departamento:</label>
                                <input class="form-control" type="text" name="department" id="department"
                                       placeholder="Ingrese el departamento al que labora">
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

