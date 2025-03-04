<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Talleres</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/admin/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">
                    <img src="{{ asset('img/cuervo.svg') }}" class="rounded mx-auto d-block" alt="UTVT">
                </div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/">Inicio</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" data-bs-toggle="collapse" href="#collapseRegistros" role="button" aria-expanded="false" aria-controls="collapseExample">Registros <i class="bi bi-arrow-down-short"></i></a>
                    <div class="collapse" id="collapseRegistros">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('users.show') }}">  - Usuarios</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('taller.index') }}">  - Talleres</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/tallerdocen">  - Docentes Talleres</a>
                </div>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Publicaciones</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Eventos</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('graficos') }}">Estadisticas</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-success" id="sidebarToggle"><i class="bi bi-list"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
         <script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/admin/scripts.js') }}"></script>
        <!-- JQuery -->
        <script src="{{ asset('js/admin/jquery-3.6.4.min.js') }}"></script>
        @yield('js')
    </body>
    @yield('modals')
</html>
