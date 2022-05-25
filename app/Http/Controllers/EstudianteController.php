<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EstudianteFormRequest;
use App\Models\Acudiente;
use App\Models\Genero;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $estudiantes = Estudiante::orderBy('primer_nombre', 'DESC')->orderBy('primer_apellido', 'DESC')->paginate(10);
        // return view('estudiante.index', compact('estudiantes'));

        // $estudiantes = Estudiante::with('user')->latest()->paginate();

        // $estudiantes = Estudiante::orderBy('primer_nombre', 'DESC')->orderBy('primer_apellido', 'DESC')->get();
        // $estudiantes = Estudiante::orderBy('primer_nombre', 'ASC')->orderBy('primer_apellido', 'ASC')->simplePaginate(7);
        // $estudiantes = Estudiante::orderBy('primer_nombre', 'ASC')->orderBy('primer_apellido', 'ASC')->cursorPaginate(7);
        $estudiantes = Estudiante::orderBy('primer_nombre', 'ASC')->orderBy('primer_apellido', 'ASC')->paginate(7);
        return view('estudiante.index', ['estudiantes' => $estudiantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acudientes = Acudiente::all();

        return view("estudiante.create", ["acudientes" => $acudientes]);
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

        if ($request->hasFile('imagen'))
            $estudiantes->imagen = $request->file('imagen')->store('dist/img/estudiantes','public');
        if(intval($request->get('id_acudiente')))
            $estudiantes->id_acudiente = $request->get('id_acudiente');
        if(intval($request->get('id_genero')))
            $estudiantes->id_genero = $request->get('id_genero');
        
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
        $acudientes = Acudiente::all();
        $generos = Genero::all();

        //dd($acudientes);
        // dd($acudientes->toArray());
        //dd($acudientes->contains('4'));
        //dd($acudientes->except([1,2,3]));
        //dd($acudientes->only(4));
        //dd($acudientes->find(4)); //Busca solamente el id 4
        //dd($acudientes->load('acudiente'));//Carga

        return view("estudiante.edit", [
            "estudiante" => $estudiante,
            "acudientes" => $acudientes,
            "generos" => $generos,
        ]);
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
        
        if ($request->hasFile('imagen'))
            $estudiantes->imagen = $request->file('imagen')->store('dist/img/estudiantes','public');
        if(intval($request->get('id_acudiente')))
            $estudiantes->id_acudiente = $request->get('id_acudiente');
        if(intval($request->get('id_genero')))
            $estudiantes->id_genero = $request->get('id_genero');

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
