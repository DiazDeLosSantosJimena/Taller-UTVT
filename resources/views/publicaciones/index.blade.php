@extends('layout dashboard.navbar')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Publicaciones</h1>
    </div>
    <div class="p-4 d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createPost">
            Añadir
        </button>
    </div>
        <!-- Table Talleres-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Tabla de publicaciones registrados</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Encargado del post</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Tipo</th>
                                <th>Imagen</th>
                                <th class="text-center">Acción</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Encargado del post</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Tipo</th>
                                <th>Imagen</th>
                                <th class="text-center">Acción</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($publicacion as $publi)
                                <tr class="text-center">
                                    <td class="text-center">{{ $publi->id }}</td>
                                    <td>{{ $publi->user->nombre }} {{ $publi->user->app }} {{ $publi->user->apm }}</td>
                                    <td>{{ $publi->titulo }}</td>
                                    <td>{{ $publi->descripcion }}</td>
                                    <td>{{ $publi->tipo }}</td>
                                    <td><img src="{{ asset('storage/' . $publi->imagen) }}"></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#updateModal{{ $publi->id }}">
                                            Editar
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deletemodal{{ $publi->id }}">
                                            Borrar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END TABLE ADMI -->

@endsection  
@section('modals')
    @include('publicaciones.modalesPost')
@endsection   