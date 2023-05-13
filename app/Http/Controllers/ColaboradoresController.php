<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use App\Models\Colaboradores;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ColaboradoresController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-alumnos | crear-alumnos | editar-alumnos | borrar-alumnos', ['only' => ['index']]);
        $this->middleware('permission:crear-alumnos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-alumnos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-alumnos', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $colaborador = Colaboradores::paginate(10);
        return view('colaboradores.index', compact('colaborador'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    public function verCarreraColab($id){
        $colaborador = Colaboradores::where('idCarrera', $id)->paginate(10);
        return view('colaboradores.index', compact('colaborador'));
    }

    public function verTipoColab($id){
        $colaborador = Colaboradores::where('colab_type', $id)->paginate(10);
        return view('colaboradores.index', compact('colaborador'));
    }
    public function searchTable(Request $request)
    {
        $select = $request->get("busquedaPor");
        $input = $request->get("inputBuscar");
        if ($select === "1") {
            // $proyectos = Proyectos::where('clave', $input)->paginate(10);
            $colaborador = Colaboradores::where('nombre', 'LIKE', '%' . $input . '%')->paginate(10);
            return view('colaboradores.index', compact('colaborador'));
        } else if ($select === "2") {
            $colaborador = Colaboradores::where('email', 'LIKE', '%' . $input . '%')->paginate(10);
            return view('colaboradores.index', compact('colaborador'));
        } else if ($select === "3") {
            if ($input === "Estudiante" || $input === "estudiante" || $input === "ESTUDIANTE") {
                $value = 1;
            }
            if ($input === "Ingeniero" || $input === "ingeniero" || $input === "INGENIERO") {
                $value = 2;
            }
            if ($input === "Docente" || $input === "docente" || $input === "DOCENTE") {
                $value = 3;
            }
            $colaborador = Colaboradores::where('colab_type', 'LIKE', '%' . $value . '%')->paginate(10);
            return view('colaboradores.index', compact('colaborador'));
        } else if ($select === "4") {
            $colaborador = Colaboradores::where('department', 'LIKE', '%' . $input . '%')->paginate(10);
            return view('colaboradores.index', compact('colaborador'));
        } else if ($select === "5") {
            $colaborador = Colaboradores::where('nControl', 'LIKE', '%' . $input . '%')->paginate(10);
            return view('colaboradores.index', compact('colaborador'));
        } else {
            $colaborador = Colaboradores::paginate(10);
            return view('colaboradores.index', compact('colaborador'))->with('error', 'No existen registros con tu busqueda');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $carreras = Carreras::all();
        return view('colaboradores.create', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'idCarrera' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'colab_type' => 'required'
        ]);

        Colaboradores::create([
            'nombre' => $request->get('nombre'),
            'apellidoP' => $request->get('apellidoP'),
            'apellidoM' => $request->get('apellidoM'),
            'idCarrera' => $request->get('idCarrera'),
            'email' => $request->get('email'),
            'telefono' => $request->get('telefono'),
            'colab_type' => $request->get('colab_type'),
            'nControl' => $request->get('nControl'),
            'department' => $request->get('department'),
        ]);
        // Colaboradores::create($request->all());
        Alert::success('Creado correctamente', 'El colaborador a sido creado correctamente');
        return redirect()->route('colaboradores.index')->with('success', 'Colaborador creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Colaboradores $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function show(Colaboradores $colaboradores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Colaboradores $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $colaboradores = Colaboradores::find($id);
        $carreras = Carreras::all();
        if ($colaboradores != null) {
            return view('colaboradores.edit', compact('colaboradores', 'carreras'));
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Colaboradores $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'idCarrera' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'colab_type' => 'required'
        ]);

        $colaboradores = Colaboradores::find($id);

        $colaboradores->update([
            'nombre' => $request->get('nombre'),
            'apellidoP' => $request->get('apellidoP'),
            'apellidoM' => $request->get('apellidoM'),
            'idCarrera' => $request->get('idCarrera'),
            'email' => $request->get('email'),
            'telefono' => $request->get('telefono'),
            'colab_type' => $request->get('colab_type'),
            'nControl' => $request->get('nControl'),
            'department' => $request->get('department'),
        ]);

        if ($colaboradores != null) {
            if ($colaboradores->update($request->all())) {
                Alert::success('Modificacion Realizada', 'El colaborador a sido modificado correctamente');
                return redirect()->route('colaboradores.index');
            }
        }

        Alert::error('Error!', 'Ocurrio un error en la modificacion, verifica los campos');
        return redirect()->route('colaboradores.index');// Enviar mensaje de error, withNotification

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Colaboradores $colaboradores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $colaboradores = Colaboradores::find($id);

        if ($colaboradores != null) {

            if ($colaboradores->delete()) {
                Alert::success('Eliminado Correctamente', 'El colaborador fue eliminado correctamente');
                return redirect()->route('colaboradores.index')->with('mensaje', 'colaborador eliminado correctamente');

            }
        }
        Alert::error('Error!', 'Ocurrio un prolema al eliminar al colaborador');
        return redirect()->route('colaboradores.index')->with('mensaje', 'Es posible que el colaborador con este Id no exista');

    }
}
