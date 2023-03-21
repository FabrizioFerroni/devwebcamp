(() => {
    const ponentesInput = document.querySelector('#ponentes');
    if (ponentesInput) {
        let ponentes = [],
            ponentesFiltrados = [];

        const listadoPonentes = document.querySelector('#listado-ponentes');
        const inputHiddenPonente = document.querySelector('[name="ponente_id"]');

        obtenerPonentes();

        ponentesInput.addEventListener('input', buscarPonentes);

        if (inputHiddenPonente.value) {
            (async() => {
                const ponente = await obtenerPonente(inputHiddenPonente.value);
                const { id, nombre, apellido } = ponente;
                // Insertar en el HTML 
                const ponenteDOM = document.createElement('LI');
                ponenteDOM.classList.add('listado-ponentes__ponente', 'listado-ponentes__ponente--seleccionado');
                ponenteDOM.textContent = `${nombre} ${apellido}`;

                listadoPonentes.appendChild(ponenteDOM);
            })()
        }
        async function obtenerPonentes() {
            const url = `${location.origin}/api/ponentes`;

            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            formatearPonentes(resultado);
        }

        async function obtenerPonente(id) {
            const url = `${location.origin}/api/ponente?id=${id}`;

            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            return resultado;
        }

        function formatearPonentes(arrayPonentes = []) {
            ponentes = arrayPonentes.map(ponente => {
                const { id, nombre, apellido } = ponente;
                return {
                    nombre: `${nombre.trim()} ${apellido.trim()}`,
                    id: id
                }
            });
        }

        function buscarPonentes(e) {
            const busqueda = e.target.value;
            if (busqueda.length > 3) {
                const expresion = new RegExp(busqueda, "i");
                ponentesFiltrados = ponentes.filter(ponente => {
                    if (ponente.nombre.toLowerCase().search(expresion) != -1) {
                        return ponente;
                    }
                })
                mostrarPonentes();
            } else {
                ponentesFiltrados = [];
            }
        }

        function mostrarPonentes() {
            while (listadoPonentes.firstChild) {
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }

            if (ponentesFiltrados.length > 0) {
                ponentesFiltrados.forEach(ponente => {
                    const ponenteHtml = document.createElement('LI');
                    ponenteHtml.classList.add('listado-ponentes__ponente');
                    ponenteHtml.textContent = ponente.nombre;
                    ponenteHtml.dataset.ponenteId = ponente.id;
                    ponenteHtml.onclick = seleccionarPonente;
                    listadoPonentes.appendChild(ponenteHtml);
                })
            } else {
                const noResultado = document.createElement('P');
                noResultado.classList.add('listado-ponentes__no-resultado');;
                noResultado.textContent = 'No hay resultado para tu búsqueda';
                listadoPonentes.appendChild(noResultado);
            }
        }

        function seleccionarPonente(e) {
            const ponente = e.target;

            const ponentePrevio = document.querySelector('.listado-ponentes__ponente--seleccionado');
            if (ponentePrevio) {
                ponentePrevio.classList.remove('listado-ponentes__ponente--seleccionado');
            }
            ponente.classList.add('listado-ponentes__ponente--seleccionado');

            inputHiddenPonente.value = e.target.dataset.ponenteId;
        }
    }
})();