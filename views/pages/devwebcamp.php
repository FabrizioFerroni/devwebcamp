<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia más importante de Latinoamérica.</p>
    <div class="devwebcamp__grid">
        <div class="devwebcamp__imagen" <?php aos_animacion(); ?>>
            <picture>
                <source srcset="/build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="/build/img/sobre_devwebcamp.webp" type="image/webp">
                <img src="/build/img/sobre_devwebcamp.jpg" alt="Imagen DevWebCamp" loading="lazy" width="200" height="300">
            </picture>
        </div>

        <div class="devwebcamp__contenido">
            <p <?php aos_animacion(); ?> class="devwebcamp__texto">
                Curabitur nec sodales metus, in rutrum lorem. Suspendisse consectetur nisl in leo mollis, a imperdiet augue sagittis. Vestibulum faucibus egestas bibendum. Pellentesque ac posuere leo, et elementum augue. Duis laoreet, lectus in finibus tincidunt, enim lorem fermentum ante, quis finibus sem neque et ante.
            </p>

            <p <?php aos_animacion(); ?> class="devwebcamp__texto">
                Curabitur nec sodales metus, in rutrum lorem. Suspendisse consectetur nisl in leo mollis, a imperdiet augue sagittis. Vestibulum faucibus egestas bibendum. Pellentesque ac posuere leo, et elementum augue. Duis laoreet, lectus in finibus tincidunt, enim lorem fermentum ante, quis finibus sem neque et ante.
            </p>
        </div>
    </div>
</main>