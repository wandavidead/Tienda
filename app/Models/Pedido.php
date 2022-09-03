<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function impuesto(){
        return $this->belongsTo('App\Models\Impuesto');
    }

    public function pago(){
        return $this->belongsTo('App\Models\Pago');
    }
    
    public function realizacion(){
        return $this->belongsTo('App\Models\Realizacion');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relaciones muchos a muchos
    public function producto(){
        return $this->belongsToMany('App\Models\Producto');
    }
}
