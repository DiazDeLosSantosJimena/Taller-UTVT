<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>UTVT - Talleres Deportivos y Culturales</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('css/plataforma/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="{{ asset('css/plataforma/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
    @yield('css')
</head>

<body>
    <nav class="green darken-3" role="navigation">
        <div class="nav-wrapper container"><a id="logo-utvt" href="/" class="brand-logo"><img height="60" src="{{ asset('img/cuervo.svg') }}" alt="UTVT"></a>
            <!-- Navbar PC -->
            <ul class="right hide-on-med-and-down">
                @auth
                <li><a href="#">Avisos</a></li>
                <li><a href="/talleres-docente">Talleres</a></li>
                <li><a href="/logout">Cerrar Sesión</a></li>
                @endauth
                @guest
                <li><a href="/login">Iniciar Sesión</a></li>
                @endguest
            </ul>
            <!-- Navbar mobile -->
            <ul id="nav-mobile" class="sidenav">
                @auth
                <li><a href="#">Avisos</a></li>
                <li><a href="#">Talleres</a></li>
                <li><a href="/logout">Cerrar Sesión</a></li>
                @endauth
                @guest
                <li><a href="/login">Iniciar Sesión</a></li>
                @endguest
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    @yield('tituloInicio')


    <div class="container">
        @yield('content')
    </div>

    <footer class="page-footer green darken-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Company Bio</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Settings</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
            </div>
        </div>
    </footer>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('js/plataforma/materialize.js') }}"></script>
    <script src="{{ asset('js/plataforma/init.js') }}"></script>

</body>

</html>