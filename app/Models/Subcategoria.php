<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria_id',
    ];

    //Relaciones uno a muchos
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    //Relaciones muchos a muchos
    public function productos()
    {
        return $this->belongsToMany('App\Models\Producto');
    }
}
