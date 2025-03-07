@extends('layout.layoutAdmin')
@section('content')
<?php
$fecha_actual = date("Y-m-d");
?>

<h1 class="my-4">Inicio</h1>

@if(!$periodo || $fecha_actual >= $fecha_fin)
<div class="row">
    <div class="col-12">
        <h1>Registro de Periodo</h1>
        <p>En esté apartado se establecera el periodo con el que se harán los registos de las asistencias para los talleres.</p>
        <div class="form-text" id="basic-addon4">Nota: Una vez establecido el periodo esté no se podrá cambiar hasta pasada la <strong>fecha de fin del periodo</strong> registrado.</div>
    </div>
    <div class="col-6 pt-5 text-center">
        <form action="{{ route('agregar_periodo') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <h5>Fecha de inicio del periodo</h5>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="dd/mm/yyyy">
    </div>
    <div class="col-6 pt-5 text-center">
        <h5>Fecha de fin del periodo</h5>
        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="dd/mm/yyyy">
    </div>
    <div class="col-12 py-5 text-center">
        <button class="btn btn-success" type="submit">Establecer</button>
        </form>
    </div>
</div>
@else
<div class="row">
    <div class="col text-center">
        <h4>Periodo</h4>
        <p class="text-capitalize">{{ \Carbon\Carbon::parse($periodo->fecha_inicio)->translatedFormat('F') .' | '. Carbon\Carbon::parse($periodo->fecha_fin)->translatedFormat('F') }}</p>
    </div>
</div>
@endif

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Exito!</strong> {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row justify-content-center p-4">
    <div class="col-sm-12 col-md-4">
        <div class="card bg-primary border-dark mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Registros</h5>
                <p class="card-text">Creación, lectura, edición y eliminación de los registros.</p>
            </div>
            <ul class="collapse list-group list-group-flush" id="collapseExample">
                <li class="list-group-item"><a href="{{ route('users.show') }}"><i class="bi bi-people-fill"></i> Alumnos...</a></li>
                <li class="list-group-item"><a href="{{ route('taller.index') }}"><i class="bi bi-boxes"></i> Talleres...</a></li>
                <li class="list-group-item"><a href="{{ route('tallerdocen.index') }}"><i class="bi bi-boxes"></i> Docentes Talleres...</a></li>
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
                <a href="#" class="card-link text-reset" data-bs-toggle="modal" data-bs-target="#exampleModal">Ir...</a>
            </div>
        </div>
    </div>
</div>


<!-- Modal Evento -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Evento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label"><strong class="text-danger">*</strong> Título del evento</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"><strong class="text-danger">*</strong> Imagen del evento</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" aria-describedby="imagenHelp">
                        <div id="imagenHelp" class="form-text">Este banner desaparecera despues de determinado tiempo.</div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Publicar</button>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection