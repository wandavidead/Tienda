<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realizacion extends Model
{
    use HasFactory;

    protected $table = "realizaciones";

    protected $fillable = [
        'nombre',
    ];

    //Relacion uno a muchos
    public function producto(){
        return $this->hasMany('App\Models\Producto');
    }
}
