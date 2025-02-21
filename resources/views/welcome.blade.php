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
            @if(session('taller'))
            <a href="@if(auth()->user()->rol_id === 2) /talleres-docente @elseif(auth()->user()->rol_id === 3) /talleres-alumno @endif" id="download-button" class="btn-large waves-effect waves-light green">Mi taller!</a>
            @else
            <a href="#talleres" id="download-button" class="btn-large waves-effect waves-light green">Inscribete Ahora!</a>
            @endif
        </div>
        <br><br>

    </div>
</div>
@endsection
@section('content')
<div class="section">
    <div class="row" style="padding-top: 0.75rem;">
        <div class="col s12 m6">
            <h3>¡Únete a nuestros talleres culturales y deportivos! <br>
                🎭⚽🎨🏀🏐</h3>
            <p>
                <br>
                Descubre tu pasión y desarrolla nuevas habilidades en nuestros talleres culturales y deportivos. Ya sea que te guste el arte, la música, el teatro o el deporte, tenemos una opción para ti.
                <br>
                <br>
                📌 Talleres culturales: <br> <br>
                🎨 Artes visuales <br>
                🎭 Teatro <br>
                🎶 Rondalla <br>
                ✍️ Ortografía y redacción <br>
                <br>
                <br>
                📌 Talleres deportivos: <br><br>
                🏐 Voleibol <br>
                ⚽ Fútbol <br>
                🏀 Básquetbol <br>
                🏈 Tocho bandera <br>
                💃 Danza <br>
                <br>
                No importa tu nivel de experiencia, ¡solo necesitas ganas de aprender y divertirte! Inscríbete y forma parte de una comunidad llena de talento y energía. <br>
                ¡No te quedes fuera! 🎉
            </p>
        </div>
        <div class="col s12 m6">
            <img class="materialboxed" width="450" src="{{ asset('img/TalleresUTVT.jpg') }}">
        </div>
    </div>

    <div class="row" id="talleres">
        <div class="col s12 m12 center">
            <h4>Nuestros Talleres</h4>
            <p>La Universidad Tecnológica del Valle de Toluca ofrece talleres deportivos y culturales para la comunidad universitaria.</p>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/src/voleibol.jpg') }}">
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
                    <img src="{{ asset('img/src/basquetbol.jpg') }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light green modal-trigger" href="#modalbasquet"><i class="material-icons">info</i></a>
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
                    <img src="{{ asset('img/src/futbolSoccer.jpg') }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light green modal-trigger" href="#modalfutbol"><i class="material-icons">info</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Futbol</span>
                </div>
            </div>
        </div>
        <!-- Tarjeta de tocho -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/src/tocho.jpg') }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light green modal-trigger" href="#modaltocho"><i class="material-icons">info</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Tocho</span>
                </div>
            </div>
        </div>
        <!-- Tarjeta de danza -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/src/danza.jpg') }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light green modal-trigger" href="#modaldanza"><i class="material-icons">info</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Danza</span>
                </div>
            </div>
        </div>
        <!-- Tarjeta de rondalla -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/src/rondalla.jpg') }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light green modal-trigger" href="#modalrondalla"><i class="material-icons">info</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Rondalla</span>
                </div>
            </div>
        </div>
        <!-- Tarjeta de teatro -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/src/teatro.jpg') }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light green modal-trigger" href="#modalteatro"><i class="material-icons">info</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Teatro</span>
                </div>
            </div>
        </div>
        <!-- Tarjeta de ortografia -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/src/redaccion.jpg') }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light green modal-trigger" href="#modalortografia"><i class="material-icons">info</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Ortografía y redacción</span>
                </div>
            </div>
        </div>
        <!-- Tarjeta de artes -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/src/artesVisuales.jpg') }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light green modal-trigger" href="#modalartes"><i class="material-icons">info</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">Artesa visuales</span>
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


<!-- Modal Structure Volei -->
<div id="modalvolei" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/horarios/VOLEIBOL.jpg') }}">
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
                    @auth
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modalInscripcion" onclick="infoModal('Voleibol 🏐', 1)">Inscribirse!</a>
                    @endauth
                    @guest
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="/login">Inscribirse!</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure Basquet -->
<div id="modalbasquet" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/horarios/BASQUETBOL.jpg') }}">
                <div style="padding-top: 20px;">
                    <label class="active">Docente:</label>
                    <h6 class="light">Ernesto Díaz Covarrubias</h6>
                </div>
                <div style="padding-top: 15px;">
                    <label class="active">Taller</label>
                    <br>
                    <div class="chip">Deportivo</div>
                </div>
            </div>
            <div class="col s12 m6">
                <h2>Basquetbol</h2>
                <h5 class="light">El baloncesto es un deporte de equipo jugado entre dos conjuntos de cinco jugadores cada uno. El objetivo es encestar el balón en la canasta del equipo contrario para sumar puntos. Se caracteriza por su dinamismo, el dribbling, los pases y los tiros.</h5>
                <div class="center" style="padding-top: 10px;">
                    @auth
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modalInscripcion" onclick="infoModal('Basquetbol 🏀', 2)">Inscribirse!</a>
                    @endauth
                    @guest
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="/login">Inscribirse!</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure Futbol -->
<div id="modalfutbol" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/horarios/FUTBOL.jpg') }}">
                <div style="padding-top: 20px;">
                    <label class="active">Docente:</label>
                    <h6 class="light">Ruben Salvador Martínez Reyes</h6>
                </div>
                <div style="padding-top: 15px;">
                    <label class="active">Taller</label>
                    <br>
                    <div class="chip">Deportivo</div>
                </div>
            </div>
            <div class="col s12 m6">
                <h2>Futbol Soccer </h2>
                <br><br>
                <h5 class="light">Deporte de equipo donde 11 jugadores buscan anotar goles pateando un balón en la portería contraria. Se juega en una cancha rectangular y gana el equipo con más goles.</h5>
                <div class="center" style="padding-top: 10px;">
                    @auth
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modalInscripcion" onclick="infoModal('Futbol Soccer ⚽', 5)">Inscribirse!</a>
                    @endauth
                    @guest
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="/login">Inscribirse!</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure tocho -->
<div id="modaltocho" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/horarios/TOCHO.jpg') }}">
                <div style="padding-top: 20px;">
                    <label class="active">Docente:</label>
                    <h6 class="light">Ernesto Díaz Covarrubias</h6>
                </div>
                <div style="padding-top: 15px;">
                    <label class="active">Taller</label>
                    <br>
                    <div class="chip">Deportivo</div>
                </div>
            </div>
            <div class="col s12 m6">
                <h2>Tocho</h2>
                <br><br>
                <h5 class="light">Variante del fútbol americano sin contacto, donde los jugadores deben quitar una cinta o bandera del rival en lugar de taclearlo para detener la jugada.</h5>
                <div class="center" style="padding-top: 10px;">
                @auth
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modalInscripcion" onclick="infoModal('Tocho 🏈', 3)">Inscribirse!</a>
                @endauth
                @guest
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="/login">Inscribirse!</a>
                @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure Danza -->
<div id="modaldanza" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/horarios/DANZA.jpg') }}">
                <div style="padding-top: 20px;">
                    <label class="active">Docente:</label>
                    <h6 class="light">José Pablo Hernández Sánchez</h6>
                </div>
                <div style="padding-top: 15px;">
                    <label class="active">Taller</label>
                    <br>
                    <div class="chip">Cultural</div>
                </div>
            </div>
            <div class="col s12 m6">
                <h2>Danza y baile</h2>
                <br><br>
                <h5 class="light">Expresión artística a través del movimiento del cuerpo, generalmente acompañada de música. Puede ser de distintos estilos y culturas.</h5>
                <div class="center" style="padding-top: 10px;">
                    @auth
                        <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modalInscripcion" onclick="infoModal('Danza y Baile 💃', 5)">Inscribirse!</a>
                    @endauth
                    @guest
                        <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="/login">Inscribirse!</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure Rondalla -->
<div id="modalrondalla" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/horarios/RONDALLA.jpg') }}">
                <div style="padding-top: 20px;">
                    <label class="active">Docente:</label>
                    <h6 class="light">José Arturo Guerra Phérez</h6>
                </div>
                <div style="padding-top: 15px;">
                    <label class="active">Taller</label>
                    <br>
                    <div class="chip">Cultural</div>
                </div>
            </div>
            <div class="col s12 m6">
                <h2>Rondalla</h2>
                <br><br>
                <h5 class="light">Agrupación musical que interpreta canciones con instrumentos de cuerda, como guitarras y laúdes, generalmente con un estilo romántico y tradicional.</h5>
                <div class="center" style="padding-top: 10px;">
                    @auth
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modalInscripcion" onclick="infoModal('Rondalla 🎶', 5)">Inscribirse!</a>
                    @endauth
                    @guest
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="/login">Inscribirse!</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure Teatro -->
<div id="modalteatro" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/horarios/TEATRO.jpg') }}">
                <div style="padding-top: 20px;">
                    <label class="active">Docente:</label>
                    <h6 class="light">Aldo Colín Suárez</h6>
                </div>
                <div style="padding-top: 15px;">
                    <label class="active">Taller</label>
                    <br>
                    <div class="chip">Cultural</div>
                </div>
            </div>
            <div class="col s12 m6">
                <h2>Teatro</h2>
                <br><br>
                <h5 class="light">Representación escénica donde actores interpretan personajes para contar historias ante un público, combinando actuación, escenografía y vestuario.</h5>
                <div class="center" style="padding-top: 10px;">
                @auth
                <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modalInscripcion" onclick="infoModal('Teatro 🎭', 5)">Inscribirse!</a>
                    @endauth
                    @guest
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="/login">Inscribirse!</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure Ortografia -->
<div id="modalortografia" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/horarios/ORTOG.jpg') }}">
                <div style="padding-top: 20px;">
                    <label class="active">Docente:</label>
                    <h6 class="light">Ernesto Díaz Covarrubias</h6>
                </div>
                <div style="padding-top: 15px;">
                    <label class="active">Taller</label>
                    <br>
                    <div class="chip">Cultural</div>
                </div>
            </div>
            <div class="col s12 m6">
                <h2>Ortografía y redacción</h2>
                <br><br>
                <h5 class="light">Disciplina que estudia el correcto uso de las normas del lenguaje escrito y la estructuración adecuada de textos para una comunicación clara y efectiva.</h5>
                <div class="center" style="padding-top: 10px;">
                    @auth
                        <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modalInscripcion" onclick="infoModal('Ortografía y Redacción ✍️', 5)">Inscribirse!</a>
                    @endauth
                    @guest
                        <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="/login">Inscribirse!</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure Artes -->
<div id="modalartes" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/horarios/ARTES.jpg') }}">
                <div style="padding-top: 20px;">
                    <label class="active">Docente:</label>
                    <h6 class="light">Mauricio Torres Bernal</h6>
                </div>
                <div style="padding-top: 15px;">
                    <label class="active">Taller</label>
                    <br>
                    <div class="chip">Cultural</div>
                </div>
            </div>
            <div class="col s12 m6">
                <h2>Artes Visuales</h2>
                <br><br>
                <h5 class="light">Expresión artística que utiliza medios visuales como la pintura, escultura, fotografía y diseño gráfico para transmitir ideas y emociones.</h5>
                <div class="center" style="padding-top: 10px;">
                @auth
                <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modalInscripcion" onclick="infoModal('Artes Visuales 🎨', 5)">Inscribirse!</a>
                    @endauth
                    @guest
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="/login">Inscribirse!</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

@auth
<!-- Modal (Formulario de Inscripción) -->
<div id="modalInscripcion" class="modal">
    <div class="modal-content">
        <h4 class="center">Inscripción</h4>
        <form action="{{ route('store.taller') }}" method="POST">
            @csrf
            <div class="col pt-3 center">
                Estas a punto de inscribirte al taller:
            </div>
            <div class="col center">
                <strong><h5 class="light" id="taller"></h5></strong>
            </div>
            <div class="col center">
                <input type="text" name="taller_id" id="taller_id" value="" style="display: none;">
            </div>
            <div class="row pt-5">
            <div class="col s12 m6 center">
                <a href="#!" class="modal-close waves-effect waves-light btn red">Cancelar</a>
            </div>
            <div class="col s12 m6 center">
                <button type="submit" class="waves-effect waves-light btn green darken-3">Confirmar</button>
            </div>
            </div>
        </form>
    </div>
</div>

<script>
function infoModal(nombre, taller_id) {
    const titulo = document.querySelector('#taller')
    const inputTaller = document.querySelector('#taller_id')

    titulo.textContent = nombre
    inputTaller.value = taller_id

    // console.log(inputTaller.value);
}
</script>
@endauth

@section('js')
<!-- Alertas para la inscripción del alumno a los talleres -->
@if(session('success'))
<script>
    M.toast({html: "{{ session('success') }}", classes: 'green darken-3'})
</script>
@endif
@if(session('error'))
<script>
    M.toast({html: "{{ session('error') }}", classes: 'red'})
</script>
@endif
@error('taller_id')
<script>
    M.toast({html: "{{ $message }}", classes: 'red'})
</script>
@enderror
@endsection

@endsection