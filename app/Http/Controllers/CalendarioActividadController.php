<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarioActividad;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CalendarioActividadFormRequest;
use Throwable;

class CalendarioActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = CalendarioActividad::orderBy('nombre', 'DESC')->paginate(10);
        return view('calendarioactividad.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calendarioactividad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalendarioActividadFormRequest $request)
    {
        // $actividades = new CalendarioActividad();
        // $actividades->nombre_actividad = $request->get('nombre_actividad');
        // $actividades->descripcion = $request->get('descripcion');
        // $actividades->fecha_inicio = $request->get('fecha_inicio');
        // $actividades->fecha_fin = $request->get('fecha_fin');
        // $actividades->estado = $request->get('estado');
        // $actividades->save();

        // return Redirect::to('calendarioactividad');
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
        $actividade = CalendarioActividad::findOrFail($id);
        return view("calendarioactividad.edit", ["calendarioactividad" => $actividade]);
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
        $actividades = CalendarioActividad::findOrFail($id);

        $actividades->nombre_actividad = $request->get('nombre_actividad');
        $actividades->descripcion = $request->get('descripcion');
        $actividades->fecha_inicio = $request->get('fecha_inicio');
        $actividades->fecha_fin = $request->get('fecha_fin');
        $actividades->estado = $request->get('estado');

        $actividades->update();

        return Redirect::to('calendarioactividad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividade = CalendarioActividad::findOrFail($id);
        $actividade->estado = 0;
        $actividade->update();

        return Redirect::to('calendarioactividad');
    }
}
