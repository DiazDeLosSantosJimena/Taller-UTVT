@extends('layout.layoutAdmin')

@section('content')
    <div class="row">
        <!-- Page Heading -->
        <div class="col-sm-6 col-md-6 pt-4">
            <h1 class="h3 mb-0 text-gray-800">Talleres</h1>
        </div>
        <div class="col-sm-6 col-md-6 p-4 d-flex justify-content-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                Añadir
            </button>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Exito!</strong> {{ session('success') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Table Talleres-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabla de talleres registrados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre del taller</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                            <th colspan="2" class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nombre del taller</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                            <th colspan="2" class="text-center">Acción</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($talleres as $talle)
                            <tr class="text-center">
                                <td class="text-center">{{ $talle->id }}</td>
                                <td>{{ $talle->nombre_taller }}</td>
                                <td>{{ $talle->descripcion }}</td>
                                <td>{{ $talle->tipo }}</td>
                                <td class="{{ $talle->estatus == 'Activo' ? 'text-success' : 'text-danger' }}">{{ $talle->estatus }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#updateModal{{ $talle->id }}">
                                        Editar
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deletemodal{{ $talle->id }}">
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
    @include('admin.talleres.modales')
@endsection
