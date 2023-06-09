<?php include_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php"; ?>

<!-- contenido principal -->
<div id="principal">
    <h1>Ultimas entradas</h1>
    <?php
    $entradas = conseguir_ultimas_entradas($db);
    if (!empty($entradas)) :
        while ($entrada = mysqli_fetch_assoc($entradas)) : ?>

            <article class="entradas">
                <h2>
                    <?= $entrada['titulo']; ?>
                </h2>
                <span class="fecha"><?= $entrada['categoria'] . ' ' . $entrada['fecha']; ?></span>
                <p>
                    <?= substr($entrada['descripcion'], 0, 200) . "..."; ?>
                </p>
            </article>
    <?php
        endwhile;
    endif;

    ?>

    <div id="ver_todas">
        <a href="">Ver todas</a>
    </div>

</div>
<!-- fin del contenedor -->
<?php include_once "includes/pie.php"; ?>

</body>

</html>