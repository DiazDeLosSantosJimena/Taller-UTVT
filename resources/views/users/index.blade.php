@extends('layout dashboard.navbar')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
    </div>
    <div class="p-4 d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#altamodal">
            Añadir
        </button>
    </div>
    <!-- Table ADMI-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tabla de usuarios registrados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Cargo</th>
                            <th>Sexo</th>
                            <th>Genero</th>
                            <th>Carrera</th>
                            <th>Matricula</th>
                            <th>NSS</th>
                            <th>E-mail</th>
                            <th class="text-center">Acción</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Cargo</th>
                            <th>Sexo</th>
                            <th>Genero</th>
                            <th>Carrera</th>
                            <th>Matricula</th>
                            <th>NSS</th>
                            <th>E-mail</th>
                            <th class="text-center">Acción</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($usuarios as $user)
                            <tr class="text-center">
                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->app }}</td>
                                <td>{{ $user->apm }}</td>
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
                                    @if($user->sexo == 1)
                                        Femenino
                                    @elseif($user->sexo == 0)   
                                        Masculino
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
                                    @elseif($user->genero == 'PE')
                                        Prefiero no especificar
                                    @endif
                                </td>
                                <td>{{ $user->carrera !== null ? $user->carrera : 'Sin dato' }}</td>
                                <td>{{ $user->matricula !== null ? $user->matricula : 'Sin dato' }}</td>
                                <td>{{ $user->nss !== null ? $user->nss : 'Sin dato' }}</td>
                                <td>{{ $user->email !== null ? $user->email : 'Sin dato' }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#editmodal{{ $user->id }}">
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
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END TABLE ADMI -->
@endsection
@section('modals')
    @include('users.modalesUsers')
@endsection
<script>
    function mostrarFormulario() {
        var seleccion = document.getElementById("opciones").value;

        document.getElementById("formularioEstudiante").style.display = "none";

        if (seleccion === "3") {
            document.getElementById("formularioEstudiante").style.display = "block";
        }

    }
</script>
