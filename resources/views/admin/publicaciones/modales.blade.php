<!-- Modal -->
<div class="modal fade" id="altaModal" tabindex="-1" aria-labelledby="altaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="altaModalLabel">Crear publicación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('publicaciones.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="titulo" class="form-label"><strong class="text-danger">*</strong> Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
            @error('titulo')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label"><strong class="text-danger">*</strong> Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            @error('descripcion')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-3">
            <label for="tipo" class="form-label"><strong class="text-danger">*</strong> Taller</label>
            <select class="form-control" id="taller" name="taller" required>
              <option value="" disabled selected>Seleccione un taller</option>
              @foreach($talleres as $taller)
              <option value="{{ $taller->id }}">{{ $taller->nombre_taller }}</option>
              @endforeach
            </select>
            @error('taller')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (Opcional)</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success">Crear</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
@foreach($publish as $publicacion)
<div class="modal fade" id="editModal{{ $publicacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('avisos.update', $publicacion->id) }}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="mb-3">
            <label for="titulo" class="form-label"><strong class="text-danger">*</strong> Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $publicacion->titulo }}" required>
            @error('titulo')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label"><strong class="text-danger">*</strong> Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $publicacion->descripcion }}</textarea>
            @error('descripcion')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-3">
            <label for="tipo" class="form-label"><strong class="text-danger">*</strong> Taller</label>
            <select class="form-control" id="taller" name="taller" required>
              <option value="" disabled>Seleccione un taller</option>
              @foreach($talleres as $taller)
              <option value="{{ $taller->id }}" {{ $publicacion->taller_id === $taller->id ? 'selected' : '' }}>{{ $taller->nombre_taller }}</option>
              @endforeach
            </select>
            @error('taller')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (Opcional)</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
          </div>
          <div class="mb-3">
            <img src="{{ asset('img/src/'.$publicacion->imagen) }}" alt="{{ $publicacion->imagen }}">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- Modal delete -->
@foreach($publish as $publicacion)
<div class="modal fade" id="deleteModal{{ $publicacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        ¿Estás seguro de que deseas eliminar el aviso?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <form action="{{ route('avisos.destroy', $publicacion->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach