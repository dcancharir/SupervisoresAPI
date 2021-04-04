<?php

namespace App;

use App\VentaDiaria;
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
    public function ventas(){
        return $this->hasMany(VentaDiaria::class,'tienda_id');
    }
}
