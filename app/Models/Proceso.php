<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre',
    ];

    //Relacion uno a muchos
    public function producto(){
        return $this->hasMany('App\Models\Producto');
    }
}
