<!-- Modal para crear usuarios -->
<div class="modal fade" id="altamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleFormControlInput1"><strong style="color: red;">*</strong> Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="nombre..." value="{{ old('name') }}">
                            @error('nombre')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleFormControlInput1"><strong style="color: red;">*</strong> Apellido
                                Paterno:</label>
                            <input type="text" class="form-control" id="app" name="app"
                                placeholder="apellido p..." value="{{ old('app') }}">
                            @error('app')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleFormControlInput1"><strong style="color: red;">*</strong> Apellido
                                Materno:</label>
                            <input type="text" class="form-control" id="apm" name="apm"
                                placeholder="apellido m..." value="{{ old('apm') }}">
                            @error('apm')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-check-label">Sexo:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="sexo" value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Femenino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="sexo" value="0">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Masculino
                            </label>
                        </div>
                    </div>
                    <div class="col-12 pt-2">
                        <div class="form-group">
                            <label for="genero"><strong style="color: red;">*</strong> Genero:</label>
                            <select class="form-control" name="genero" id="genero">
                                <option value="" selected>Seleccione...</option>
                                <option value="M">Mujer</option>
                                <option value="H">Hombre</option>
                                <option value="NB">No Binario</option>
                                <option value="MT">Mujer Transgénero</option>
                                <option value="HT">Hombre Transgénero</option>
                                <option value="AG">Agénero</option>
                                <option value="NI">Identidad de género no incluida</option>
                                <option value="PE">Prefiero no especificar</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
                    </div>
                    <div class="col-12">
                        <label for="email"><strong style="color: red;">*</strong> Correo electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Ingrese el correo</small>
                        @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="password"><strong style="color: red;">*</strong> Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 pt-2">
                        <div class="form-group">
                            <label for="opciones"><strong style="color: red;">*</strong> Selecciona una
                                opción:</label>
                            <select class="form-control" id="opciones" name="rol_id"
                                onchange="mostrarFormulario()">
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="formularioEstudiante" style="display: none;">
                            <div class="pt-2">
                                <p>Ingrese datos adicionales para registrar un nuevo estudiante.</p>
                            </div>
                            <div class="form-group">
                                <label for="carrera"><strong style="color: red;">*</strong> Seleccione la carrera del
                                    estudiante:</label>
                                <select class="form-control" id="carrera" name="carrera">
                                    <option value="T.S.U Mantenimiento, Área industrial">T.S.U Mantenimiento, Área
                                        industrial.</option>
                                    <option value="T.S.U Mecatrónica, Área Sistermas Manufactura Flexible.">T.S.U
                                        Mecatrónica, Área Sistermas Manufactura Flexible.</option>
                                    <option
                                        value="T.S.U Tecnologías de la información, Área Desarrollo de Software Multiplataforma.">
                                        T.S.U Tecnologías de la información, Área Desarrollo de Software
                                        Multiplataforma.
                                    </option>
                                    <option
                                        value="T.S.U Tecnologías de la información, Área infraestructura de Redes Digitales.">
                                        T.S.U Tecnologías de la información, Área infraestructura de Redes Digitales.
                                    </option>
                                    <option value="T.S.U Procesos Industriales, Área Manufactura.">T.S.U Procesos
                                        Industriales, Área Manufactura.</option>
                                    <option value="T.S.U Química, Área Tecnología Ambiental.">T.S.U Química, Área
                                        Tecnología Ambiental.</option>
                                    <option value="T.S.U Paramédico.">T.S.U Paramédico.</option>
                                    <option value="T.S.U Desarrollo de Negocios, Área Ventas.">T.S.U Desarrollo de
                                        Negocios, Área Ventas.</option>
                                    <option value="T.S.U Desarrollo de Negocios, Área Mercadotecnica.">T.S.U Desarrollo
                                        de
                                        Negocios, Área Mercadotecnica.</option>
                                    <option value="ING. Mantenimiento Industrial.">ING. Mantenimiento Industrial.
                                    </option>
                                    <option value="ING. Mecatrónica">ING. Mecatrónica.</option>
                                    <option value="ING. Desarrollo y Gestión de Software.">ING. Desarrollo y Gestión de
                                        Software.</option>
                                    <option value="ING. Redes Inteligentes y Ciberseguridad">ING. Redes Inteligentes y
                                        Ciberseguridad.</option>
                                    <option value="ING. Sistemas Productivos.">ING. Sistemas Productivos.</option>
                                    <option value="ING. Tecnología Ambiental.">ING. Tecnología Ambiental.</option>
                                    <option value="LIC. Protección Civil y Emergencias.">LIC. Protección Civil y
                                        Emergencias.</option>
                                    <option value="LIC. Innovación de Negocios y Mercadotecnica.">LIC. Innovación de
                                        Negocios y Mercadotecnica.</option>
                                    <option value="LIC. Enfermería">LIC. Enfermería</option>
                                </select>
                                @error('carrera')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="matricula"><strong style="color: red;">*</strong> Matricula del
                                    estudiante:</label>
                                <input type="number" class="form-control" id="matricula" name="matricula"
                                    placeholder="222XXXXXX" value="{{ old('matricula') }}">
                                @error('matricula')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nss"><strong style="color: red;">*</strong> Ingresar número de
                                    seguridad social:</label>
                                <input type="text" class="form-control" id="nss" name="nss"
                                    placeholder="168XXXXXXXX" value="{{ old('nss') }}">
                                @error('nss')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin del modal crear usuarios -->

@foreach ($usuarios as $user)
    <!-- Modal Para editar Administradores y Docentes START -->
    @if ($user->rol_id == 1 || $user->rol_id == 2)
        <div class="modal fade" id="editmodal{{ $user->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('users.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><strong style="color: red;">*</strong>
                                        Nombre:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="nombre..." value="{{ old('name', $user->name) }}">
                                    @error('nombre')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><strong style="color: red;">*</strong>
                                        Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="app" name="app"
                                        placeholder="apellido p..." value="{{ old('app', $user->app) }}">
                                    @error('app')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><strong style="color: red;">*</strong>
                                        Apellido Materno:</label>
                                    <input type="text" class="form-control" id="apm" name="apm"
                                        placeholder="apellido m..." value="{{ old('apm', $user->apm) }}">
                                    @error('apm')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                                    value="{{ old('fecha_nac', $user->fecha_nac) }}">
                            </div>
                            <div class="py-2">
                                <label for="colFormLabelSm" class="form-label">Sexo:</label>
                                @if ($user->sexo == 1)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0"
                                            id="flexCheckDefault" name="sexo">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1"
                                            id="flexCheckChecked" name="sexo" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Femenino
                                        </label>
                                    </div>
                                @elseif($user->sexo == 0)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0" name="sexo"
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1" name="sexo"
                                            id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Femenino
                                        </label>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 pt-2">
                                <div class="form-group">
                                    <label for="genero"><strong style="color: red;">*</strong> Genero:</label>
                                    <select class="form-control" name="genero" id="genero">
                                        <option value="" {{ $user->genero == null ? 'selected' : '' }}>
                                            Seleccione...</option>
                                        <option value="M" {{ $user->genero == 'M' ? 'selected' : '' }}>Mujer
                                        </option>
                                        <option value="H" {{ $user->genero == 'H' ? 'selected' : '' }}>Hombre
                                        </option>
                                        <option value="NB" {{ $user->genero == 'NB' ? 'selected' : '' }}>No
                                            Binario</option>
                                        <option value="MT" {{ $user->genero == 'MT' ? 'selected' : '' }}>Mujer
                                            Transgénero</option>
                                        <option value="HT" {{ $user->genero == 'HT' ? 'selected' : '' }}>Hombre
                                            Transgénero</option>
                                        <option value="AG" {{ $user->genero == 'AG' ? 'selected' : '' }}>Agénero
                                        </option>
                                        <option value="NI" {{ $user->genero == 'NI' ? 'selected' : '' }}>Identidad
                                            de género no incluida</option>
                                        <option value="PE" {{ $user->genero == 'PE' ? 'selected' : '' }}>Prefiero
                                            no especificar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 pt-2">
                                <fieldset disabled>
                                    <div class="form-group">
                                        <label for="opciones">Selecciona una opción:</label>
                                        <select class="form-control" id="opciones" name="rol_id">
                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol->id }}"
                                                    {{ $user->rol_id == $rol->id ? 'selected' : '' }}>
                                                    {{ $rol->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>

                                <div id="formularioAdmin">
                                    <div class="pt-2">
                                        <p id="texto_registro">Ingrese datos adicionales para editar los datos
                                            <strong>(Unicamente en caso de ser requerido, de lo contrario, omitir esta
                                                sección y proceder con los demás cambios)</strong>.
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo electrónico:</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            aria-describedby="emailHelp" value="{{ old('email', $user->email) }}">
                                        <small id="emailHelp" class="form-text text-muted">Ingrese el nuevo correo del
                                            administrador o docente.</small>
                                        @error('email')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        @error('password')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Para editar Administradores y Docentes END -->

        <!-- Modal Para editar Estudiantes START -->
    @elseif($user->rol_id == 3)
        <div class="modal fade" id="editmodal{{ $user->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('users.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><strong style="color: red;">*</strong>
                                        Nombre:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="nombre..." value="{{ old('name', $user->name) }}">
                                    @error('nombre')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><strong style="color: red;">*</strong>
                                        Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="app" name="app"
                                        placeholder="apellido p..." value="{{ old('app', $user->app) }}">
                                    @error('app')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1"><strong style="color: red;">*</strong>
                                        Apellido Materno:</label>
                                    <input type="text" class="form-control" id="apm" name="apm"
                                        placeholder="apellido m..." value="{{ old('apm', $user->apm) }}">
                                    @error('apm')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                                    value="{{ old('fecha_nac', $user->fecha_nac) }}">
                            </div>
                            <div class="py-2">
                                <label for="colFormLabelSm" class="form-label">Sexo:</label>
                                @if ($user->sexo == 1)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0"
                                            id="flexCheckDefault" name="sexo">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1"
                                            id="flexCheckChecked" name="sexo" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Femenino
                                        </label>
                                    </div>
                                @elseif($user->sexo == 0)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0" name="sexo"
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1" name="sexo"
                                            id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Femenino
                                        </label>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 pt-2">
                                <div class="form-group">
                                    <label for="genero"><strong style="color: red;">*</strong> Genero:</label>
                                    <select class="form-control" name="genero" id="genero">
                                        <option value="" {{ $user->genero == null ? 'selected' : '' }}>
                                            Seleccione...</option>
                                        <option value="M" {{ $user->genero == 'M' ? 'selected' : '' }}>Mujer
                                        </option>
                                        <option value="H" {{ $user->genero == 'H' ? 'selected' : '' }}>Hombre
                                        </option>
                                        <option value="NB" {{ $user->genero == 'NB' ? 'selected' : '' }}>No
                                            Binario</option>
                                        <option value="MT" {{ $user->genero == 'MT' ? 'selected' : '' }}>Mujer
                                            Transgénero</option>
                                        <option value="HT" {{ $user->genero == 'HT' ? 'selected' : '' }}>Hombre
                                            Transgénero</option>
                                        <option value="AG" {{ $user->genero == 'AG' ? 'selected' : '' }}>Agénero
                                        </option>
                                        <option value="NI" {{ $user->genero == 'NI' ? 'selected' : '' }}>Identidad
                                            de género no incluida</option>
                                        <option value="PE" {{ $user->genero == 'PE' ? 'selected' : '' }}>Prefiero
                                            no especificar</option>
                                    </select>
                                </div>
                                @error('genero')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 pt-2">
                                <fieldset disabled>
                                    <div class="form-group">
                                        <label for="opciones">Selecciona una opción:</label>
                                        <select class="form-control" id="opciones" name="rol_id">
                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol->id }}"
                                                    {{ $user->rol_id == $rol->id ? 'selected' : '' }}>
                                                    {{ $rol->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <div id="formularioEstudiante">
                                    <div class="pt-2">
                                        <p>Ingrese datos adicionales para actualizar al estudiante.</p>
                                    </div>
                                    <fieldset disabled>
                                        <div class="form-group">
                                            <label for="carrera">Seleccione la carrera del estudiante:</label>
                                            <select class="form-control" id="carrera">
                                                <option value="T.S.U Mantenimiento, Área industrial"
                                                    {{ $user->carrera == 'T.S.U Mantenimiento, Área industrial' ? 'selected' : '' }}>
                                                    T.S.U Mantenimiento, Área industrial.</option>
                                                <option value="T.S.U Mecatrónica, Área Sistermas Manufactura Flexible"
                                                    {{ $user->carrera == 'T.S.U Mecatrónica, Área Sistermas Manufactura Flexible' ? 'selected' : '' }}>
                                                    T.S.U Mecatrónica, Área Sistermas Manufactura Flexible.</option>
                                                <option
                                                    value="T.S.U Tecnologías de la información, Área Desarrollo de Software Multiplataforma"
                                                    {{ $user->carrera == 'T.S.U Tecnologías de la información, Área Desarrollo de Software Multiplataforma' ? 'selected' : '' }}>
                                                    T.S.U Tecnologías de la información, Área Desarrollo de Software
                                                    Multiplataforma.</option>
                                                <option
                                                    value="T.S.U Tecnologías de la información, Área infraestructura de Redes Digitales"
                                                    {{ $user->carrera == 'T.S.U Tecnologías de la información, Área infraestructura de Redes Digitales' ? 'selected' : '' }}>
                                                    T.S.U Tecnologías de la información, Área infraestructura de Redes
                                                    Digitales.</option>
                                                <option value="T.S.U Procesos Industriales, Área Manufactura"
                                                    {{ $user->carrera == 'T.S.U Procesos Industriales, Área Manufactura' ? 'selected' : '' }}>
                                                    T.S.U Procesos Industriales, Área Manufactura.</option>
                                                <option value="T.S.U Química, Área Tecnología Ambiental"
                                                    {{ $user->carrera == 'T.S.U Química, Área Tecnología Ambiental' ? 'selected' : '' }}>
                                                    T.S.U Química, Área Tecnología Ambiental.</option>
                                                <option value="T.S.U Paramédico"
                                                    {{ $user->carrera == 'T.S.U Paramédico' ? 'selected' : '' }}>T.S.U
                                                    Paramédico.</option>
                                                <option value="T.S.U Desarrollo de Negocios, Área Ventas"
                                                    {{ $user->carrera == 'T.S.U Desarrollo de Negocios, Área Ventas' ? 'selected' : '' }}>
                                                    T.S.U Desarrollo de Negocios, Área Ventas.</option>
                                                <option value="T.S.U Desarrollo de Negocios, Área Mercadotecnica"
                                                    {{ $user->carrera == 'T.S.U Desarrollo de Negocios, Área Mercadotecnica' ? 'selected' : '' }}>
                                                    T.S.U Desarrollo de Negocios, Área Mercadotecnica.</option>
                                                <option value="ING. Mantenimiento Industrial"
                                                    {{ $user->carrera == 'ING. Mantenimiento Industrial' ? 'selected' : '' }}>
                                                    ING. Mantenimiento Industrial.</option>
                                                <option value="ING. Mecatrónica"
                                                    {{ $user->carrera == 'ING. Mecatrónica' ? 'selected' : '' }}>ING.
                                                    Mecatrónica.</option>
                                                <option value="ING. Desarrollo y Gestión de Software"
                                                    {{ $user->carrera == 'ING. Desarrollo y Gestión de Software' ? 'selected' : '' }}>
                                                    ING. Desarrollo y Gestión de Software.</option>
                                                <option value="ING. Redes Inteligentes y Ciberseguridad"
                                                    {{ $user->carrera == 'ING. Redes Inteligentes y Ciberseguridad' ? 'selected' : '' }}>
                                                    ING. Redes Inteligentes y Ciberseguridad.</option>
                                                <option value="ING. Sistemas Productivos"
                                                    {{ $user->carrera == 'ING. Sistemas Productivos' ? 'selected' : '' }}>
                                                    ING. Sistemas Productivos.</option>
                                                <option value="ING. Tecnología Ambiental"
                                                    {{ $user->carrera == 'ING. Tecnología Ambiental' ? 'selected' : '' }}>
                                                    ING. Tecnología Ambiental.</option>
                                                <option value="LIC. Protección Civil y Emergencias"
                                                    {{ $user->carrera == 'LIC. Protección Civil y Emergencias' ? 'selected' : '' }}>
                                                    LIC. Protección Civil y Emergencias.</option>
                                                <option value="LIC. Innovación de Negocios y Mercadotecnica"
                                                    {{ $user->carrera == 'LIC. Innovación de Negocios y Mercadotecnica' ? 'selected' : '' }}>
                                                    LIC. Innovación de Negocios y Mercadotecnica.</option>
                                                <option value="LIC. Enfermería"
                                                    {{ $user->carrera == 'LIC. Enfermería' ? 'selected' : '' }}>LIC.
                                                    Enfermería.</option>
                                            </select>
                                            @error('carrera')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <label for="matricula"><strong style="color: red;">*</strong> Matricula del
                                            estudiante:</label>
                                        <input type="number" class="form-control" id="matricula" name="matricula"
                                            placeholder="222XXXXXX" value="{{ old('matricula', $user->matricula) }}">
                                        @error('matricula')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion"><strong style="color: red;">*</strong> NSS:</label>
                                        <input type="text" class="form-control" id="nss" name="nss"
                                            placeholder="Numero de seguridad social"
                                            value="{{ old('nss', $user->nss) }}">
                                        @error('direccion')
                                            <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Para editar Estudiantes START -->
    @endif
@endforeach
