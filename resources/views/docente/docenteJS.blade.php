<script>
    let porcentajes = @json($porcentajes) // Convertimos JSON de PHP a JS

    let rowID, rowDom;

    porcentajes.forEach(porcentaje => {
        rowID = `porcentaje${porcentaje.user_id}`
        rowDom = document.getElementById(rowID);

        // console.log(porcentaje)

        porcentaje.porcentaje_asistencia === null ? rowDom.textContent = '0%' : rowDom.textContent = parseInt(porcentaje.porcentaje_asistencia) + '%'
    })


    async function datosAlumno(id) {
        //  Id de alumno_taller en input
        const alumno_taller_id = document.getElementById('alumno_taller_id');
        alumno_taller_id.value = parseInt(id)

        console.log('Alumno_taller: ',alumno_taller_id.value)

        const modal = document.getElementById('modalAlumno');
        const instance = M.Modal.init(modal);

        const url = 'http://127.0.0.1:8000/api/comentarios'

        await fetch(`${url}/${id}`)
            .then(response => response.json())
            .then(informacion => {
                console.log('información: ',informacion)
                const nombre_alumno = document.getElementById('nombre_alumno');
                nombre_alumno.textContent = `${informacion.alumno[0].name} ${informacion.alumno[0].app} ${informacion.alumno[0].apm}`
                mostrarComentarios(informacion.comentarios)
            })

        instance.open();
    }

    function mostrarComentarios(comentarios) {
        const tbody = document.getElementById('comentariosTable');
        tbody.innerHTML = '';

        if (comentarios.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td>Sin Comentarios</td>
                </tr>
            `
            return
        }

        comentarios.forEach(comentario => {

            const {
                fecha,
                comentario_docente
            } = comentario;

            const tr = document.createElement('tr');
            const tdFecha = document.createElement('td');
            const tdComentario = document.createElement('td');

            const fechajs = new Date(fecha).toLocaleDateString('es-ES', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            tdFecha.textContent = fechajs
            tdComentario.textContent = comentario_docente;

            tr.appendChild(tdFecha);
            tr.appendChild(tdComentario);

            tbody.appendChild(tr);
        })
    }

    function modalConstancia(id) {
        const modal = document.getElementById('modalConstancia');
        const instance = M.Modal.init(modal);

        const alumno_tallers_id = document.getElementById('alumno_tallers_id');
        alumno_tallers_id.value = parseInt(id)

        instance.open();
    }

    function modalComentario() {
        const modal = document.getElementById('modal-comentario');
        const instance = M.Modal.init(modal);

        instance.open();
    }
</script>

@if(session('success'))
<script>
    M.toast({
        html: "{{ session('success') }}",
        classes: 'green darken-3'
    })
</script>
@endif

@if(session('avisoSuccess'))
<script>
    var toastHTML = `<span>{{ session('avisoSuccess') }}</span><a href="/avisos" class="btn-flat toast-action">Ir...</a>`;
    M.toast({
        html: toastHTML,
        classes: 'green darken-3'
    })
</script>
@endif