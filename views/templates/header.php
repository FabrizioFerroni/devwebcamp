<header class="header">
    <div class="header__contenedor">
        <nav class="header__navegacion">
            <?php if (is_auth()) {
            ?>
                <a href="<?php echo is_admin() ? '/admin/tablero' : '/finalizar-registro'; ?>" class="header__enlace"><?php echo is_admin() ? 'Administrar' : 'Finalizar registro'; ?></a>
                <form method="post" action="/cerrarsesion" class="header__form">
                    <input type="submit" value="Cerrar Sesión" class="header__submit">
                </form>
            <?php
            } else {
            ?>
                <a href="/registrarse" class="header__enlace">Crear cuenta</a>
                <a href="/iniciarsesion" class="header__enlace">Iniciar Sesión</a>
            <?php
            }
            ?>

        </nav>
        <div class="header__contenido">
            <a href="/">
                <h1 class="header__logo">
                    &#60;DevWebCamp />
                </h1>
            </a>
            <p class="header__texto">Octubre 5-6 - 2023</p>
            <p class="header__texto header__texto--modalidad">En Línea - Presencial</p>

            <a href="/registrarse" class="header__boton">Comprar pase</a>
        </div>
    </div>
</header>
<div class="barra">
    <div class="barra__contenido">
        <a href="/">
            <h2 class="barra__logo">&#60;DevWebCamp /></h2>
        </a>
        <nav class="navegacion">
            <a href="/devwebcamp" class="navegacion__enlace <?php echo pagina_actual('/devwebcamp') ? 'navegacion__enlace--actual' : ''; ?>">Evento</a>
            <a href="/paquetes" class="navegacion__enlace <?php echo pagina_actual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>">Paquetes</a>
            <a href="/workshops-conferencias" class="navegacion__enlace <?php echo pagina_actual('/workshops-conferencias') ? 'navegacion__enlace--actual' : ''; ?>">Workshop / Conferencias</a>
            <a href="/registrarse" class="navegacion__enlace <?php echo pagina_actual('/registrarse') ? 'navegacion__enlace--actual' : ''; ?>">Comprar pase</a>
        </nav>
    </div>
</div>