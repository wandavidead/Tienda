<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'valor',
    ];

    //Relacion uno a muchos
    public function producto(){
        return $this->hasMany('App\Models\Producto');
    }

    public function pedido(){
        return $this->hasMany('App\Models\Pedido');
    }
}
