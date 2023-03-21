<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Ultimos registros</h3>
            <?php foreach ($registros as $registro) {?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $registro->usuario->nombre . ' ' . $registro->usuario->apellido; ?>
                    </p>
                </div>
            <?php }?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Ultimos ingresos</h3>
            <p class="bloque__texto--cantidad">
                $<?php echo number_format($ingresos, 2, ',', '.'); ?>
            </p>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos con menos lugares disponibles</h3>
            <?php foreach($menos_disponibles as $menos){ ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $menos->nombre . ' - ' . $menos->disponibles . ' disponibles'; ?>
                    </p>
                </div>
            <?php } ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos con mas lugares disponibles</h3>
            <?php foreach($mas_disponibles as $mas){ ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $mas->nombre . ' - ' . $mas->disponibles . ' disponibles'; ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
</main>