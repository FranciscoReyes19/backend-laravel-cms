<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empleado;
use App\Proceso;
use App\User;

class PersonalAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        //return json_decode($user);
        return view('personal.index')->with('users', $users);

    }
    /**
    public function Empleados()
    {
        $empleados = Empleado::all();
        
        return response()->json([
                    'code' => 200,
                    'status' => 'success',
                    'posts' => $empleados
                        ], 200);
    }
    **/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleado;
        $empleado->empleado_id = $request->input('empleado_id');
        $empleado->nombre_empleado = $request->input('nombre_empleado');
        $empleado->type = $request->input('type');
        $empleado->apellido_empleado = $request->input('apellido_empleado');

        $empleado->save();
        \Toast::success($empleado->nombre_empleado, 'Empleado agregado');
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $clave_empleado
     * @return \Illuminate\Http\Response
     */
    public function show($clave_empleado)
    {
        $empleado = Empleado::find($clave_empleado);
        // $proceso = Proceso::get();
        $proceso = \DB::select('select * from procesos');
        return view('empleados.show', ['empleado' => $empleado, 'proceso' => $proceso]);
        // return view('empleados.show')->with('empleado', $empleado);
        // return view('empleados.show')->with('empleado', $empleado);
        // return view('empleados.show')->with('procesos', $proceso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $clave_empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($clave_empleado)
    {
        $empleado = Empleado::find($clave_empleado);
        return view('empleados.edit')->with('empleados',$empleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $clave_empleado
     * @return \Illuminate\Http\Response
     */
    //public function update($user,$name)
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        try{
            $user->save();
            \Toast::success('Datos del Usuario actualizado');
            return redirect()->route('personal.index');
        }catch( Exception $err){
            \Toast::success('No se ha realizado la actualizacion', $err);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $clave_empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($clave_empleado)
    {
        $empleado = Empleado::find($clave_empleado);
        $empleado->delete();
        \Toast::info('#'.$clave_empleado,'Empleado eliminado');
        return redirect()->route('empleados.index');
    }

}
