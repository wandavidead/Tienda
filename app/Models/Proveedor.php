<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre_Fiscal',
        'cif',
        'direccion', 
        'codigo_postal',
        'provincia',
        'municipio',
    ];


    //Relaciones uno a muchos
    public function producto(){
        return $this->hasMany('App\Models\Producto');
    }

    
}
