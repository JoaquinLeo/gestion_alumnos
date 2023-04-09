@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success')}}
                </div>
            @endif

            @if(session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger')}}
                </div>
            @endif
            
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" 
                    data-placement="top" title="Agregar Alumno" href=" {{ route('alumnos.create' ) }} "> 
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                @if(sizeof ($alumnos) > 0 )
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Acciones</th>
                                <th scope="col">#</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Email</th>
                                <th scope="col">Fecha Nacimiendo</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Genero</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumnos as $alumno)
                            <tr>
                                <td class="text-center" width="20%">
                                    <a href=" {{ route('alumnos.show' , $alumno ) }} " class="btn btn-primary btn-sm shadow-none" 
                                            data-toggle="tooltip" data-placement="top" title="Ver Alumno">
                                        <i class="fa fa-book fa-fw text-white"></i></a>
                                    </a>
                                    <a href=" {{ route('alumnos.edit' , $alumno ) }} " class="btn btn-success btn-sm shadow-none" 
                                            data-toggle="tooltip" data-placement="top" title="Editar Alumno">
                                        <i class="fa fa-pencil fa-fw text-white"></i></a>
                                    </a>
                                    <form action="{{ route('alumnos.destroy' , $alumno ) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                        <button id="delete" name="delete" type="submit" 
                                                class="btn btn-danger btn-sm shadow-none" 
                                                data-toggle="tooltip" data-placement="top" title="Eliminar Alumno"
                                                onclick="return confirm('¿Estás seguro de eliminar?')">
                                            <i class="fa fa-trash-o fa-fw"></i>
                                        </button>
                                    </form>
                                </td>
                                <td scope="row">{{$alumno->id}}</td>
                                <td scope="row">{{$alumno->nombres}}</td>
                                <td scope="row">{{$alumno->nombres}}</td>
                                <td scope="row">{{$alumno->apellidos}}</td>
                                <td scope="row">{{$alumno->telefono}}</td>
                                <td scope="row">{{$alumno->email}}</td>
                                <td scope="row">{{date('d-m-Y',strtotime($alumno->fecha_nac))}}</td>
                                <td scope="row">{{
                                                    $alumno->id_carrera
                                                    ?$alumno->carrera->nombre
                                                    :'Aun sin carrera'
                                                }}
                                </td>
                                <td scope="row">{{
                                                    $alumno->id_genero
                                                    ?$alumno->genero->tipo
                                                    :'Aun sin genero'
                                                }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                    {!! $alumnos->links() !!}
                    </div>             
                </div>
                @else
                    <div class="alert alert-secondary">No se encontraron resultados.</div>
                @endif
            </div>
        </div>
    </div>

@endsection