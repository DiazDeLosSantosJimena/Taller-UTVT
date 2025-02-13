@extends('layout.layoutAdmin')
@section('content')
<div class="row">
    <!-- Page Heading -->
    <div class="col-sm-6 col-md-6 pt-4">
        <h1 class="h3 mb-0 text-gray-800">Publicaciones</h1>
    </div>
    <div class="col-sm-6 col-md-6 p-4 d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#altaModal">
            Añadir
        </button>
    </div>
</div>

<div class="row">
    <div class="card w-100 mb-3 shadow">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Encabezado</th>
                        <th scope="col">Fecha</th>
                        <th colspan="2" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Información acerca del primer encuentro nacional.</td>
                        <td>02 de Agosto 2024</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal[id]">
                                Editar
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal[id]">
                                Borrar
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@section('modals')
@include('admin.publicaciones.modales')
@endsection

@endsection