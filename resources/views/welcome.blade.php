@extends('layout.layoutPlataforma')
@section('css')
<style>
    .nav-background {
        background-image: url('{{ asset('img/FondoTalleres.webp') }}');
        background-size: cover; 
        background-position: top;
        background-repeat: no-repeat;
    }
</style>
@endsection
@section('tituloInicio')
<div class="section no-pad-bot nav-background" id="index-banner">
    <div class="container" style="padding-top: 150px; padding-bottom: 150px;">
        <div class="row center white-text">
            <h1 class="covered-by-your-grace-regular">TALLERES</h1>
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
        <div class="col s12 m12">
            <h3 class="center">¡Únete a nuestros talleres culturales y deportivos! <br>
                🎭⚽🎨🏀🏐</h3>
        </div>
        <div class="col s12 m12 center">
            <p>
                <br>
                Descubre tu pasión y desarrolla nuevas habilidades en nuestros talleres culturales y deportivos. Ya sea que te guste el arte, la música, el teatro o el deporte, tenemos una opción para ti.
                <br>
            </p>
        </div>
        <div class="col s12 m6 center">
            <p>
                <br>
                📌 Talleres culturales: <br> <br>
                🎨 Artes visuales <br>
                🎭 Teatro <br>
                🎶 Rondalla <br>
                ✍️ Ortografía y redacción <br>
                <br>
            </p>
        </div>
        <div class="col s12 m6 center">
            <p>
                <br>
                📌 Talleres deportivos: <br><br>
                🏐 Voleibol <br>
                ⚽ Fútbol <br>
                🏀 Básquetbol <br>
                🏈 Tocho bandera <br>
                💃 Danza <br>
                <br>
            </p>
        </div>
        <div class="col s12 m12 center">
            <p>
                <br>
                No importa tu nivel de experiencia, ¡solo necesitas ganas de aprender y divertirte! Inscríbete y forma parte de una comunidad llena de talento y energía. <br>
                ¡No te quedes fuera! 🎉
            </p>
        </div>
    </div>

    <div class="row" id="talleres">
        <div class="col s12 m12 center">
            <h4>Nuestros Talleres</h4>
            <p>La Universidad Tecnológica del Valle de Toluca ofrece talleres deportivos y culturales para la comunidad universitaria.</p>
        </div>
    </div>
    <div class="row">
        @foreach($talleres as $taller)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ asset('img/portadas/'.$taller->imagen) }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light green modal-trigger" href="#modal{{ $taller->nombre_taller }}"><i class="material-icons">info</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">{{ $taller->nombre_taller }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row center" id="eventos">
        <h3>Eventos</h3>
    </div>
    <div class="row">
        <div class="carousel carousel-slider center">
            <div class="carousel-item red white-text" href="#0!">
                <h2>Banner Inicio</h2>
                <p>Descripción de banner inicio</p>
            </div>
            @foreach($eventos as $evento)
                <div class="carousel-item white-text" href="#{{ $loop->iteration }}!" 
                    style="background-image: url({{ asset('img/imagenes/'.$evento->imagen) }});
                    background-size: cover; 
                    background-position: center; 
                    background-repeat: no-repeat;"
                >
                        <h2>{{ $evento->titulo }}</h2>
                </div>
            @endforeach
        </div>
    </div>
</div>
<br><br>


<!-- Modal Structure Volei -->
@foreach($talleres as $taller)
<div id="modal{{ $taller->nombre_taller }}" class="modal">
    <div class="modal-content">
        <div class="row">
            <div class="col s12 m6">
                <img class="materialboxed" width="300" src="{{ asset('img/horarios/'.$taller->horarios_img) }}">
                <div style="padding-top: 20px;">
                    <label class="active">Docente:</label>
                    <h6 class="light">{{ $taller->docente_name .' '. $taller->docente_app .' '. $taller->docente_apm }}</h6>
                </div>
                <div style="padding-top: 15px;">
                    <label class="active">Taller</label>
                    <br>
                    <div class="chip">{{ $taller->tipo }}</div>
                </div>
            </div>
            <div class="col s12 m6">
                <h2>{{ $taller->nombre_taller }}</h2>
                <br><br>
                <h5 class="light">{{ $taller->descripcion }}</h5>
                <div class="center" style="padding-top: 10px;">
                    @auth
                    <a class="waves-effect waves-light btn-small green darken-3" onclick="infoModal('{{ $taller->nombre_taller }}', {{ $taller->id }})">Inscribirse!</a>
                    @endauth
                    @guest
                    <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="/login">Inscribirse!</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

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
                <strong>
                    <h5 class="light" id="taller_nombre"></h5>
                </strong>
                <h5 id="icono"></h5>
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

        const modalInscripcion = document.querySelector('#modalInscripcion')
        const titulo = modalInscripcion.querySelector('#taller_nombre')
        const icono = modalInscripcion.querySelector('#icono')
        const inputTaller = document.querySelector('#taller_id')

        const tallerIcon = {
            Futbol: '⚽',
            Basquetbol: '🏀',
            Voleibol: '🏐',
            Tocho: '🏈',
            Danza: '💃',
            Rondalla: '🎶',
            Teatro: '🎭',
            Ortografía: '✍️',
            Artes: '🎨'
        }

        console.log(nombre)

        icono.textContent = tallerIcon[ nombre.split(" ")[0] ]

        titulo.textContent = nombre
        inputTaller.value = taller_id

        const modal = M.Modal.init(modalInscripcion)
        modal.open()

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