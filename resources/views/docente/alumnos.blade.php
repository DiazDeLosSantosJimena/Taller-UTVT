@extends('layout.layoutPlataforma')
@section('content')
<div class="row">
    <div class="col sm-12 md-12 pt-3">
        <h2>{{ $taller->nombre_taller }}</h2>
        <p>Registro de los alumnos que están inscritos al taller.</p>
    </div>
    @if(session('success'))
    <div class="col s12 m12 center">
        <span style="color: green;">{{ session('success') }}</span>
    </div>
    @endif
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
                    <td class="center">{{ $alumno->genero }}</td>
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
    <a class="btn-floating btn-large blue" id="asistencia" href="{{ route('asistencia', ['id' => $taller->id]) }}">
        <i class="large material-icons">mode_edit</i>
    </a>
</div>

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

    porcentajes.forEach( porcentaje => {
        rowID = `porcentaje${porcentaje.user_id}`
        rowDom = document.getElementById(rowID);

        rowDom.textContent = parseInt(porcentaje.porcentaje_asistencia)+'%'
    })
</script>
@endsection

@endsection