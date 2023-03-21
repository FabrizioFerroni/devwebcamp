<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Coloca tu nueva contraseña para ingresar a DevWebCamp</p>
    <?php
        
        if($token_valido){
            include_once __DIR__ . '/../templates/alertas.php';
    ?>
    <form  method="POST" class="formulario">
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Nueva Contraseña</label>
            <input type="password" id="password" name="password" class="formulario__input" placeholder="Ingresa tu nueva contraseña"  autocomplete="off" focus>
        </div>
        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Confirmar Contraseña</label>
            <input type="password" id="password2" name="password2" class="formulario__input" placeholder="Repita tu nueva contraseña"  autocomplete="off" focus>
        </div>
        <input type="submit" class="formulario__submit" value="Cambiar clave">
    </form>
    <?php }else{
            include_once __DIR__ . '/../templates/alertas2.php';

    } ?>
</main>