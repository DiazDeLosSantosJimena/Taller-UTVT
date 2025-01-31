<!-- Modal POST CREATE -->
<div class="modal fade" id="createPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                <div class="col-12">
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="floatingInput"><strong style="color: red;">*</strong>Encargado de la publicación:</label>
                            <select class="form-select" aria-label="Default select example" name="user_id">
                                @foreach ($usuarios as $info)
                                    <option value="{{ $info->id }}">{{ $info->name }} {{ $info->app }}
                                        {{ $info->apm }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"><strong style="color: red;">*</strong>
                                Titulo:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" class="titulo">
                            @error('titulo')
                                <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"><strong style="color: red;">*</strong>
                                Descripción:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion">
                            @error('descripcion')
                                <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"><strong style="color: red;">*</strong>
                                Tipo del post:</label>
                            <input type="text" class="form-control" id="tipo" name="tipo"
                                placeholder="Evento, Invitaciones, Actividades">
                            @error('tipo')
                                <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Seleccione una imagen para su publicación:</label>
                            <input class="form-control" type="file" name="imagen" id="formFile">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Crear registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
