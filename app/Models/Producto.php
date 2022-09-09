<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'cantidad',
        'precio',
        'impuesto',
        'precio_impuesto',
        'proveedor_id',
    ];


    //Relaciones uno a muchos
    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor');
    }

    //Relaciones muchos a muchos
    public function subcategorias()
    {
        return $this->belongsToMany('App\Models\Subcategoria');
    }

    public function pedido()
    {
        return $this->belongsToMany('App\Models\Pedido');
    }
}
