@extends('layout.layoutPlataforma')
@section('content')
<div class="row">
    <div class="col sm-12 md-12 pt-3">
        <h2>{{ $taller->nombre_taller }}</h2>
        <p>Registro de los alumnos que están inscritos al taller.</p>
    </div>
    <div class="col sm-12 md-12">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th class="center">Matricula</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Carrera</th>
                    <th class="center">Genero</th>
                    <th class="center">Asistencia</th>
                    <th class="center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td class="center">{{ $alumno->matricula }}</td>
                    <td>{{ $alumno->name .' '. $alumno->app .' '. $alumno->apm }}</td>
                    <td>{{ $alumno->email }}</td>
                    <td>{{ $alumno->carrera }}</td>
                    <td class="center">
                        @if ($alumno->genero == 'H')
                            Hombre
                        @elseif($alumno->genero == 'M')
                            Mujer
                        @elseif($alumno->genero == 'NB')
                            No Binario
                        @elseif($alumno->genero == 'MT')
                            Mujer Transgénero
                        @elseif($alumno->genero == 'HT')
                            Hombre Transgénero
                        @elseif($alumno->genero == 'AG')
                            Agénero
                        @elseif($alumno->genero == 'NI')
                            Identidad de género no incluida
                        @elseif($alumno->genero == 'PE')
                            Sin especificación
                        @endif
                    </td>
                    <td class="center" id="porcentaje{{ $alumno->id }}">0%</td>
                    <td class="center">
                        <a class="waves-effect waves-light btn white black-text disabled">Constancia</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="fixed-action-btn">
    <a class="btn-floating btn-large blue" id="asistencia">
        <i class="large material-icons">menu</i>
    </a>
    <ul>
        <li><a class="btn-floating red modal-trigger" href="#modal-evento"><i class="material-icons">art_track</i></a></li>
        <li><a class="btn-floating blue modal-trigger" href="#modal-aviso"><i class="material-icons">message</i></a></li>
        <li><a class="btn-floating green" href="{{ route('asistencia', ['id' => $taller->id]) }}"><i class="material-icons">assignment_turned_in</i></a></li>
    </ul>
</div>

@include('docente.modales')

<!-- Tap Target Structure -->
<div class="tap-target cyan" data-target="asistencia">
    <div class="tap-target-content white-text">
        <h5>Asistencia</h5>
        <p>Si desea registrar la asistencia del día de hoy puede hacerlo accediendo atraves del botón con el icono del lapiz.</p>
    </div>
</div>


@section('js')
<script>
    let porcentajes = @json($porcentajes) // Convertimos JSON de PHP a JS

    porcentajes.forEach(porcentaje => {
        rowID = `porcentaje${porcentaje.user_id}`
        rowDom = document.getElementById(rowID);

        console.log(porcentaje)

        porcentaje.porcentaje_asistencia === null ? rowDom.textContent = '0%' : rowDom.textContent = parseInt(porcentaje.porcentaje_asistencia) + '%'
    })
</script>
@if(session('success'))
<script>
    M.toast({html: "{{ session('success') }}", classes: 'green darken-3'})
</script>
@endif
@if(session('eventSuccess'))
<script>
    var toastHTML = `<span>{{ session('eventSuccess') }}</span><a href="/inicio#eventos" class="btn-flat toast-action">Ir...</a>`;
    M.toast({html: toastHTML, classes: 'green darken-3'})
</script>
@endif
@if(session('avisoSuccess'))
<script>
    var toastHTML = `<span>{{ session('avisoSuccess') }}</span><a href="/avisos" class="btn-flat toast-action">Ir...</a>`;
    M.toast({html: toastHTML, classes: 'green darken-3'})
</script>
@endif
@endsection

@endsection