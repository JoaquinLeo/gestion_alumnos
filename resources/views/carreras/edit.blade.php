@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning')}}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success')}}
                </div>
            @endif

            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('carreras.index') }}"> 
                        <i class="fa fa-home fa-fw"></i> 
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <form  action="{{ route('carreras.update', $carrera) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre de Carrera</label>
                    <!-- old para que no se borre el input ya escrito -->
                    <input type="text" class="form-control shadow-none" id="nombre" name="nombre" 
                    value="{{ old('tipo', $carrera->nombre) }}">
                    @error('nombre')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection