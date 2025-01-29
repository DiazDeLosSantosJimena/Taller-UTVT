@extends('layout.layoutPlataforma')
@section('css')
<style>
    .nav-background {
        background-image: url('{{ asset('img/patrones-talleres.png') }}');
    }
</style>
@endsection
@section('tituloInicio')
<div class="section no-pad-bot nav-background" id="index-banner">
    <div class="container">
        <br><br>
        <div class="row center white-text">
            <h1>TALLERES</h1>
            <h4 class="light">DEPORTIVOS Y CULTURALES</h4>
        </div>
        <div class="row center">
            <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light green">Inscribete Ahora!</a>
        </div>
        <br><br>

    </div>
</div>
@endsection
@section('content')
<div class="section">
    <div class="row" style="padding-top: 0.75rem;">
        <div class="col s12 m6">
            <h3>Título</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At error voluptates ratione a harum rem ipsam quasi eum enim perferendis minima incidunt architecto, impedit porro quo dicta, molestiae quos dolorem!</p>
        </div>
        <div class="col s12 m6">
            <img class="materialboxed" width="450" src="{{ asset('img/TalleresUTVT.jpg') }}">
        </div>
    </div>

    <div class="row">
        <div class="col s12 m12 center">
            <h4>Nuestros Talleres</h4>
            <p>La Universidad Tecnológica del Valle de Toluca ofrece talleres deportivos y culturales para la comunidad universitaria.</p>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/sample-1.jpg">
                    <a class="btn-floating halfway-fab waves-effect waves-light green modal-trigger" href="#modalvolei"><i class="material-icons">info</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Voleibol</span>
                </div>
            </div>
        </div>
        <!-- Tarjeta de Basquetbol -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/sample-1.jpg">
                    <a class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">add</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Basquetbol</span>
                </div>
            </div>
        </div>
        <!-- Tarjeta de Futbol -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/sample-1.jpg">
                    <a class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">add</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Futbol</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row center">
        <h3>Eventos</h3>
    </div>
    <div class="row">
        <div class="carousel carousel-slider center">
            <div class="carousel-item red white-text" href="#one!" style="background-image: url(); text-transform: uppercase;">
                <h2>Primer Encuentro Regional Deportivo y Cultural</h2>
                <p class="white-text">de Universidades del Subsistema Tecnológico</p>
            </div>
            <div class="carousel-item amber white-text" href="#two!">
                <h2>Second Panel</h2>
                <p class="white-text">This is your second panel</p>
            </div>
            <div class="carousel-item green white-text" href="#three!">
                <h2>Third Panel</h2>
                <p class="white-text">This is your third panel</p>
            </div>
            <div class="carousel-item blue white-text" href="#four!">
                <h2>Fourth Panel</h2>
                <p class="white-text">This is your fourth panel</p>
            </div>
        </div>
    </div>
</div>
<br><br>


<!-- Modal Structure -->
<div id="modalvolei" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/VOLEIBOL.jpg') }}">
                <div style="padding-top: 20px;">
                    <label class="active">Docente:</label>
                    <h6 class="light">Patricia Rico Peñalosa</h6>
                </div>
                <div style="padding-top: 15px;">
                    <label class="active">Taller</label>
                    <br>
                    <div class="chip">Deportivo</div>
                </div>
            </div>
            <div class="col s12 m6">
                <h2>Voleibol</h2>
                <br><br>
                <h5 class="light">Es un deporte donde dos equipos se enfrentan sobre un terreno de juego liso separados por una red central, tratando de pasar el balón por encima de la red hacia el suelo del campo contrario.</h5>
                <div class="center" style="padding-top: 10px;">
                    <a class="waves-effect waves-light btn-small green darken-3">Inscribirse!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection