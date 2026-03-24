<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membresia extends Model
{
    use SoftDeletes;

    protected $table = 'membresias';

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'duracion'
    ];
}
