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
<!-- Contenido para los docentes -->
@if(auth()->user()->rol_id === 2)
<div class="row">
    <div class="col-12 center">
        <h2>Talleres</h2>
    </div>
    @foreach($talleres as $taller)
    <div class="container-custom pt-3">
        <div class="col sm-12 md-4">
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

<!-- Contenido para los alumnos -->
@elseif(auth()->user()->rol_id === 3)
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
@endif

@else
<div class="row">
    <h3 class="center">@if(auth()->user()->rol_id === 2) No tiene ningun taller asignado, comuniquese con sistemas. @elseif(auth()->user()->rol_id === 3) No estás inscrito a ningun taller. Dirigete a: <a href="/inicio#talleres">Inicio</a> para conocer los talleres e inscribirte a uno. @endif</h3>
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
                <tr>
                    <td>Voleibol</td>
                    <td>Enero - Abril 2024</td>
                    <td><a class="waves-effect waves-light btn green">Obtener</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection