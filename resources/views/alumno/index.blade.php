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
        @foreach($talleres as $taller)
        <div class="col s12 m12">
            <div class="container-custom pt-3">
                <div class="card center">
                    <div class="card-details">
                        <p class="text-title">{{ $taller->nombre_taller }}</p>
                        <p class="text-body">{{ $taller->horarios }}</p>
                    </div>
                    <a href="{{ route('alumnos-taller', ['id' => $taller->id ]) }}" class="card-button">Más información</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@else
<div class="row">
    <h3 class="center">No estás inscrito a ningun taller. Dirigete a: <a href="/inicio#talleres">Inicio</a> para conocer los talleres e inscribirte a uno.</h3>
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
                    <td>{{ \Carbon\Carbon::parse($periodo->fecha_inicio)->translatedFormat('F') .' - '. \Carbon\Carbon::parse($periodo->fecha_fin)->translatedFormat('F') }}</td>
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