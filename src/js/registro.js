import Swal from 'sweetalert2';
(() => {
    let eventos = [];
    const resumen = document.querySelector('#registro-resumen');

    if (resumen) {

        const eventoBtn = document.querySelectorAll('.evento__agregar');
        eventoBtn.forEach(boton => boton.addEventListener('click', seleccionarEvento));
        const formularioRegistro = document.querySelector('#registro');
        formularioRegistro.addEventListener('submit', submitFormulario);

        mostrarEventos();

        function seleccionarEvento({ target }) {
            if (eventos.length < 5) {
                // Deshabilitar el evento
                target.disabled = true;
                eventos = [...eventos, {
                    id: target.dataset.id,
                    titulo: target.parentElement.querySelector('.evento__nombre').textContent.trim()
                }];

                mostrarEventos();
            } else {
                Swal.fire({
                    title: 'Upps.. hubo un error 😣',
                    text: "Máximo 5 eventos por registro",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#007df4',
                    confirmButtonText: 'Ok'
                });
            }
        }

        function mostrarEventos() {
            // Limpiar el html
            limpiarEvento();
            if (eventos.length > 0) {
                eventos.forEach(evento => {
                    const eventoDOM = document.createElement('DIV');
                    eventoDOM.classList.add('registro__evento');
                    const titulo = document.createElement('H3');
                    titulo.classList.add('registro__nombre');
                    titulo.textContent = evento.titulo;
                    const btnEliminar = document.createElement('BUTTON');
                    btnEliminar.classList.add('registro__eliminar');
                    btnEliminar.innerHTML = `
                        <i class="fa-solid fa-trash"></i>
                    `;
                    btnEliminar.onclick = () => {
                            eliminarEvento(evento.id);
                        }
                        // Renderizar en el html
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(btnEliminar);
                    resumen.appendChild(eventoDOM);
                })
            } else {
                const noRegistro = document.createElement('P');
                noRegistro.textContent = 'No hay eventos añade hasta 5 del lado izquierdo';
                noRegistro.classList.add('text-center');
                resumen.appendChild(noRegistro);
            }
        }

        function eliminarEvento(id) {
            eventos = eventos.filter(evento => evento.id !== id);
            const btnAgregar = document.querySelector(`[data-id="${id}"]`);
            btnAgregar.disabled = false;
            mostrarEventos();
        }

        function limpiarEvento() {
            while (resumen.firstChild) {
                resumen.removeChild(resumen.firstChild);
            }
        }

        async function submitFormulario(e) {
            e.preventDefault();

            const regaloId = document.querySelector('#regalo').value;

            const eventoId = eventos.map(evento => evento.id);
            if (eventoId.length === 0 || regaloId === '') {
                Swal.fire({
                    title: 'Upps.. hubo un error 😣',
                    text: "Elige al menos 1 evento y 1 regalo",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#007df4',
                    confirmButtonText: 'Ok'
                });
                return;
            }

            // Objeto de formdata
            const datos = new FormData();
            datos.append('eventos', eventoId);
            datos.append('regalo_id', regaloId);

            const url = `${location.origin}/finalizar-registro/conferencias`;
            const rsp = await fetch(url, {
                method: 'POST',
                body: datos
            });
            const res = await rsp.json();

            if (res.resultado) {
                Swal.fire({
                    title: 'Registro Éxitoso 😁',
                    text: "Tus conferencias se han almacenado y tu registro fue exitoso, te esperamos en DevWebCamp",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#007df4',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = `${location.origin}/boleto?id=${res.token.toUpperCase()}`;
                    }
                });
            } else {
                Swal.fire({
                    title: 'Upps.. hubo un error 😣',
                    text: "Hubo un error al seleccionar los eventos",
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#007df4',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }
        }
    }
})()