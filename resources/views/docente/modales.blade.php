<!-- Modal para crear aviso -->
<div id="modal-aviso" class="modal">
    <div class="modal-content center">
        <h4>Formulario para crear un aviso.</h4>
        <span>Mensajes que se mostraran para el taller de {{ $taller->nombre_taller }}.</span>
        <form action="{{ route('avisos.store', ['id' => $taller->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class="row pt-3">
                <div class="input-field col s12">
                    <input value="" id="tituloAviso" name="titulo" type="text" class="validate">
                    <label class="active" for="tituloAviso">Título</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="descripcion" name="descripcion" class="materialize-textarea" required></textarea>
                            <label for="descripcion">Descripción</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Imagen</span>
                    <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

            <div class="row center pt-3">
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light green">Guardar</button>
                    <a href="#!" class="btn modal-close waves-effect waves-green red">Cerrar</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal para crear aviso -->
<div id="modal-comentario" class="modal">
    <div class="modal-content center">
        <h4>Comentarios sobre el alumno.</h4>
        <span>El siguiente comentario es para dar seguimiento al alumno y será usado para estadísticas.</span>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="alumno_taller_id" id="alumno_taller_id" value="">
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="comentarios" name="comentarios" class="materialize-textarea" required></textarea>
                            <label for="descripcion">Anotaciones:</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row center pt-3">
                <div class="col s12">
                    <button type="submit" class="btn waves-effect waves-light green">Guardar</button>
                    <a href="#!" class="btn modal-close waves-effect waves-green red">Cerrar</a>
                </div>
            </div>
        </form>
    </div>
</div>