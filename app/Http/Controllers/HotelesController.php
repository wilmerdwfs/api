<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HotelesController extends Controller
{
    public function getDatos()
    {
        $datos = DB::select("select a.*,
            case when a.idCiudad = 1 then 'Bogota'
                 when a.idCiudad = 3 then 'Barranquilla'
                 when a.idCiudad = 4 then 'Cartagena'
                 when a.idCiudad = 5 then 'Cali' end as nombreCiudad 
            from hoteles a order by id desc ");
        return response()->json($datos);
    }

    public function registrar(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $datos = [];
           
            $id = DB::table('hoteles')->insertGetId(
                    [
                        'nit' => $data['nit'],
                        'nombre'  => $data['nombre'],
                        'direccion' => $data['direccion'],
                        'idCiudad'     => $data['idCiudad'],
                        'direccion' => $data['direccion'],
                        'numeroHabitaciones'    => $data['numeroHabitaciones'],
                    ]
                );
            $datos = DB::select("select a.* from hoteles a order by id desc ");
        }                
        return response()->json([
            'id' => $id,
            'message' => 'Los datos se han guardado correctamente',
            'datos'   => $datos]);
    }

    public function eliminar(Request $request, $id)
    {
        if($request->isMethod('delete')){
            DB::table('hoteles')->where('id', $id)->delete();
        }                
        return response()->json(['message' => 'Registro eliminado correctamente']);
    }

}
