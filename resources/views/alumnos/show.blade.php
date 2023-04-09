@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" 
                    data-placement="top" title="Inicio" href=" {{ route('alumnos.index') }} "> 
                        <i class="fa fa-home fa-fw"></i> 
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mx-auto" style="width: 50%;">
                <div class="card-header text-center">
                    <h3>Alumno</h3>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title"><b>Nombres: {{ $alumno->nombres }}</b></h5>
                    <h5 class="card-title"><b>Apellidos: {{ $alumno->apellidos }}</b></h5>
                    <h5 class="card-title"><b>Direccion: {{ $alumno->direccion }}</b></h5>
                    <h5 class="card-title"><b>Telefono: {{ $alumno->telefono }}</b></h5>
                    <h5 class="card-title"><b>Email: {{ $alumno->email }}</b></h5>
                    <h5 class="card-title"><b>Fecha de Nacimiento: {{ date('d-m-Y',strtotime($alumno->fecha_nac)) }}</b></h5>
                    <h5 class="card-title"><b>Carrera: {{   $alumno->id_carrera
                                                            ?$alumno->carrera->nombre
                                                            :'Aun sin carrera' 
                                                        }}</b></h5>
                    <h5 class="card-title"><b>Genero: {{    $alumno->id_genero
                                                            ?$alumno->genero->tipo
                                                            :'Aun sin genero' 
                                                        }}</b></h5>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection