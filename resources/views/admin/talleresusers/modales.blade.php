<!-- Modal TALLERES CREATE -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="altaModalLabel">Asignar docente a un taller.</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-12">
                    <form action="{{ route('tallerdocen.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="floatingInput">Selecciona uno o varios talleres:</label>
                            <select multiple data-search="true" data-silent-initial-value-set="true" id="tall" name="taller_id[]">
                                @foreach ($tallers as $info)
                                    <option value="{{ $info->id }}">{{ $info->nombre_taller }}</option>
                                @endforeach
                            </select>
                            @error('taller_id')
                                <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="floatingInput">Selecciona un Docente:</label>
                            <select class="form-select" aria-label="Default select example" name="user_id">
                                @foreach ($userD as $info)
                                    <option value="{{ $info->id }}">{{ $info->name }} {{ $info->app }}
                                        {{ $info->apm }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Crear registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal TALLER DOCENTE CREATE END -->

<!-- ELIMINAR START MODAL -->
@foreach ($talleresdocen as $talled )
<div class="modal fade" id="deleteModal{{ $talled->talleres_users_id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Taller | Docente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <strong>
                    <p>{{$talled->nombre_taller .' | '. $talled->name .' '. $talled->app .' '. $talled->apm}}</p>
                </strong>
            </div>
            <div class="modal-footer">
            <form action="{{ route('deletetalledo', ['id' => $talled->talleres_users_id]) }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("delete")
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Borrar</button>
            </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ELIMINAR END MODAL -->
