<?php

namespace App\Http\Controllers;
use App\Tienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    //
    public function obtenerTodo(){
        $tiendas=Tienda::all();
        return $tiendas;
    }
    public function obtenerTiendasSupervisor(){
        // return response()->json(Auth::user());
        // return response()->json(auth()->user());
        $supervisor = auth()->user();
        // $tiendas=Tienda::where('supervisor_id',$user->supervisor_id)->get();
        $tiendas= $supervisor->tiendas()->get();
        return $tiendas;
    }
}