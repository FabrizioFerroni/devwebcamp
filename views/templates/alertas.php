<?php
    foreach($alertas as $key => $alerta){
        foreach($alerta as $mensaje){
?>
            <div class="alerta alerta__<?php echo $key; ?>">
                <?php echo $mensaje; ?>
                <span class="cerrar" title="Cerrar">X</span>
            </div>
<?php
        }
    }
?>