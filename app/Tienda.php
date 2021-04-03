<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    //
    protected $table='tienda';
    protected $primaryKey='tienda_id';
    protected $fillable = [
        'tienda_id',
        'cc', 
        'nombre', 
        'direccion',
        'razon_social_id',
        'latitud',
        'longitud',
        'correo_jop',
        'correo_sop',
        'ubigeo',
        'supervisor_id'
    ];
}
