(() => {
    const grafica = document.querySelector('#regalos-grafica');
    if (grafica) {

        obtenerDatos();
        async function obtenerDatos() {
            const url = `${location.origin}/api/regalos`;
            const respuesta = await fetch(url)
            const resultado = await respuesta.json()

            const ctx = document.getElementById('regalos-grafica').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: resultado.map(regalo => regalo.nombre),
                    datasets: [{
                        label: '',
                        data: resultado.map(regalo => regalo.total),
                        backgroundColor: [
                            'rgba(234, 88, 12, 0.2)',
                            'rgba(132, 204, 22, 0.2)',
                            'rgba(34, 211, 238, 0.2)',
                            'rgba(168, 85, 247, 0.2)',
                            'rgba(239, 68, 68, 0.2)',
                            'rgba(20, 184, 166, 0.2)',
                            'rgba(219, 39, 119, 0.2)',
                            'rgba(225, 29, 72, 0.2)',
                            'rgba(126, 34, 206, 0.2)'
                        ],
                        borderColor: [
                            'rgba(234, 88, 12, 1)',
                            'rgba(132, 204, 22, 1)',
                            'rgba(34, 211, 238, 1)',
                            'rgba(168, 85, 247, 1)',
                            'rgba(239, 68, 68, 1)',
                            'rgba(20, 184, 166, 1)',
                            'rgba(219, 39, 119, 1)',
                            'rgba(225, 29, 72, 1)',
                            'rgba(126, 34, 206, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

        }

    }
})()