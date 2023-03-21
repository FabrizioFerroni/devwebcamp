if (document.querySelector('#mapa')) {
    const lat = -32.4107049;
    // const lat = -32.4145354;
    const lng = -63.2498541;
    // const lng = -63.259133;
    const zoom = 16;

    const map = L.map('mapa').setView([lat, lng], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(`
            <h2 class="mapa__heading">DevWebCamp</h2>
            <p class="mapa__texto">Centro de Convencion Leonardo Favio de Villa María</p>
        `)
        .openPopup();
}