<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{

    protected $table = 'asistencias';

    public function asistible()
    {
        return $this->morphTo()->withTrashed();
    }

    protected $fillable = [
    'cliente_id',
    'fecha'
    ];
}
