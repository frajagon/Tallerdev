<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EstudianteFormRequest;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::orderBy('primer_nombre', 'DESC')->orderBy('primer_apellido', 'DESC')->paginate(10);
        return view('estudiante.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudianteFormRequest $request)
    {

        // $request->validate([
        //     'primer_nombre' => 'required',
        //     'email' => ['required', 'email', 'unique:estudiantes'],
        //     'password' => ['required', 'min:8'],
        // ]);

        $estudiantes = new Estudiante;
        $estudiantes->primer_nombre = $request->get('primer_nombre');
        $estudiantes->segundo_nombre = $request->get('segundo_nombre');
        $estudiantes->primer_apellido = $request->get('primer_apellido');
        $estudiantes->segundo_apellido = $request->get('segundo_apellido');
        $estudiantes->fecha_nacimiento = $request->get('fecha_nacimiento');
        $estudiantes->numero_identificacion = $request->get('numero_identificacion');
        $estudiantes->estado = $request->get('estado');
        $estudiantes->save();

        return Redirect::to('estudiante');
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
        $estudiante = Estudiante::findOrFail($id);
        // dd($estudiante);
        return view("estudiante.edit", ["estudiante" => $estudiante]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudianteFormRequest $request, $id)
    {
        $estudiantes = Estudiante::findOrFail($id);

        $estudiantes->primer_nombre = $request->get('primer_nombre');
        $estudiantes->segundo_nombre = $request->get('segundo_nombre');
        $estudiantes->primer_apellido = $request->get('primer_apellido');
        $estudiantes->segundo_apellido = $request->get('segundo_apellido');
        $estudiantes->fecha_nacimiento = $request->get('fecha_nacimiento');
        $estudiantes->numero_identificacion = $request->get('numero_identificacion');
        $estudiantes->estado = $request->get('estado');
     
        $estudiantes->update();
        
        return Redirect::to('estudiante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->estado = 0;
        $estudiante->update();
        
        // $estudiantes->delete();

        return Redirect::to('estudiante');
    }
}
