@extends('layout.layoutAdmin')
@section('content')
<h1 class="my-4">Inicio</h1>
<div class="row justify-content-center p-4">
    <div class="col-sm-12 col-md-4">
        <div class="card border-dark mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title">Registros</h5>
                <p class="card-text">Creación, lectura, edición y eliminación de los registros.</p>
            </div>
            <ul class="collapse list-group list-group-flush" id="collapseExample">
                <li class="list-group-item"><a href="#"><i class="bi bi-person-workspace"></i> Docentes...</a></li>
                <li class="list-group-item"><a href="#"><i class="bi bi-people-fill"></i> Alumnos...</a></li>
                <li class="list-group-item"><a href="#"><i class="bi bi-boxes"></i> Talleres...</a></li>
            </ul>
            <div class="card-footer text-center">
                <a class="card-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Opciones...</a>
            </div>

        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="card border-dark mb-3 text-center shadow" style="max-width: 18rem;">
            <div class="card-body text-dark">
                <h5 class="card-title">Publicaciones</h5>
                <p class="card-text">Avisos/Convocatorias sobre los talleres.</p>
            </div>
            <div class="card-footer bg-transparent border-dark">
                <a href="#" class="card-link">Ir...</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="card border-dark mb-3 text-center shadow" style="max-width: 18rem;">
            <div class="card-body text-dark">
                <h5 class="card-title">Eventos</h5>
                <p class="card-text">Eventos sobre los diferentes talleres.</p>
            </div>
            <div class="card-footer bg-transparent border-dark">
                <a href="#" class="card-link">Ir...</a>
            </div>
        </div>
    </div>
</div>

@endsection