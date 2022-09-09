<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relaciones muchos a muchos
    public function producto(){
        return $this->belongsToMany('App\Models\Producto');
    }
}
