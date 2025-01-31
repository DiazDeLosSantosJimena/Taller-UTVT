@extends('layout dashboard.navbar')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Talleres</h1>
    </div>
    <div class="p-4 d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">
            Añadir
        </button>
    </div>
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
                            <th>Horarios</th>
                            <th>Ubicación</th>
                            <th class="text-center">Acción</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nombre del taller</th>
                            <th>Horarios</th>
                            <th>Ubicación</th>
                            <th class="text-center">Acción</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($talleres as $talle)
                            <tr class="text-center">
                                <td class="text-center">{{ $talle->id }}</td>
                                <td>{{ $talle->nombre_taller }}</td>
                                <td>{{ $talle->horarios }}</td>
                                <td>{{ $talle->ubicacion }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#updateModal{{ $talle->id }}">
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
    @include('talleres.modalesTaller')
@endsection 