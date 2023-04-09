@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" 
                    href=" {{ route('generos.index') }} "> 
                        <i class="fa fa-home fa-fw"></i> 
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <form  action="{{ route('generos.store') }}" method="POST" class="row g-3">
                    @csrf
                <div class="col-md-6">
                    <label for="tipo" class="form-label">Tipo de Genero</label>
                    <input type="text" class="form-control shadow-none" id="tipo" name="tipo" 
                    value="{{ old('tipo') }}">
                    @error('tipo')
                        <small class="text-danger" role="alert">
                            {{ $message }}
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