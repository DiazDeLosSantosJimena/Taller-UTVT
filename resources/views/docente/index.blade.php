@extends('layout.layoutPlataforma')
<?php
$session_taller = session('taller')
?>
@section('css')
<link rel="stylesheet" href="{{ asset('css/plataforma/cardTaller.css') }}">
@endsection

@section('content')
<!-- Validación para mostrar información de talleres -->
@if($session_taller === true)
<!-- Contenido para los docentes -->
<div class="row">
  <div class="col-12 center">
    <h2>Talleres</h2>
    <p>Talleres que imparto actualmente.</p>
  </div>

  @foreach($talleres as $taller)
  <div class="container-custom pt-3">
    <div class="col sm-12 md-4">
      <div class="card center">
        <div class="card-details">
          <p class="text-title">{{ $taller->nombre_taller }}</p>
          <p class="text-body">{{ $taller->tipo }}</p>
        </div>
        <a href="{{ route('alumnos-taller', ['id' => $taller->id ]) }}" class="card-button">Más información</a>
      </div>
    </div>
  </div>
  @endforeach
</div>

@else
<div class="row">
  <h3 class="center">No tiene ningún taller asignado, comuníquese con sistemas.</h3>
</div>
@endif

@endsection