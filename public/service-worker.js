self.addEventListener('install', function (e) {
    e.waitUntil(
        caches.open('mi-app-cache').then(function (cache) {
            return Promise.all([
                '/',
                '/public/css/plataforma/materialize.css',
                '/public/css/plataforma/style.css',
                '/public/js/plataforma/app.js',
                '/public/manifest.webmanifest',
                '/public/img/src/icon-192x192.png',
                '/public/img/src/icon-512x512.png'
            ].map(url => {
                return fetch(url)
                    .then(response => {
                        if (!response.ok) throw new Error(`Falló ${url}`);
                        return cache.put(url, response.clone());
                    });
            }));
        })
    );
});


self.addEventListener('activate', () => {
    console.log('Service Worker activado')
})

self.addEventListener('fetch', function (e) {
    e.respondWith(
        caches.match(e.request).then(function (response) {
            return response || fetch(e.request);
        })
    );
});
