@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4 col-x1-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Usuarios</h5>
                                            @php
                                                use App\Models\User;
                                               $cant_usuarios = User::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver
                                                    mas</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Roles</h5>
                                            @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Proyectos registrados</h5>
                                            @php
                                                use App\Models\Proyectos;
                                               $cant_proyectos = Proyectos::count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-university f-left"></i><span>{{$cant_proyectos}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos.index')}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <h3 class="page__heading">Colaboradores Registrados</h3>
                            <br>

                            <div class="row">
                                <div class="col-md-4 col-x1-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Estudiantes</h5>
                                            @php
                                                use App\Models\Colaboradores;

                                               $estudiantes = Colaboradores::where('colab_type', 1)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{$estudiantes}}</span></h2>
                                            <p class="m-b-0 text-right"><a href=" {{route('colaboradores-tipo',1)}}"
                                                                           class="text-white">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Docentes</h5>
                                            @php
                                                $docentes = Colaboradores::where('colab_type', 2)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-user-lock f-left"></i><span>{{$docentes}}</span></h2>
                                            <p class="m-b-0 text-right"><a href=" {{route('colaboradores-tipo',2)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Ingenieros</h5>
                                            @php
                                                $ingenieros = Colaboradores::where('colab_type', 3)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-university f-left"></i><span>{{$ingenieros}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href=" {{route('colaboradores-tipo',3)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <h3 class="page__heading">Colaboradores por Carreras Registrados</h3>
                            <br>

                            <div class="row">
                                <div class="col-md-4 col-x1-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria en electronica</h5>
                                            @php

                                                $estudiantes = Colaboradores::where('idCarrera', 1)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-plug f-left"></i><span>{{$estudiantes}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',1)}}"
                                                                           class="text-white">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria en agronomia</h5>
                                            @php
                                                $docentes = Colaboradores::where('idCarrera', 2)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-carrot f-left"></i><span>{{$docentes}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',2)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria industrial</h5>
                                            @php
                                                $ingenieros = Colaboradores::where('idCarrera', 3)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-industry f-left"></i><span>{{$ingenieros}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',3)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-x1-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria en sistemas computacionales</h5>
                                            @php

                                                $estudiantes = Colaboradores::where('idCarrera', 4)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-server f-left"></i><span>{{$estudiantes}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',4)}}"
                                                                           class="text-white">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria en Gestión empresarial</h5>
                                            @php
                                                $docentes = Colaboradores::where('idCarrera', 5)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-user-lock f-left"></i><span>{{$docentes}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',5)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria Petrolera</h5>
                                            @php
                                                $ingenieros = Colaboradores::where('idCarrera', 6)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-gas-pump f-left"></i><span>{{$ingenieros}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',6)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-x1-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Licenciatura en contador publico</h5>
                                            @php

                                                $estudiantes = Colaboradores::where('idCarrera', 7)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-coins f-left"></i><span>{{$estudiantes}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',7)}}"
                                                                           class="text-white">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria Ambiental</h5>
                                            @php
                                                $docentes = Colaboradores::where('idCarrera', 8)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-tree f-left"></i><span>{{$docentes}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',8)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria Mecatronica</h5>
                                            @php
                                                $ingenieros = Colaboradores::where('idCarrera', 9)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-robot f-left"></i><span>{{$ingenieros}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',9)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-x1-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Posgrado Maestría en ingeniería Industrial</h5>
                                            @php

                                                $estudiantes = Colaboradores::where('idCarrera', 10)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{$estudiantes}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',10)}}"
                                                                           class="text-white">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Posgrado Maestría Producción Pecuaria Tropical</h5>
                                            @php
                                                $docentes = Colaboradores::where('idCarrera', 11)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-user-lock f-left"></i><span>{{$docentes}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',11)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Posgrado Maestría en Ingeniería</h5>
                                            @php
                                                $ingenieros = Colaboradores::where('idCarrera', 12)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-university f-left"></i><span>{{$ingenieros}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="{{route('colaboradores-carrera',12)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <h3 class="page__heading">Proyectos por Carreras Registrados</h3>
                            <br>

                            <div class="row">
                                <div class="col-md-4 col-x1-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria en electronica</h5>
                                            @php

                                                $electronica = Proyectos::where('carreraid', 1)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-plug f-left"></i><span>{{$electronica}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',1)}}"
                                                                           class="text-white">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria en agronomia</h5>
                                            @php
                                                $agronomia = Proyectos::where('carreraid', 2)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-carrot f-left"></i><span>{{$agronomia}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',2)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria industrial</h5>
                                            @php
                                                $industrial = Proyectos::where('carreraid', 3)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-industry f-left"></i><span>{{$industrial}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',3)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-x1-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria en sistemas computacionales</h5>
                                            @php

                                                $sistemas = Proyectos::where('carreraid', 4)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-server f-left"></i><span>{{$sistemas}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',4)}}"
                                                                           class="text-white">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria en Gestión empresarial</h5>
                                            @php
                                                $gestion = Proyectos::where('carreraid', 5)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-user-lock f-left"></i><span>{{$gestion}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',5)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria Petrolera</h5>
                                            @php
                                                $petrolera = Proyectos::where('carreraid', 6)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-gas-pump f-left"></i><span>{{$petrolera}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',6)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-x1-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Licenciatura en contador publico</h5>
                                            @php

                                                $contador = Proyectos::where('carreraid', 7)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-coins f-left"></i><span>{{$contador}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',7)}}"
                                                                           class="text-white">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria Ambiental</h5>
                                            @php
                                                $ambiental = Proyectos::where('carreraid', 8)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-tree f-left"></i><span>{{$ambiental}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',8)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Ingenieria Mecatronica</h5>
                                            @php
                                                $mecatronica = Proyectos::where('carreraid', 9)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-robot f-left"></i><span>{{$mecatronica}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',9)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-x1-4">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">
                                            <h5>Posgrado Maestría en ingeniería Industrial</h5>
                                            @php

                                                $posgrado1 = Proyectos::where('carreraid', 10)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{$posgrado1}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',10)}}"
                                                                           class="text-white">Ver mas</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Posgrado Maestría Producción Pecuaria Tropical</h5>
                                            @php
                                                $posgrado2 = Proyectos::where('carreraid', 11)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fa fa-user-lock f-left"></i><span>{{$posgrado2}}</span></h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',11)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        <div class="card-block">
                                            <h5>Posgrado Maestría en Ingeniería</h5>
                                            @php
                                                $posgrado3 = Proyectos::where('carreraid', 13)->count();
                                            @endphp
                                            <h2 class="text-right"><i
                                                    class="fas fa-university f-left"></i><span>{{$posgrado3}}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="{{route('proyectos-carrera',12)}}"
                                                                           class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

