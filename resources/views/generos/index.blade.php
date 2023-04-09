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
                    data-placement="top" title="Agregar Genero" href=" {{ route('generos.create' ) }} "> 
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                @if(sizeof ($generos) > 0 )
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Acciones</th>
                                <th scope="col">#</th>
                                <th scope="col">Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($generos as $genero)
                            <tr>
                                <td class="text-center" width="20%">
                                    <a href=" {{ route('generos.show' , $genero ) }} " class="btn btn-primary btn-sm shadow-none" 
                                            data-toggle="tooltip" data-placement="top" title="Ver Genero">
                                        <i class="fa fa-book fa-fw text-white"></i></a>
                                    </a>
                                    <a href=" {{ route('generos.edit' , $genero ) }} " class="btn btn-success btn-sm shadow-none" 
                                            data-toggle="tooltip" data-placement="top" title="Editar Genero">
                                        <i class="fa fa-pencil fa-fw text-white"></i></a>
                                    </a>
                                    <form action="{{ route('generos.destroy' , $genero ) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                        <button id="delete" name="delete" type="submit" 
                                                class="btn btn-danger btn-sm shadow-none" 
                                                data-toggle="tooltip" data-placement="top" title="Eliminar Genero"
                                                onclick="return confirm('¿Estás seguro de eliminar?')">
                                            <i class="fa fa-trash-o fa-fw"></i>
                                        </button>
                                    </form>
                                </td>
                                <td scope="row">{{$genero->id}}</td>
                                <td scope="row">{{$genero->tipo}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                    {!! $generos->links() !!}
                    </div>             
                </div>
                @else
                    <div class="alert alert-secondary">No se encontraron resultados.</div>
                @endif
            </div>
        </div>
    </div>

@endsection