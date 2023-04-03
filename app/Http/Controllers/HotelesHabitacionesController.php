<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HotelesHabitacionesController extends Controller
{
    public function getDatos($id)
    {

        $datos = DB::select("select a.*, case when a.tipo = 1 then 'Sencilla'
                 when a.tipo = 2 then 'Doble'
                 when a.tipo = 3 then 'Triple'
                 when a.tipo = 3 then 'Cuatruple' end as acomodacion,

                 case   when a.acomodacion = 1 then 'Estándar'
                        when a.acomodacion = 2 then 'Junior'
                        when a.acomodacion = 3 then 'Suite' end as tipo

                 from hoteles_habitaciones a where idHotel = ".$id."
        order by id desc ");
        return response()->json($datos);
    }

    public function listaId($id)
    {
        $id = (int) $id;
        $datos = DB::table('conductores')->where('id', $id)->first();
        return response()->json($datos);
    }

    public function registrar(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            $datos = [];
           
            DB::table('hoteles_habitaciones')->insertGetId(
                    [
                        'cantidad'    => $data['cantidad'],
                        'idHotel'     => $data['idHotel'],
                        'tipo'        => $data['tipo'],
                        'acomodacion' => $data['acomodacion']
                    ]
                );

            $datos = DB::select("select a.*, case when a.acomodacion = 1 then 'Sencilla'
                 when a.acomodacion = 2 then 'Doble'
                 when a.acomodacion = 3 then 'Triple'
                 when a.acomodacion = 4 then 'Cuatruple'  end as acomodacion,

                 case   when a.tipo = 1 then 'Estándar'
                        when a.tipo = 2 then 'Junior'
                        when a.tipo = 3 then 'Suite' end as tipo
                 from hoteles_habitaciones a  where a.idHotel = ".$data['idHotel']."
            order by id desc");
        }                
        return response()->json([
            'message' => 'Los datos se han guardado correctamente',
            'datos'   => $datos]);
    }

    public function eliminar(Request $request, $id)
    {
        if($request->isMethod('delete')){
            DB::table('hoteles_habitaciones')->where('id', $id)->delete();
        }                
        return response()->json(['message' => 'Registro eliminado correctamente']);
    }

}
