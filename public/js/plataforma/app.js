if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        navigator.serviceWorker.register('/service-worker.js')
            .then(reg => console.log('Service Worker registrado:', reg))
            .catch(err => console.log('Error al registrar el Service Worker:', err));
    });
}