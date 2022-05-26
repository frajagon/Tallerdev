<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GrupoFormRequest;
use App\Models\Grupo;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::orderBy('nombre', 'DESC')->paginate(10);
        return view('grupo.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grupo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoFormRequest $request)
    {
        $grupos = new Grupo();
        $grupos->nombre = $request->get('nombre');
        $grupos->codigo = $request->get('codigo');
        $grupos->estado = $request->get('estado');
        $grupos->save();

        return Redirect::to('grupo');
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
        $grupo = Grupo::findOrFail($id);
        return view("grupo.edit", ["grupo" => $grupo]);
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
        $grupos = Grupo::findOrFail($id);
        
        $grupos->nombre = $request->get('nombre');
        $grupos->codigo = $request->get('codigo');
        $grupos->estado = $request->get('estado');
     
        $grupos->update();
        
        return Redirect::to('grupo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->estado = 0;
        $grupo->update();
        
        // $grupos->delete();

        return Redirect::to('grupo');
    }
}
