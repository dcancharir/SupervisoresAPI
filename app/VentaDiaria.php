<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaDiaria extends Model
{
    //   
    protected $table='venta_diaria';
    protected $primaryKey='venta_id';
    protected $fillable = [
        'fecha', 
        'tienda_id', 
        'monto',
        'moneda',
    ];
}
