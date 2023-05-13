<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\ProyectoColaborador;
use App\Models\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class ProyectoColaboradorController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'idProyecto' => 'required',
            'idColaborador' => 'required'
        ]);


        ProyectoColaborador::create($request->all());

        // Colaboradores::create($request->all());
        Alert::success('Agregado al proyecto!', 'El colaborador a sido agregado correctamente al proyecto, ahora podra colaborar en el mismo');
        return redirect()->back();
        // return redirect()->route('proyectos.index');
    }


    /**
     * Display the specified resource.
     * @param \App\Models\ProyectoColaborador $proyectoColaborador
     * @return \Illuminate\Http\Response
     */
    public function show(ProyectoColaborador $proyectoColaborador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ProyectoColaborador $proyectoColaborador
     * @return \Illuminate\Http\Response
     */
    public function edit(ProyectoColaborador $proyectoColaborador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProyectoColaborador $proyectoColaborador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProyectoColaborador $proyectoColaborador)
    {
        //
    }

    public function printPDF($id)
    {
        $infoColaborador = ProyectoColaborador::where('idProyecto', $id)->get();
        $proyecto = Proyectos::find($id);
        $today = Carbon::now();
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $fecha = Carbon::parse($today);
        $mes = $meses[($fecha->format('n')) - 1];
        $today2 = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');

        $pdf = \PDF::loadView('pdf.generator', compact('today', 'today2', 'infoColaborador', 'proyecto'));
        $pdf->setPaper('letter', 'portrait');
        $name = $proyecto->clave . '.pdf';
        return $pdf->download($name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProyectoColaborador $proyectoColaborador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colaborador = ProyectoColaborador::find($id);

        if ($colaborador != null) {
            if ($colaborador->delete()) {
                Alert::success('Eliminado Correctamente', 'El colaborador fue eliminado correctamente, ya no podra colaborar en el proyecto');
                return redirect()->back();
            }
        }
        Alert::error('Error!', 'Ocurrio un prolema al eliminar al colaborador');
        return redirect()->back();
    }
}
