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

<!-- Modal para crear comentario del alumno -->
<div id="modal-comentario" class="modal">
    <div class="modal-content center">
        <h4>Comentarios sobre el alumno.</h4>
        <span>El siguiente comentario es para dar seguimiento al alumno y será usado para estadísticas.</span>
        <form action="{{ route('comentario') }}" method="POST" enctype="multipart/form-data">
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

<!-- Modal Structure -->
<div id="modalConstancia" class="modal">
    <div class="modal-content">
        <h4 class="center">Constancia</h4>
        <form action="{{ route('constancia-alumno') }}" method="POST">
            @csrf
            <div class="col pt-3 center">
                Estas a punto de conceder una constancia al alumno:
            </div>
            <div class="col center">
                <strong>
                    <h5 class="light" id="taller"></h5>
                </strong>
                <h5>📄</h5>
            </div>
            <div class="col center">
                <input type="text" name="alumno_tallers_id" id="alumno_tallers_id" value="" style="display: none;">
            </div>
            <div class="row pt-5">
                <div class="col s12 m6 center">
                    <a href="#!" class="modal-close waves-effect waves-light btn red">Cancelar</a>
                </div>
                <div class="col s12 m6 center">
                    <button type="submit" class="waves-effect waves-light btn green darken-3">Conceder</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Structure -->
<div id="modalAlumno" class="modal modal-fixed-footer bottom-sheet">
    <div class="modal-content">
        <h4 id="nombre_alumno">Alumno</h4>
        <p>Todos los comentarios acerca del alumno: </p>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Comentarios</th>
                </tr>
            </thead>

            <tbody id="comentariosTable">
                <tr>
                    <td>Sin Comentarios</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        <a href="#!" class="waves-effect waves-green btn green dark " onclick="modalComentario()">Nuevo Comentario</a>
    </div>
</div>