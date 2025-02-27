@extends('layout.layoutPlataforma')
<?php
$session_taller = session('taller')

?>
@section('css')
<link rel="stylesheet" href="{{ asset('css/plataforma/cardTaller.css') }}">
@endsection


@section('content')
<!-- Validacion para mostrar información de talleres -->
@if($session_taller === true)
<!-- Contenido para los alumnos -->
<div class="row">
    <div class="col s12 m12 row center">
        <div class="col s12 m12">
            <h2>Talleres</h2>
            <span>Taller al que estoy inscrito actualmente.</span>
        </div>
    </div>
</div>
<div class="row container-custom">
    @foreach($talleres as $taller)
    <div class="col">
        <div class="card center">
            <div class="card-details">
                <p class="text-title">{{ $taller->nombre_taller }}<br>🏀</p>
                <p class="text-body">{{ $taller->tipo }}</p>
            </div>
            @if($taller->constancia != 0)
            <a href="{{ route('alumnos-taller', ['id' => $taller->id ]) }}" class="card-button">Constancia</a>
            @endif
        </div>
    </div>
    @endforeach
</div>

@else
<div class="row">
    <h3 class="center">No estás inscrito a ningun taller. 😅<br>Dirigete a la sección: <a href="/inicio#talleres">Talleres</a> para conocer los talleres e inscribirte a uno.<br>💪</h3>
</div>
@endif

<div class="col s12 m12 row center">
    <div class="col s12 m12">
        <h3>Periodos anteriores</h3>
        <span>Talleres de periodos anteriores.</span>
    </div>
    <div class="col sm12 m12 pt-3">
        <table class="table-responsive centered">
            <thead>
                <tr>
                    <th>Taller</th>
                    <th>Periodo</th>
                    <th>Constancia</th>
                </tr>
            </thead>

            <tbody>
                @foreach($periodos as $periodo)
                <tr>
                    <td>{{ $periodo->nombre_taller }}</td>
                    <td>
                        @if($periodo->periodo_id != null)
                        {{ \Carbon\Carbon::parse($periodo->fecha_inicio)->translatedFormat('F') .' - '. \Carbon\Carbon::parse($periodo->fecha_fin)->translatedFormat('F') }}
                        @else
                        No hay registro de asistencia.
                        @endif
                    </td>
                    <td>
                        @if($periodo->constancia === 0)
                        <p class="red-text">Constancia no concedida.</p>
                        @else
                        <a class="waves-effect waves-light btn" href="/constancia">Obtener</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection