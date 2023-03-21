<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Registrate en DevWebCamp</p>
    <?php
        include_once __DIR__ . '/../templates/alertas.php';
    ?>
    <form action="/registrarse" method="POST" class="formulario" novalidate>
    <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="formulario__input" placeholder="Ingresa tu nombre" value="<?php echo s($usuario->nombre); ?>" autocomplete="off" focus>
        </div>

        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellido</label>
            <input type="text" id="apellido" name="apellido" class="formulario__input" placeholder="Ingresa tu apellido" value="<?php echo s($usuario->apellido); ?>"  autocomplete="off">
        </div>

        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input type="email" id="email" name="email" class="formulario__input" placeholder="Ingresa tu correo electrónico" value="<?php echo s($usuario->email); ?>"  autocomplete="off">
        </div>

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Contraseña</label>
            <input type="password" id="password" name="password" class="formulario__input" placeholder="Ingresa tu contraseña"  autocomplete="off">
        </div>

        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Confirma contraseña</label>
            <input type="password" id="password2" name="password2" class="formulario__input" placeholder="Confirma tu contraseña"  autocomplete="off">
        </div>
        <input type="submit" class="formulario__submit" value="Registrate">
    </form>
    <div class="acciones">
        <span>¿Ya tenes cuenta? <a href="/iniciarsesion" class="acciones__enlace">Iniciar sesión</a></span>
    </div>
</main>