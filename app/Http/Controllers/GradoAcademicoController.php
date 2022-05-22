<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradoAcademico;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GradoAcademicoFormRequest;

class GradoAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gradoacademicos = GradoAcademico::orderBy('nombre', 'DESC')->paginate(10);
        return view('gradoacademico.index', compact('gradoacademicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gradoacademico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoAcademicoFormRequest $request)
    {
        $gradoacademicos = new GradoAcademico;
        $gradoacademicos->nombre = $request->get('nombre');
        $gradoacademicos->descripcion = $request->get('descripcion');
        $gradoacademicos->orden = $request->get('orden');
        $gradoacademicos->estado = $request->get('estado');
        $gradoacademicos->save();

        return Redirect::to('gradoacademico');
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
        $gradoacademico = GradoAcademico::findOrFail($id);
        return view("gradoacademico.edit", ["gradoacademico" => $gradoacademico]);
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
        $gradoacademicos = GradoAcademico::findOrFail($id);
        
        $gradoacademicos->nombre = $request->get('nombre');
        $gradoacademicos->descripcion = $request->get('descripcion');
        $gradoacademicos->orden = $request->get('orden');
        $gradoacademicos->estado = $request->get('estado');
     
        $gradoacademicos->update();
        
        return Redirect::to('gradoacademico');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gradoacademico = GradoAcademico::findOrFail($id);
        $gradoacademico->estado = 0;
        $gradoacademico->update();
        
        // $gradoacademicos->delete();

        return Redirect::to('gradoacademico');
    }
}
