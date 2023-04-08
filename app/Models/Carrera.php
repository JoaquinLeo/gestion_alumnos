<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];

    // para eliminir los campos de creacion y actualizacion que vienen por defecto
    public $timestamps = false ;

}
