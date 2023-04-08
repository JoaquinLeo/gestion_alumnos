<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombres','apellidos','dirreccion','telefono','email','fecha_nac','id_carrera','id_genero'];

    // para eliminir los campos de creacion y actualizacion que vienen por defecto
    public $timestamps = false ;

    // Un alumno puede tener una carrera -> belongsTo
    public function carrera(){
    //primero de la otra tabla (generos), segundo de la tabla propia(alumnos)                                  
        return $this->belongsTo(Carrera::class,'id_carrera',       'id');
    }

    // Un alumno  puede tener un genero -> belongsTo
    public function genero(){
    //primero de la otra tabla (generos), segundo de la tabla propia(alumnos)                                  
        return $this->belongsTo(Genero::class,'id_genero',       'id');
    }
}
