@extends('layout.layoutAdmin')
@section('content')
<div class="row">
    <!-- Page Heading -->
    <div class="col-sm-6 col-md-6 pt-4">
        <h1 class="h3 mb-0 text-gray-800">Avisos</h1>
    </div>
    <div class="col-sm-6 col-md-6 p-4 d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#altaModal">
            Añadir
        </button>
    </div>
</div>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Exito!</strong> {{ session('success') }}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
    <div class="card w-100 mb-3 shadow">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Autor</th>
                        <th colspan="2" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publish as $publicacion)
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $publicacion->titulo }}</td>
                        <td>{{ $publicacion->descripcion }}</td>
                        <td>{{ \Carbon\Carbon::parse($publicacion->created_at)->translatedFormat('F') }}</td>
                        <td>{{ $publicacion->imagen !== null ? $publicacion->imagen : 'Sin imagen' }}</td>
                        <td>{{ $publicacion->nombre .' '. $publicacion->app .' '. $publicacion->apm }}</td>
                        <td>
                            <!-- Button edit modal -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $publicacion->id }}">
                                Editar
                            </button>

                        </td>
                        <td>
                            <!-- Button delete modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $publicacion->id }}">
                                Eliminar
                            </button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@section('modals')
@include('admin.publicaciones.modales')
@endsection

@endsection