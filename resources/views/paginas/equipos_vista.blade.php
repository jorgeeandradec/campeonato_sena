@extends('layouts.app')

@section('content')
<div class="container">
<div class="form-group col-md-4">
    <h3>Buscar equipo</h3>
    <input v-model="textoEquipo" type="text" class="form-control" v-on:keyup="buscarEquipo()">
</div>



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
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Centro de formación</th>
                                <th>Genero</th>
                                <th>Activo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr v-for="fila_equipo in arregloEquipos">

                                <td>@{{fila_equipo.nombreEquipo }}</td>

                                <td>@{{fila_equipo.nombre_centro }}</td>
                                
                                <td>@{{fila_equipo.generoEquipo }}</td>
                                <td>@{{fila_equipo.equipoActivo }}</td>
                                <td>
                                    <a v-bind:href="'http://127.0.0.1:8000/editarequipos/'+fila_equipo.idEquipo">Editar</a>
</td>
                            </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection