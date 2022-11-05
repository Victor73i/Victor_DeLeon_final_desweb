<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all(['id','nombre','descripcion','clave','edad','grado','created_at','updated_at']);
        return response()->json($estudiantes);
    }
    public function create()
    {

        //


    }



    public function store(Request $request)
    {
$estudiante = Estudiante::create($request->post());
return response()->json([
'estudiante'=>$estudiante,
'mensaje'=>'¡Registro ingresado correctamente!'



]);

}
public function show(Estudiante $estudiante)
{


    return response()->json($estudiante);


}
public function edit(Estudiante $estudiante)
{

    //


}
public function update(Request $request, Estudiante $estudiante)
{


    $estudiante->fill($request->post())->save();
    return response()->json([
        'estudiante'=>$estudiante
    ]);


}
public function destroy(Estudiante $estudiante)
{


    $estudiante->delete();
    return response()->json([
        'mensaje'=>'¡Registro eliminado correctamente!'
    ]);



}
public function deleteEstudiante($id){
    $estudiante= $this->getEstudiante($id);
    $estudiante->delete();
    $estudiante1 = response()->json([
        'mensaje'=>'¡Registro eliminado correctamente!'
    ]);
    return [$estudiante, $estudiante1];

}
public function getEstudiante($id)
{
    $estudiante = Estudiante::find($id);

    return $estudiante;

}
public function getEstudiante1($id)
{
    $estudiante = Estudiante::find($id);
    $estudiante1 = response()->json([
        'mensaje'=>'¡Registro OBtenido correctamente!'
    ]);
    return [$estudiante,$estudiante1];

}

public function editEstudiante($id, Request $request){
    $estudiante = $this->getEstudiante($id);
    $estudiante->fill($request->all())->save();
    $estudiante1 = response()->json([
        'mensaje'=>'¡Registro Editado correctamente!'
    ]);
    return [$estudiante,$estudiante1];
}}
