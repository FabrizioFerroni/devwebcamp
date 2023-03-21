<div class="evento">
    <p class="evento__hora"><?php echo $evento->hora->hora; ?></p>
    <div class="evento__informacion">
        <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>

        <p class="evento__introduccion"><?php echo $evento->descripcion; ?></p>

        <div class="evento__autor-info">
            <picture>
                <source srcset="<?php echo '/img/speakers/' . $evento->ponente->imagen . '.webp'; ?>" type="image/webp">
                <source srcset="<?php echo '/img/speakers/' . $evento->ponente->imagen . '.png'; ?>" type="image/png">
                <img class="evento__autor-imagen" loading="lazy" src="<?php echo '/img/speakers/' . $evento->ponente->imagen . '.png'; ?>" width="200" height="300" alt="Imagen ponente">
            </picture>
            <p class="evento__autor-nombre">
                <?php echo $evento->ponente->nombre . ' ' . $evento->ponente->apellido; ?>
            </p>
        </div>
    <p class="evento__disponible">Lugares disponibles: <span><?php echo $evento->disponibles; ?></span></p>
        <button type="button" data-id="<?php echo $evento->id; ?>" class="evento__agregar" <?php echo ($evento->disponibles === "0") ? 'disabled' : ''; ?> ><?php echo ($evento->disponibles === "0") ? 'No hay mas lugar' : 'Agregar'; ?></button>
    </div>
</div>