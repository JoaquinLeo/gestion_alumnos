<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'generos';
    protected $primaryKey = 'id';
    protected $fillable = ['tipo'];

    // para eliminir los campos de creacion y actualizacion que vienen por defecto
    public $timestamps = false ;
}
