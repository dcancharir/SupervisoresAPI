<?php

namespace App\Http\Controllers;
use App\Supervisor;
use App\Tienda;
use App\VentaDiaria;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function listarDataHojaRuta(){
        $success=false;
        $mensaje="";
        $data="";
        $code=422;
        try{
            $fechaHoy=date('Y-m-d');
            $supervisores=Supervisor::all();
            foreach($supervisores as $supervisor){
                $tiendas=$supervisor->tiendas()->get();

                foreach($tiendas as $tienda){
                   $tienda->ventahoy=$tienda->ventas()
                    ->where('fecha',$fechaHoy)->get();
                }
                $supervisor->tienda=$tiendas;
            }
            $success=true;
            $mensaje="listando data";
            $data=$supervisores;
            $code=200;
        }catch(Exception $ex){
            $mensaje=$ex->getMessage();
        }

        return response()->json([
            'success'=>$success,
            'mensaje'=>$mensaje,
            'data'=>$data,
        ],$code);
    }
}
