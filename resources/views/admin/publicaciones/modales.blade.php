<!-- Modal -->
<div class="modal fade" id="altaModal" tabindex="-1" aria-labelledby="altaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="altaModalLabel">Crear publicación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
          </div>

          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-control" id="tipo" name="tipo" required>
              <option value="anuncio">Anuncio</option>
              <option value="evento">Evento</option>
              <option value="noticia">Noticia</option>
            </select>
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

