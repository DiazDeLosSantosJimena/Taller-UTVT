@extends('layout.layoutAdmin')
@section('content')
<h1 class="my-4">Inicio</h1>
<div class="row justify-content-center p-4">
    <div class="col-sm-12 col-md-4">
        <div class="card bg-primary border-dark mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Registros</h5>
                <p class="card-text">Creación, lectura, edición y eliminación de los registros.</p>
            </div>
            <ul class="collapse list-group list-group-flush" id="collapseExample">
                <li class="list-group-item"><a href="{{ route('users.show') }}"><i class="bi bi-people-fill"></i> Usuarios...</a></li>
                <li class="list-group-item"><a href="{{ route('taller.index') }}"><i class="bi bi-boxes"></i> Talleres...</a></li>
            </ul>
            <div class="card-footer text-center">
                <a class="card-link text-reset" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Opciones...</a>
            </div>

        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="card bg-success border-dark mb-3 text-center shadow" style="max-width: 18rem;">
            <div class="card-body text-dark">
                <h5 class="card-title">Publicaciones</h5>
                <p class="card-text">Avisos/Convocatorias sobre los talleres.</p>
            </div>
            <div class="card-footer bg-transparent border-dark">
                <a href="{{ route('publicaciones.index') }}" class="card-link text-reset">Ir...</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="card bg-warning border-dark mb-3 text-center shadow" style="max-width: 18rem;">
            <div class="card-body text-dark">
                <h5 class="card-title">Eventos</h5>
                <p class="card-text">Eventos sobre los diferentes talleres.</p>
            </div>
            <div class="card-footer bg-transparent border-dark">
                <a href="#" class="card-link text-reset">Ir...</a>
            </div>
        </div>
    </div>
</div>

<?php
    $fecha_actual = date("Y-m-d");
?>
@if(!($fecha_actual >= $periodo->fecha_inicio && $fecha_actual <= $periodo->fecha_fin) || $periodo === null)
<div class="row">
    <div class="col-12">
        <h1>Registro de Periodo</h1>
        <p>En esté apartado se establecera el periodo con el que se harán los registos de las asistencias para los talleres.</p>
    </div>
    <form action="{{ route('agregar_periodo') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="col-6 pt-5 text-center">
            <h5>Fecha de inicio del periodo</h5>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="dd/mm/yyyy">
        </div>
        <div class="col-6 pt-5 text-center">
            <h5>Fecha de fin del periodo</h5>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="dd/mm/yyyy">
        </div>
        <div class="col-12 py-5 text-center">
            <button class="btn btn-success" type="submit">Establecer</button>
        </div>
    </form>
</div>
@endif

@endsection