<!-- Modal TALLERES CREATE -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="altaModalLabel">Añadir talleres.</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col-12">
                    <form action="{{ route('taller.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label"><strong style="color: red;">*</strong>
                                Nombre del taller:</label>
                            <input type="text" class="form-control" id="" id="nombre_taller"
                                name="nombre_taller" class="nombre_taller">
                            @error('nombre_taller')
                            <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"><strong style="color: red;">*</strong>
                                Horarios:</label>
                            <input type="text" class="form-control" id="horarios" name="horarios" class="horarios">
                            @error('horarios')
                            <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label"><strong style="color: red;">*</strong>
                                Ubicación:</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" class="ubicacion">
                            @error('ubicacion')
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
<!-- Modal TALLER CREATE END -->

<!-- Modal TALLER UPDATE -->
@foreach ($talleres as $talle)
<div class="modal fade" id="updateModal{{ $talle->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Taller</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('taller.update', $talle->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label"><strong style="color: red;">*</strong>Nombre del
                            taller:</label>
                        <input type="text" class="form-control" id="nombretalle" name="nombre_taller"
                            value="{{ $talle->nombre_taller }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label"><strong style="color: red;">*</strong>Horarios:</label>
                        <input type="text" class="form-control" id="horarios" name="horarios"
                            value="{{ $talle->horarios }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label"><strong style="color: red;">*</strong>Ubicacion:</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion"
                            value="{{ $talle->ubicacion }}">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END TALLER UPDATE -->