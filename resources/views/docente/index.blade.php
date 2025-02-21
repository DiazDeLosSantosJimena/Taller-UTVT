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
          <p class="text-body">{{ $taller->horarios }}</p>
        </div>
        <a href="{{ route('alumnos-taller', ['id' => $taller->id ]) }}" class="card-button">Más información</a>
      </div>
    </div>
  </div>
  @endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="crearEventoModal" tabindex="-1" aria-labelledby="crearEventoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearEventoModalLabel">Crear Nuevo Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <form id="uploadForm" enctype="multipart/form-data" method="POST" action="#">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="tituloEvento" class="form-label">Título del Evento</label>
            <input type="text" id="tituloEvento" name="titulo" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="descripcionEvento" class="form-label">Descripción</label>
            <textarea id="descripcionEvento" name="descripcion" class="form-control" required></textarea>
          </div>
          <div class="mb-3">
            <label for="tipoEvento" class="form-label">Tipo</label>
            <select id="tipoEvento" name="tipo" class="form-control" required>
              <option value="anuncio">Anuncio</option>
              <option value="evento">Evento</option>
              <option value="noticia">Noticia</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="imageInput" class="form-label">Selecciona una imagen</label>
            <input type="file" id="imageInput" name="imagen" class="form-control" accept="image/*">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Crear Evento</button>
        </div>
      </form>
    </div>
  </div>
</div>

@section('js')
<script>
  document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let input = document.getElementById('imageInput');
    let file = input.files[0];

    if (file) {
      let reader = new FileReader();
      reader.onload = function(e) {
        let carousel = document.querySelector('.carousel');
        let newItem = document.createElement('div');

        newItem.className = 'carousel-item';
        newItem.style.backgroundImage = `url('${e.target.result}')`;
        newItem.style.backgroundSize = 'cover';
        newItem.style.backgroundPosition = 'center';
        newItem.innerHTML = `<h2>Nuevo Evento</h2><p class="white-text">Imagen agregada</p>`;

        carousel.appendChild(newItem);

        // Recargar el carrusel para actualizar
        var instance = M.Carousel.getInstance(carousel);
        instance.destroy();
        M.Carousel.init(carousel, {
          fullWidth: true,
          indicators: true
        });
      };

      reader.readAsDataURL(file);
    }
  });
</script>
@endsection


@else
<div class="row">
  <h3 class="center">No tiene ningún taller asignado, comuníquese con sistemas.</h3>
</div>
@endif

@endsection