<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use App\Models\Colaboradores;
use App\Models\ProyectoColaborador;
use App\Models\Proyectos;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Mail\createProject;
use Illuminate\Support\Facades\Mail;
class ProyectosController extends Controller
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
        $proyectos = Proyectos::paginate(10);
        return view('proyectos.index', compact('proyectos'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    public function searchTable(Request $request)
    {
        $select = $request->get("busquedaPor");
        $input = $request->get("inputBuscar");
        if ($select === "1") {
           // $proyectos = Proyectos::where('clave', $input)->paginate(10);
            $proyectos = Proyectos::where('clave','LIKE','%' . $input . '%')->paginate(10);
            return view('proyectos.index', compact('proyectos'));
        }
        if($select === "2") {
            $proyectos = Proyectos::where('nombre','LIKE','%' . $input . '%')->paginate(10);
            return view('proyectos.index', compact('proyectos'));
        }
    }

    public function verCarrera($id){
        $proyectos = Proyectos::where('carreraid', $id)->paginate(10);
        return view('proyectos.index', compact('proyectos'));
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
        $responsables = Colaboradores::all();
        return view('Proyectos.create', compact('carreras', 'responsables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:proyectos',
            'descripcion' => 'required',
            'objetivos' => 'required',
            'clave' => 'required|unique:proyectos',
            'programa' => 'required',
            'linea' => 'required',
            'fechaInicio' => 'required',
            'responsable' => 'required',
            'carreraid' => 'required'
        ]);


        $request['estado'] = false;
        Proyectos::create($request->all());

        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        $email = new createProject;
        Mail::to('gustavo.marlic@gmail.com')->send($email);

        // Colaboradores::create($request->all());

        return redirect()->route('proyectos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Proyectos $proyectos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $proyectos = Proyectos::find($id);
        $carreras = Carreras::all();
        $colaboradores = Colaboradores::all();
        $colaboradoresproyecto = ProyectoColaborador::where('idProyecto', $id)->get();
        if ($colaboradores != null) {
            return view('proyectos.show', compact('proyectos', 'carreras', 'colaboradores', 'colaboradoresproyecto'));
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Proyectos $proyectos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proyectos = Proyectos::find($id);
        $carreras = Carreras::all();
        $responsables = Colaboradores::all();
        if ($proyectos != null) {
            return view('proyectos.edit', compact('proyectos','responsables', 'carreras'));
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Proyectos $proyectos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'objetivos' => 'required',
            'clave' => 'required',
            'programa' => 'required',
            'linea' => 'required',
            'fechaInicio' => 'required',
            'responsable' => 'required',
            'carreraid' => 'required'
        ]);

        $proyectos = Proyectos::find($id);

        $proyectos->update([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'objetivos' => $request->get('objetivos'),
            'clave' => $request->get('clave'),
            'programa' => $request->get('programa'),
            'linea' => $request->get('linea'),
            'fechaInicio' => $request->get('fechaInicio'),
            'responsable' => $request->get('responsable'),
            'carreraid' => $request->get('carreraid'),
        ]);

        if ($proyectos != null) {
            if ($proyectos->update($request->all())) {
                Alert::success('Modificacion Realizada', 'El proyecto a sido modificado correctamente');
                return redirect()->route('proyectos.index');
            }
        }

        Alert::error('Error!', 'Ocurrio un error en la modificacion, verifica los campos');
        return redirect()->route('proyectos.index');// Enviar mensaje de error, withNotification

    }

    public function updateEstado($id)
    {
        //
        $colaboradorEstado = Proyectos::find($id);
        $colaboradorEstado->estado = true;
        $colaboradorEstado->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Proyectos $proyectos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyectos::find($id);

        if ($proyecto != null) {
            if ($proyecto->delete()) {
                Alert::success('Eliminado Correctamente', 'El proyecto fue eliminado correctamente');
                return redirect()->route('proyectos.index');
            }
        }
        Alert::error('Error!', 'Ocurrio un prolema al eliminar el proyecto');
        return redirect()->route('proyectos.index');
    }
}
