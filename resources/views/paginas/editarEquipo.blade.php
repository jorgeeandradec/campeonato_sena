@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($equipo as $fila)

                    <form method="POST" action="{{ url('/') }}/equipos/{{ $fila['idEquipo'] }}">

                    @method('PUT')<!-- PUT quiere decir actualiza -->
                   
                    @csrf

                    <!-- <div class="form-group row">
                        <label for="idEquipo" class="col-sm-2 col-form-label">id Equipo</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="idEquipo" value="{{ $fila['idEquipo']}}" readonly>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label for="nombreEquipo" class="col-sm-2 col-form-label">Nombre Equipo</label>
                        <div class="col-sm-10">
                        
                        <input type="text" class="form-control" id="nombreEquipo" name="nombreEquipo" value="{{ $fila['nombreEquipo']}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_centro_formacion" class="col-sm-2 col-form-label">Centro de formación</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="id_centro_formacion">

                            @foreach ($centrosFormacion as $centroF)
                            
                            @if($centroF['id_centro_formacion'] == $fila['id_centro_formacion'])

                            <option value="{{ $centroF['id_centro_formacion'] }}" selected>{{ $centroF['nombre_centro'] }}</option>
                            
                            @else

                            <option value="{{ $centroF['id_centro_formacion'] }}">{{ $centroF['nombre_centro'] }}</option>
                            

                            @endif

                            @endforeach
                        
                        </select>

                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="generoEquipo" class="col-sm-2 col-form-label">Genero Equipo</label>
                        <div class="col-sm-10">
                       <select class="form-control" name="generoEquipo">
                       <option value="F" @if($fila->generoEquipo == 'F') selected @endif >FEMENINO</option>
                       <option value="M" @if($fila->generoEquipo == 'M') selected @endif >MASCULINO</option>
                       </select>
                        <!-- <input type="text" class="form-control" id="generoEquipo" value="{{ $fila['generoEquipo']}}"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombreEquipo" class="col-sm-2 col-form-label">Equipo Activo</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="equipoActivo" name="equipoActivo">

                            <option value="si" @if($fila->equipoActivo == 'si') selected @endif >SI</option>
                            <option value="no" @if($fila->equipoActivo == 'no') selected @endif >NO</option>
                        
                        </select>
                        
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                    <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                    {{__('Actualizar')}}
                    </button>
                    </div>
                    </div>
                    
                    </form>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection