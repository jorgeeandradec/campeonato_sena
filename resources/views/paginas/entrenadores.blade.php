@extends('layouts.app')

@section('content')
<div class="container">
<div class="form-group col-md-4">
    <h3>Buscar Entrenador</h3>
    <input v-model="textoEquipo" type="text" class="form-control" v-on:keyup="buscarEquipo()">
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h2>Entrenadores</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection