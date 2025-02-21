@extends('layout.layoutPlataforma')
<?php
$session_taller = session('taller')
?>
@section('css')
<link rel="stylesheet" href="{{ asset('css/plataforma/cardTaller.css') }}">
@endsection

@section('content')
<html>
  <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modal-aviso">Aviso!</a>

  <!-- Modal -->
  <div id="modal-aviso" class="modal">
      <div class="modal-content">
          <h4>Formulario para crear Aviso </h4>
          <form action="{{ route('avisos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <label>Título</label>
            <input type="text" name="titulo" required>
            
            <label>Descripción</label>
            <textarea name="descripcion" required></textarea>
    
            <label>Taller</label>
            <select name="taller_id" id="taller_id" class="browser-default" required>
              <option value="" disabled selected>Selecciona un taller</option>
              @foreach($talleres as $taller)
                  <option value="{{ $taller->id }}">{{ $taller->nombre_taller }}</option>
              @endforeach
          </select>
    
            <label>Imagen</label>
            <input type="file" name="imagen">
            <br>
            <button type="submit">Guardar</button>
        </form>
        <button onclick="document.getElementById('modal-aviso').style.display='none'">Cerrar</button>
      </div>
  </div>

  <br>

  <!-- Modal Evento -->
  <a class="waves-effect waves-light btn-small green darken-3 modal-trigger" href="#modal-evento">Evento!</a>

  <!-- Modal -->
  <div id="modal-evento" class="modal">
      <div class="modal-content">
          <h4>Formulario para crear Evento </h4>
          <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <label>Título</label>
            <input type="text" name="titulo" required>

            <label>Imagen</label>
            <input type="file" name="imagen" required>
            <br>
            <button type="submit">Guardar</button>
        </form>
        <button onclick="document.getElementById('modal-aviso').style.display='none'">Cerrar</button>
      </div>
  </div>

  <br>
  <div class="container">
    @foreach($avisos as $aviso)
    <div class="col s12 m8 offset-m2 l6 offset-l3">
      <div class="card-panel grey lighten-5 z-depth-1">
        <div class="row valign-wrapper">
          <div class="col s2">
            @if($aviso->imagen)
            <img src="{{ asset('img/imagenes/' . $aviso->imagen) }}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            @endif
          </div>
          <div class="col s10">
            <span class="black-text">
              <h5 class="card-title">{{ $aviso->titulo }}</h5>
                  <p class="card-text">{{ $aviso->descripcion }}</p>
                  <p class="text-muted">Publicado por: {{ $aviso->user_id }}</p>
                  <p class="text-muted">Taller: {{ $aviso->taller_id }}</p>
                  <p class="text-muted">Fecha: {{ $aviso->created_at }}</p>
            </span>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
</html>



@endsection