@extends('layout.layoutPlataforma')
<?php

use Carbon\Carbon;

$fecha = Carbon::now()->translatedFormat("l, d \de F \de Y");
?>
@section('content')
<div class="row">
    <div class="col s12 m12">
        <h2>Asistencia</h2>
    </div>
    <div class="col s6 m6 ">
        <p>Fecha: <?php echo $fecha; ?></p>
    </div>
    <form action="{{ route('asistenciaRegister') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="col s6 m6 right-align">
            <button class="waves-effect waves-light btn green darken-3">Registrar asistencia</button>
        </div>
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

@section('js')
@if(session('error'))
<script>
    M.toast({html: "{{ session('error') }}", classes: 'red darken-3'})
</script>
@endif
@endsection
@endsection