<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;



class Cliente extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'clientes';
    
    public function membresia(){
        return $this->belongsTo(Membresia::class);

    }

    public function entrenador(){
        return $this->belongsTo(Entrenador::class);
    }

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'fecha_registro',
        'membresia_id',
        'entrenador_id'
    ];

    protected $casts = [
        'fecha_registro' => 'date'
    ];

    public function getFechaFinAttribute(){
    
        if (!$this->fecha_registro || !$this->membresia) {
            return null;
        }
    
        return Carbon::parse($this->fecha_registro)->addDays($this->membresia->duracion);
    }
    

    public function diasRestantes(){
        if (!$this->fecha_fin) return 0;

        $hoy = now()->startOfDay();
        $inicio = $this->fecha_registro->copy()->startOfDay();
        $vencimiento = $this->fecha_fin->startOfDay();

        if ($hoy->isBefore($inicio)) {
            return 'futuro'; 
        }   

        return $hoy->diffInDays($vencimiento, false);

        
    }



}
