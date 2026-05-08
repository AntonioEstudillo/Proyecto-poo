<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{

    protected $table = 'asistencias';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class)->withTrashed();
    }

    protected $fillable = [
    'cliente_id',
    'fecha'
    ];
}
