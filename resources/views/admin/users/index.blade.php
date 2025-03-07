@extends('layout.layoutAdmin')
@section('content')
<div class="row">
    <!-- Page Heading -->
    <div class="col-sm-6 col-md-6 pt-4">
        <h1 class="h3 mb-0 text-gray-800">Alumnos</h1>
    </div>
    <div class="col-sm-6 col-md-6 p-4 d-flex justify-content-end">
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Añadir
            </button>
            <ul class="dropdown-menu">
                <!-- Button trigger modal -->
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#altamodal">Formulario</a></li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#documentModal">Documento .xlsx | .xls</a></li>
            </ul>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Exito!</strong> {{ session('success') }}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Table ADMI-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Tabla de usuarios registrados.</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Sexo</th>
                        <th>Genero</th>
                        <th>Carrera</th>
                        <th>Matricula</th>
                        <th>NSS</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Sexo</th>
                        <th>Genero</th>
                        <th>Carrera</th>
                        <th>Matricula</th>
                        <th>NSS</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($usuarios as $user)
                    @if($user->rol_id === 3)
                    <tr class="text-center">
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name .' '. $user->app .' '. $user->apm }}</td>
                        <td>
                            @if ($user->rol_id == 1)
                            Administrador
                            @elseif($user->rol_id == 2)
                            Docente
                            @elseif($user->rol_id == 3)
                            Estudiante
                            @else
                            {{ $user->rol_id }}
                            @endif
                        </td>
                        <td>
                            @if($user->sexo == 'F')
                            ♀️
                            @elseif($user->sexo == 'M')
                            ♂️
                            @endif
                        </td>
                        <td>
                            @if ($user->genero == 'H')
                            Hombre
                            @elseif($user->genero == 'M')
                            Mujer
                            @elseif($user->genero == 'NB')
                            No Binario
                            @elseif($user->genero == 'MT')
                            Mujer Transgénero
                            @elseif($user->genero == 'HT')
                            Hombre Transgénero
                            @elseif($user->genero == 'AG')
                            Agénero
                            @elseif($user->genero == 'NI')
                            Identidad de género no incluida
                            @elseif($user->genero == 'SN')
                            Prefiero no especificar
                            @endif
                        </td>
                        <td>{{ $user->carrera !== null ? $user->carrera : 'Sin dato' }}</td>
                        <td>{{ $user->matricula !== null ? $user->matricula : 'Sin dato' }}</td>
                        <td>{{ $user->nss !== null ? $user->nss : 'Sin dato' }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                                Editar
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#deletemodal{{ $user->id }}">
                                Borrar
                            </button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END TABLE ADMI -->
@endsection

@section('modals')
@include('admin.users.modales')
@endsection

@section('js')
<script>
    function mostrarFormulario() {
        var seleccion = document.getElementById("opciones").value;
        document.getElementById("formularioEstudiante").style.display = "none";
        if (seleccion === "3") {
            document.getElementById("formularioEstudiante").style.display = "block";
        }
    }
</script>
@endsection