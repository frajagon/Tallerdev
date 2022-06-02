<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DocenteFormRequest;
use App\Models\Role;
use App\Models\User;
use Throwable;

class DocenteController extends Controller
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

        $docentes = Docente::orderBy('primer_nombre', 'ASC')
            ->numeroIdentificacion($identificacion)
            ->nombres($nombres)
            ->apellidos($apellidos)
            ->orderBy('primer_apellido', 'ASC')
            ->paginate(10);

        return view('docente.index', [
            'docentes' => $docentes,
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
        return view('docente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocenteFormRequest $request)
    {
        $docentes = new Docente;
        $docentes->primer_nombre = $request->get('primer_nombre');
        $docentes->segundo_nombre = $request->get('segundo_nombre');
        $docentes->primer_apellido = $request->get('primer_apellido');
        $docentes->segundo_apellido = $request->get('segundo_apellido');
        $docentes->fecha_nacimiento = $request->get('fecha_nacimiento');
        $docentes->numero_identificacion = $request->get('numero_identificacion');
        $docentes->estado = $request->get('estado');

        if ($request->hasFile('imagen'))
            $docentes->imagen = $request->file('imagen')->store('dist/img/docentes', 'public');


        $email = trim($request->get('usuario'));
        $password = $request->get('clave');

        if ($email) {
            $user = '';
            $role = Role::where('name', 'docente')->first();

            try {
                $user = User::where('email', $email)->firstOrFail();

                $user->email = $email;
                $user->name = 'Acudiente';
                $user->password = bcrypt($password);

                $user->update();
            } catch (Throwable $e) {
                $user = new User();
                $user->name = 'Acudiente';
                $user->password = bcrypt($password);

                if ($password)
                    $user->email = $email;

                $user->save();
            }

            if ($user->count()){
                $user->roles()->attach($role);
                $docentes->id_usuario = $user->id;
            }
        }

        $docentes->save();

        return Redirect::to('docente');
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
        $docente = Docente::findOrFail($id);

        return view("docente.edit", [
            "docente" => $docente
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
        $docentes = Docente::findOrFail($id);

        $docentes->primer_nombre = $request->get('primer_nombre');
        $docentes->segundo_nombre = $request->get('segundo_nombre');
        $docentes->primer_apellido = $request->get('primer_apellido');
        $docentes->segundo_apellido = $request->get('segundo_apellido');
        $docentes->fecha_nacimiento = $request->get('fecha_nacimiento');
        $docentes->numero_identificacion = $request->get('numero_identificacion');
        $docentes->estado = $request->get('estado');

        if ($request->hasFile('imagen'))
            $docentes->imagen = $request->file('imagen')->store('dist/img/docentes', 'public');

        $email = trim($request->get('usuario'));
        $password = $request->get('clave');

        if ($email) {
            $user = '';
            $role = Role::where('name', 'docente')->first();

            try {
                $user = User::where('email', $email)->firstOrFail();

                $user->email = $email;
                $user->name = 'Acudiente';
                $user->password = bcrypt($password);

                $user->update();
            } catch (Throwable $e) {
                $user = new User();
                $user->name = 'Acudiente';
                $user->password = bcrypt($password);

                if ($password)
                    $user->email = $email;

                $user->save();
            }

            if ($user->count()){
                $user->roles()->attach($role);
                $docentes->id_usuario = $user->id;
            }
        }

        $docentes->update();

        return Redirect::to('docente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docentes = Docente::findOrFail($id);
        $docentes->estado = 0;
        $docentes->update();

        // $docentes->delete();

        return Redirect::to('docente');
    }
}
