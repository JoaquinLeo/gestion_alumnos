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
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" 
                    href=" {{ route('alumnos.index') }} "> 
                        <i class="fa fa-home fa-fw"></i> 
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <form  action="{{ route('alumnos.update' , $alumno ) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')
                <div class="col-md-6">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control shadow-none" id="nombres" name="nombres" 
                    value="{{ old('nombres' , $alumno->nombres) }}">
                    @error('nombres')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control shadow-none" id="apellidos" name="apellidos" 
                    value="{{ old('apellidos', $alumno->apellidos) }}">
                    @error('apellidos')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control shadow-none" id="direccion" name="direccion" 
                    value="{{ old('direccion', $alumno->direccion) }}">
                    @error('direccion')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="number" class="form-control shadow-none" id="telefono" name="telefono" 
                    value="{{ old('telefono', $alumno->telefono) }}">
                    @error('telefono')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="mail" class="form-control shadow-none" id="email" name="email" 
                    value="{{ old('email', $alumno->email) }}">
                    @error('email')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="fecha_nac" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control shadow-none" id="fecha_nac" name="fecha_nac" 
                    value="{{ old('fecha_nac', $alumno->fecha_nac ) }}">
                    @error('fecha_nac')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="id_carrera" class="form-label">Carrera</label>
                    <select id="id_carrera" class="form-select shadow-none" name="id_carrera" value="{{ old('id_carrera') }}">
                    <option value="" selected>Seleccionar...</option>
                        @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}" {{ ($alumno->id_carrera == $carrera->id) ? 'selected' : '' }}>
                            {{$carrera->nombre}}
                        </option>
                        @endforeach
                    </select>
                    @error('id_carrera')
                        <small class="text-danger" role="alert">
                            Seleccione una Carrera
                        </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="id_genero" class="form-label">Genero</label>
                    <select id="id_genero" class="form-select shadow-none" name="id_genero" value="{{ old('id_genero') }}">
                    <option value="" selected>Seleccionar...</option>
                        @foreach($generos as $genero)
                        <option value="{{ $genero->id }}" {{ ($alumno->id_carrera == $genero->id) ? 'selected' : '' }}>
                            {{$genero->tipo}}
                        </option>
                        @endforeach
                    </select>
                    @error('id_genero')
                        <small class="text-danger" role="alert">
                            Seleccione un Genero
                        </small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection