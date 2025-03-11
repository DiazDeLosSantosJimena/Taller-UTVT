<!-- Modal Para crear Docentes START -->
<div class="modal fade" id="altaModalDocente" tabindex="-1" aria-labelledby="altaModalDocenteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="altaModalDocenteLabel">Registro de Usuarios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('storeDocentes') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name" class="py-2"><strong style="color: red;">*</strong> Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="nombre..." value="{{ old('name') }}">
                            @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="app"><strong style="color: red;">*</strong> Apellido
                                Paterno:</label>
                            <input type="text" class="form-control" id="app" name="app"
                                placeholder="apellido p..." value="{{ old('app') }}">
                            @error('app')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="apm"><strong style="color: red;">*</strong> Apellido
                                Materno:</label>
                            <input type="text" class="form-control" id="apm" name="apm"
                                placeholder="apellido m..." value="{{ old('apm') }}">
                            @error('apm')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 pt-2">
                        <label class="form-check-label">Sexo:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="sexo" value="F" {{  old('sexo') == 'F' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Femenino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="sexo" value="M" {{ old('sexo') == 'M' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Masculino
                            </label>
                        </div>
                        @error('sexo')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
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
                        @error('genero')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 pt-2">
                        <label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ old('fecha_nac') }}">
                        @error('fecha_nac')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 pt-2">
                        <label for="email"><strong style="color: red;">*</strong> Correo electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                        <small id="emailHelp" class="form-text text-muted">Ingrese el correo</small>
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 pt-2">
                        <label for="password"><strong style="color: red;">*</strong> Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 pt-2">
                        <div class="form-group">
                            <label for="rol_id"><strong style="color: red;">*</strong> Selecciona una
                                opción:</label>
                            <select class="form-control" id="rol_id" name="rol_id" disabled>
                                <option value="2" selected>Docente</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Para editar Administradores y Docentes START -->
@foreach ($docentes as $user)
<div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Editar usuario.</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
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
@endforeach
<!-- Modal Para editar Administradores y Docentes END -->

<!-- Modal Docente delete START -->
@foreach ($docentes as $user)
<div class="modal fade" id="deleteModalDocente{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Taller | Docente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <strong>
                    <p>{{ $user->name .' '. $user->app .' '. $user->apm}}</p>
                </strong>
            </div>
            <div class="modal-footer">
            <form action="{{ route('docente.delete', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
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

<!-- Modal Asignar docentes a talleres CREATE -->
<div class="modal fade" id="asignarDocenteTaller" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="floatingInput">Selecciona un taller:</label>
                            <select class="form-select" aria-label="Default select example" name="taller_id">
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
