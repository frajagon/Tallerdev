<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradoAcademicoPeriodo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GradoAcademicoPeriodoFormRequest;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\GradoAcademico;
use App\Models\GradoAcademicoPeriodoDetalle;
use App\Models\Grupo;

class GradoAcademicoPeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gradoacademicos = GradoAcademicoPeriodo::orderBy('nombre', 'DESC')
            ->orderBy('id_grado_academico', 'DESC')
            ->orderBy('id_grupo', 'DESC')
            ->paginate(10);
        return view('gradoacademicoperiodo.index', compact('gradoacademicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docentes = Docente::all();
        $grados = GradoAcademico::all();
        $grupos = Grupo::all();

        return view("gradoacademicoperiodo.create", [
            "docentes" => $docentes,
            "grados" => $grados,
            "grupos" => $grupos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoAcademicoPeriodoFormRequest $request)
    {
        $gradoacademicos = new GradoAcademicoPeriodo;

        $gradoacademicos->nombre = $request->get('nombre');
        $gradoacademicos->fecha_inicio = $request->get('fecha_inicio');
        $gradoacademicos->fecha_fin = $request->get('fecha_fin');
        $gradoacademicos->estado = $request->get('estado');
        $gradoacademicos->id_docente = $request->get('id_docente');
        $gradoacademicos->id_grado_academico = $request->get('id_grado_academico');
        $gradoacademicos->id_grupo = $request->get('id_grupo');

        $gradoacademicos->save();

        return Redirect::to('gradoacademicoperiodo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gradoacademico = GradoAcademicoPeriodo::findOrFail($id);
        $docentes = Docente::all();
        $grados = GradoAcademico::all();
        $grupos = Grupo::all();
        $estudiantes = Estudiante::all()->where('estado', 1);
        $estudiantesGrupo = GradoAcademicoPeriodoDetalle::all()->where('id_grado_academico_periodo', $id);
        $capacidad = 30;
        $total = count($estudiantesGrupo);
        $complemento = count($estudiantes) < $capacidad - $total ? count($estudiantes) : $capacidad;

        return view("gradoacademicoperiodo.edit", [
            "gradoacademico" => $gradoacademico,
            "docentes" => $docentes,
            "grados" => $grados,
            "grupos" => $grupos,
            "estudiantes" => $estudiantes,
            "estudiantesGrupos" => $estudiantesGrupo,
            "total" => $total,
            "complemento" => $complemento,
            "indice" => 0,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gradoacademicos = GradoAcademicoPeriodo::findOrFail($id);

        $gradoacademicos->nombre = $request->get('nombre');
        $gradoacademicos->fecha_inicio = $request->get('fecha_inicio');
        $gradoacademicos->fecha_fin = $request->get('fecha_fin');
        $gradoacademicos->estado = $request->get('estado');
        $gradoacademicos->id_docente = $request->get('id_docente');
        $gradoacademicos->id_grado_academico = $request->get('id_grado_academico');
        $gradoacademicos->id_grupo = $request->get('id_grupo');

        $gradoacademicos->update();

        $estudiantes = $request->get('estudiantes');

        $gapd = GradoAcademicoPeriodoDetalle::onlyTrashed()->where('id_grado_academico_periodo',$id)->get();

        if (count($estudiantes) > 0) {
            $datos = [];
            foreach ($estudiantes as $estudiante) {
                if ($estudiante > 0)
                    $datos[$estudiante] = $estudiante;
            }

            if (count($datos) > 0) {
                foreach ($datos as $estudiante_id) {
                    $registro = new GradoAcademicoPeriodoDetalle();
                    $registro->id_grado_academico_periodo = $id;
                    $registro->id_estudiante = $estudiante_id;
                    $registro->estado = 1;

                    $registro->save();
                }
            }
        }

        return Redirect::to('gradoacademicoperiodo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gradoacademico = GradoAcademicoPeriodo::findOrFail($id);
        $gradoacademico->estado = 0;
        $gradoacademico->update();

        return Redirect::to('gradoacademicoperiodo');
    }
}
