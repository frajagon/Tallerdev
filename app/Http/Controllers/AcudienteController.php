<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acudiente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AcudienteFormRequest;

class AcudienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $identificacion = $request->get('identificacion');
        $nombres = $request->get('nombres');
        $apellidos = $request->get('apellidos');

        $acudientes = Acudiente::orderBy('primer_nombre', 'ASC')
            ->numeroIdentificacion($identificacion)
            ->nombres($nombres)
            ->apellidos($apellidos)
            ->orderBy('primer_apellido', 'ASC')
            ->paginate(10);
            
        return view('acudiente.index', [
            'acudientes' => $acudientes,
            'filtros' => [
                'identificacion' => $identificacion,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acudiente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcudienteFormRequest $request)
    {
        $acudientes = new Acudiente;
        $acudientes->primer_nombre = $request->get('primer_nombre');
        $acudientes->segundo_nombre = $request->get('segundo_nombre');
        $acudientes->primer_apellido = $request->get('primer_apellido');
        $acudientes->segundo_apellido = $request->get('segundo_apellido');
        $acudientes->fecha_nacimiento = $request->get('fecha_nacimiento');
        $acudientes->numero_identificacion = $request->get('numero_identificacion');
        $acudientes->estado = $request->get('estado');
        
        if ($request->hasFile('imagen'))
        $acudientes->imagen = $request->file('imagen')->store('dist/img/acudientes', 'public');
        
        $acudientes->save();

        return Redirect::to('acudiente');
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
        $acudiente = Acudiente::findOrFail($id);
        return view("acudiente.edit", ["acudiente" => $acudiente]);
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
        $acudientes = Acudiente::findOrFail($id);

        $acudientes->primer_nombre = $request->get('primer_nombre');
        $acudientes->segundo_nombre = $request->get('segundo_nombre');
        $acudientes->primer_apellido = $request->get('primer_apellido');
        $acudientes->segundo_apellido = $request->get('segundo_apellido');
        $acudientes->fecha_nacimiento = $request->get('fecha_nacimiento');
        $acudientes->numero_identificacion = $request->get('numero_identificacion');
        $acudientes->estado = $request->get('estado');
        
        if ($request->hasFile('imagen'))
        $acudientes->imagen = $request->file('imagen')->store('dist/img/acudientes', 'public');
        
     
        $acudientes->update();
        
        return Redirect::to('acudiente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acudientes = Acudiente::findOrFail($id);
        $acudientes->estado = 0;
        $acudientes->update();
        
        // $acudientes->delete();

        return Redirect::to('acudiente');
    }
}
