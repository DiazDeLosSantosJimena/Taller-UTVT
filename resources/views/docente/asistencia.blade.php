@extends('layout.layoutPlataforma')

@section('content')
<div class="row">
    <div class="col s12 m12">
        <h2>Asistencia</h2>
    </div>
    <div class="col s6 m6 ">
        <p>Fecha: <?php echo date("d-m-y"); ?></p>
    </div>
    <form action="{{ route('asistenciaRegister') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="col s6 m6 right-align">
            <button class="waves-effect waves-light btn green darken-3">Registrar asistencia</button>
        </div>
        @if(session('error'))
        <div class="col s12 m12 center">
            <span style="color: red;">{{ session('error') }}</span>
        </div>
        @endif
        <div class="col-12 center">
            <table class="centered table-responsive">
                <thead>
                    <tr>
                        <th>Nombre del alumno</th>
                        <th>Marcar asistencia</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($alumnos as $alumno)
                    <tr>
                        <td>
                            {{ $alumno->name .' '. $alumno->app .' '. $alumno->apm }}
                        </td>
                        <td>
                            <p>
                                <label>
                                    <input type="checkbox" name="alumnos_id[]" value="{{ $alumno->id }}" />
                                    <span></span>
                                </label>
                            </p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <input type="text" name="taller_id" style="display: none;" value="{{ $taller->id }}">
    </form>
</div>
@endsection