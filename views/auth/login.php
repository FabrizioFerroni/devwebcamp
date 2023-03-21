<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Incia sesión en DevWebCamp</p>
    <?php
            include_once __DIR__ . '/../templates/alertas.php';
    ?>
    <form action="/iniciarsesion" method="POST" class="formulario">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input type="email" id="email" name="email" class="formulario__input" placeholder="Ingresa tu correo electrónico" autocomplete="off" focus>
        </div>

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Contraseña</label>
            <input type="password" id="password" name="password" class="formulario__input" placeholder="Ingresa tu contraseña" autocomplete="off">
        </div>
        <input type="submit" class="formulario__submit" value="Iniciar sesión">
    </form>
    <div class="acciones">
        <span>¿Aún no tenes cuenta? <a href="/registrarse" class="acciones__enlace">Crear una</a></span>
        <span>¿Te olvidaste la contraseña? <a href="/olvide-clave" class="acciones__enlace">Recuperar clave</a></span>
    </div>
</main>