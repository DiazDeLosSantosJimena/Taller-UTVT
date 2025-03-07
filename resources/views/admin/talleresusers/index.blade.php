@extends('layout.layoutAdmin')

@section('content')
<div class="row">
    <!-- Page Heading -->
    <div class="col-sm-6 col-md-6 pt-4">
        <h1 class="h3 mb-0 text-gray-800">Docente talleres </h1>
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
<ul class="nav nav-pills nav-fill gap-2 p-1 small bg-success rounded-5 shadow-sm mb-3" id="pillNav2" role="tablist" style="--bs-nav-link-hover-color: var(--bs-black); --bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-success); --bs-nav-pills-link-active-bg: var(--bs-white);">
    <li class="nav-item" role="presentation">
        <button class="nav-link active rounded-5" id="item-tab1" data-bs-toggle="tab" data-bs-target="#nav_docente" type="button" role="tab" aria-selected="true">Docentes</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link rounded-5" id="item-tab2" data-bs-toggle="tab" data-bs-target="#nav_talleres_docente" type="button" role="tab" aria-selected="false">Docente - Talleres</button>
    </li>
</ul>

<div class="tab-content" id="nav-tabContent1">
    <div class="tab-pane fade show active" id="nav_docente" role="tabpanel" aria-labelledby="nav-item-tab" tabindex="0">
        <!-- Table ADMI-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Tabla de Docentes registrados.</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Sexo</th>
                                <th colspan="2">Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Sexo</th>
                                <th colspan="2">Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($docentes as $docente)
                            <tr class="text-center">
                                <td>{{ $docente->id }}</td>
                                <td>{{ $docente->name .' '. $docente->app .' '. $docente->apm }}</td>
                                <td>{{ $docente->email }}</td>
                                <td>
                                    @if($docente->sexo === 'M')
                                    ♂️
                                    @elseif($docente->sexo === 'F')
                                    ♀️
                                    @else
                                    {{ $docente->sexo }}
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $docente->id }}">
                                        Editar
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $docente->id }}">
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
    </div>
    <div class="tab-pane fade" id="nav_talleres_docente" role="tabpanel" aria-labelledby="nav_docente_tab" tabindex="0">
        <!-- Table Talleres-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Tabla de Docentes y Taller respectivo</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del docente</th>
                                <th>Nombre del taller</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nombre del docente</th>
                                <th>Nombre del taller</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($talleresdocen as $talled)
                            <tr class="text-center">
                                <td class="text-center">{{ $talled->talleres_users_id }}</td>
                                <td>{{ $talled->name }} {{ $talled->app }} {{ $talled->apm }}</td>
                                <td>{{ $talled->nombre_taller }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $talled->talleres_users_id }}">
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
    </div>
</div>
@endsection
@section('modals')
@include('admin.talleresusers.modales')
@endsection