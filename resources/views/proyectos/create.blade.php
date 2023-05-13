@extends('layouts.app')

@section('content')


    <div class="section">
        <div class="section-header">
            <h3 class="page__heading">Creacion de Proyectos</h3>
        </div>
        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    <div class="card-body">

                        <form action="{{route('proyectos.store')}}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required
                                       placeholder="Ingrese el nombre">
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripcion del proyecto:</label>
                                <textarea required name="descripcion" id="descripcion" rows="5" style=" height: 100%;"
                                          class="form-control" placeholder="Ingrese una breve descripcion"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="objetivos">Objetivos del proyecto:</label>
                                <textarea required name="objetivos" id="objetivos" rows="5" style=" height: 100%;"
                                          class="form-control" placeholder="Ingrese los objetivos del prpyecto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="clave">Clave del proyecto:</label>
                                <input class="form-control" type="text" name="clave" id="clave" required
                                       placeholder="Ingrese laclave unica del proyecto">
                            </div>

                            <div class="form-group">
                                <label for="programa">programa educativo:</label>
                                <input class="form-control" type="text" name="programa" id="programa" required
                                       placeholder="Ingrese el programa educativo">
                            </div>
                            <div class="form-group">
                                <label for="linea">Linea de investigación:</label>
                                <input class="form-control" type="text" name="linea" id="linea" required
                                       placeholder="Ingrese la linea de investigación">
                            </div>

                            <div class="form-group">
                                <label for="carreraid">carrera:</label>
                                <select name="carreraid" id="carreraid" class="form-control" required>
                                    <option disabled selected value>Selecciona una carrera</option>
                                    @foreach($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->nombrecarrera}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="responsable">Responsable de proyecto:</label>
                                <select name="responsable" id="responsable" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                                    <option disabled selected value>Selecciona a un encargado</option>
                                    @foreach($responsables as $responsable)
                                        <option value="{{$responsable->id}}">{{$responsable->nombre}} {{$responsable->apellidoP}} {{$responsable->apellidoM}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fechaInicio">Fecha de inicio:</label>
                                <input class="form-control" type="date" name="fechaInicio" id="fechaInicio" required
                                       placeholder="Ingresa ña fecha de inicio">
                            </div>

                            <div class="form-group">
                                <label for="fechaInicio">Fecha de finalizacion:</label>
                                <input class="form-control" type="date" name="fechaFin" id="fechaFin"
                                       placeholder="Ingresa la fecha de finalizacion">
                            </div>



                            <div class="form-group text-center m-2">
                                <button type="submit" class="btn btn-success m-1">Guardar</button>
                                <a href="{{route('proyectos.index')}}" class="btn btn-danger m-1">Cancelar</a>
                            </div>

                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>


@endsection

