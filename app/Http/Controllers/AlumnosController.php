<?php

namespace App\Http\Controllers;


use App\Models\Docentes;
use App\Models\Carreras;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class AlumnosController extends Controller
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
        $docentes = Docentes::paginate(5);
        return view('alumnos.index', compact('docentes'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'claveproyecto' => 'required|unique:docentes',
            'programaedu' => 'required',
            'lineainves' => 'required',
            'idcarrera' => 'required',
            'nombredocente' => 'required',
            'colab' => 'required'
        ]);
        $request['avance'] = 0;
        Alumnos::create($request->all());

        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docentes = Docentes::find($id);

        if ($docentes != null) {
            return view('alumnos.editar', compact('docentes'));
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Int $IdDocente, Request $request)
    {
        request()->validate([
            'claveproyecto' => 'required|',
            'programaedu' => 'required',
            'lineainves' => 'required',
            'idcarrera' => 'required',
            'nombredocente' => 'required',
            'colab' => 'required'
        ]);


        $docente = Docentes::find($IdDocente);

        if ($docente != null) {

            if ($docente->update($request->all())) {
                return redirect()->route('alumnos.index');
            }


        }


        return redirect()->route('alumnos.index');// Enviar mensaje de error, withNotification





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $docente = Docentes::find($request->docenteid);

        if ($docente != null) {

            if ($docente->delete()) {
                return redirect()->route('alumnos.index');
            }

        }

        return redirect()->route('alumnos.index');//Agregar mensaje de error
    }
}
