<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrenador extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'entrenadores';

    public function clientes(){
        return $this->hasMany(Cliente::class);
    }

    public function asistencias()
    {
        return $this->morphMany(Asistencia::class, 'asistible');
    }

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'edad',
        'especialidad'
    ];
}
