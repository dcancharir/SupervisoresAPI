<?php

namespace App\Http\Controllers;

use App\Tienda;
use App\VentaDiaria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class VentaDiariaController extends Controller
{
    //
    public function generarVentaDiaria(){
        $fechaHoy=date('Y-m-d');
        $moneda='PEN';
        try{
            $ventas=VentaDiaria::where('fecha','2021-04-03')->get();
            if($ventas->count()>0){
                $tiendas=Tienda::all();
                foreach($tiendas as $tienda){
                    $ventaDiara=new VentaDiaria();
                    $ventaDiara->fecha=$fechaHoy;
                    $ventaDiara->moneda=$moneda;
                    $ventaDiara->monto=Rand(10000, 30000) / 10;
                    $ventaDiara->tienda_id=$tienda->tienda_id;
                    $ventaDiara->save();
                }
                return response()->json([
                    'success'=>true,
                    'message'=>'data insertada',
                ],200);
            }
            else{
                return response()->json([
                    'success'=>true,
                    'message'=>'ya se hay ventas registradas este dia',
                ],200);
            }
        }
        catch(QueryException $ex){
            return response()->json([
                'success'=>false,
                'message'=> $ex->getMessage(),
            ],401);
        }
 
    }
}
