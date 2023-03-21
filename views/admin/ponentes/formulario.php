<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">
        Información Personal
    </legend>
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="formulario__input" placeholder="Ingresa el nombre del ponente" value="<?php echo $ponente->nombre ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="formulario__input" placeholder="Ingresa el apellido del ponente" value="<?php echo $ponente->apellido ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" class="formulario__input" placeholder="Ingresa el ciudad del ponente" value="<?php echo $ponente->ciudad ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label for="pais" class="formulario__label">País</label>
        <input type="text" name="pais" id="pais" class="formulario__input" placeholder="Ingresa el pais del ponente" value="<?php echo $ponente->pais ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <div class="formulario__custom-input-file">
            <input type="file" name="imagen2" id="imagen2" class="formulario__input formulario__input--file">
        </div>

        <div class="formulario__custom-file">
            <input type="file" name="imagen" id="imagen" accept="image/*" class="inputfile inputfile-7" data-multiple-caption="{count} archivos seleccionados" multiple />
            <label for="imagen" class="labelfile-7">
                <strong>
                    <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">
                        <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                    </svg>
                    Seleccionar imagen
                </strong>
                    <span class="iborrainputfile"></span>
            </label>
        </div>
    </div>

    <?php if(isset($ponente->imagen_actual)){?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen_actual .'.webp' ; ?>" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen_actual .'.png' ; ?>" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen_actual .'.png' ; ?>" alt="Imagen ponente">
            </picture>
        </div>
    <?php } ?>
</fieldset>
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">
        Información Extra
    </legend>
    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Áreas de experiencia (separadas por comas)</label>
        <input type="text" id="tags_input" class="formulario__input" placeholder="Ej: NodeJS, PHP, Laravel, Angular">
        <div id="tags" class="formulario__listado"></div>
        <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">
    </div>
</fieldset>
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">
        Redes Sociales
    </legend>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input type="url" name="redes[facebook]" class="formulario__input formulario__input--sociales" placeholder="Ingresa el facebook del ponente" value="<?php echo $redes->facebook ?? ''; ?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input type="url" name="redes[github]" class="formulario__input formulario__input--sociales" placeholder="Ingresa el github del ponente" value="<?php echo $redes->github ?? ''; ?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input type="url" name="redes[instagram]" class="formulario__input formulario__input--sociales" placeholder="Ingresa el instagram del ponente" value="<?php echo $redes->instagram ?? ''; ?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input type="url" name="redes[tiktok]" class="formulario__input formulario__input--sociales" placeholder="Ingresa el tiktok del ponente" value="<?php echo $redes->tiktok ?? ''; ?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input type="url" name="redes[twitter]" class="formulario__input formulario__input--sociales" placeholder="Ingresa el twitter del ponente" value="<?php echo $redes->twitter ?? ''; ?>">
        </div>
    </div>
    <div class="formulario__campo">
        <div class="formulario__contenedor--icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input type="url" name="redes[youtube]" class="formulario__input formulario__input--sociales" placeholder="Ingresa el canal de youtube del ponente" value="<?php echo $redes->youtube ?? ''; ?>">
        </div>
    </div>
</fieldset>