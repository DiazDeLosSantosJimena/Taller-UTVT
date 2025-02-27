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
                    <form action="{{ route('taller.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label"><strong style="color: red;">*</strong>
                                Nombre del taller:</label>
                            <input type="text" class="form-control" id="nombre_taller"
                                name="nombre_taller" class="nombre_taller" value="{{ old('nombre_taller') }}">
                            @error('nombre_taller')
                            <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label"><strong style="color: red;">*</strong> Descripción del taller</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                            <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"><strong style="color: red;">*</strong> Imagen del horario:</label>
                            <input type="file" class="form-control" id="horario_img" name="horario_img" aria-describedby="horario_imgHELP">
                            <div id="horario_imgHELP" class="form-text">Imagen de los horarios del taller.</div>
                            @error('horario_img')
                            <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"><strong style="color: red;">*</strong> Imagen del taller:</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" aria-describedby="imagenHELP">
                            <div id="imagenHELP" class="form-text">Una imagen descriptiva del taller.</div>
                            @error('imagen')
                            <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tipo_taller"><strong style="color: red;">*</strong> Tipo de taller:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_taller" id="tipo_taller1" value="Deportivo" checked>
                                <label class="form-check-label" for="tipo_taller1">
                                    Deportivo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_taller" id="tipo_taller2" value="Cultural">
                                <label class="form-check-label" for="tipo_taller2">
                                    Cultural
                                </label>
                            </div>
                            @error('tipo_taller')
                            <small class="form-text text-danger px-4">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tipo_taller"><strong style="color: red;">*</strong> Estatus del taller:</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="estatus" name="estatus" checked>
                                <label class="form-check-label" for="estatus">Activo</label>
                            </div>
                            @error('estatus')
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
            <form action="{{ route('taller.update', $talle->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label"><strong style="color: red;">*</strong> Nombre del taller:</label>
                        <input type="text" class="form-control" id="nombre_taller" name="nombre_taller" class="nombre_taller" value="{{ old('nombre_taller') ?? $talle->nombre_taller }}">
                        @error('nombre_taller')
                        <small class="form-text text-danger px-4">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label"><strong style="color: red;">*</strong> Descripción del taller</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') ?? $talle->descripcion }}</textarea>
                        @error('descripcion')
                        <small class="form-text text-danger px-4">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong style="color: red;">*</strong> Imagen del horario:</label>
                        <input type="file" class="form-control" id="horario_img" name="horario_img" aria-describedby="horario_imgHELP">
                        <div id="horario_imgHELP" class="form-text">Actualiza la imagen de los horarios del taller.</div>
                        @error('horario_img')
                        <small class="form-text text-danger px-4">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('img/horarios/'.$talle->horarios_img) }}" class="rounded" alt="{{ $talle->horarios_img }}" width="50">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong style="color: red;">*</strong> Imagen del taller:</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" aria-describedby="imagenHELP">
                        <div id="imagenHELP" class="form-text">Colocar otra imagen descriptiva del taller.</div>
                        @error('imagen')
                        <small class="form-text text-danger px-4">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('img/portadas/'.$talle->imagen) }}" class="rounded" alt="{{ $talle->imagen }}" width="50">
                    </div>
                    <div class="mb-3">
                        <label for="tipo_taller"><strong style="color: red;">*</strong> Tipo de taller:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo_taller" id="tipo_taller1" value="Deportivo" {{ $talle->tipo == 'Deportivo' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tipo_taller1">
                                Deportivo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo_taller" id="tipo_taller2" value="Cultural" {{ $talle->tipo == 'Cultural' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tipo_taller2">
                                Cultural
                            </label>
                        </div>
                        @error('tipo_taller')
                        <small class="form-text text-danger px-4">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tipo_taller"><strong style="color: red;">*</strong> Estatus del taller:</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="estatus" name="estatus" {{ $talle->estatus == 'Activo' ? 'checked' : '' }}>
                            <label class="form-check-label" for="estatus">Activo</label>
                        </div>
                        @error('estatus')
                        <small class="form-text text-danger px-4">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- END TALLER UPDATE -->