<?php include_once "includes/conexion.php"; ?>
<?php include_once "includes/helpers.php"; ?>
<?php
$categoria_actual = conseguir_categoria($db, $_GET['id']);

if (!isset($categoria_actual['id'])) {
    header('Location: index.php');
}
?>
<?php include_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php"; ?>

<!-- contenido principal -->
<div id="principal">

    <h1>Entradas de <?= $categoria_actual['nombre']; ?></h1>
    <?php
    $entradas = conseguir_entradas($db, null, $_GET['id']);
    if (!empty($entradas)) :
        while ($entrada = mysqli_fetch_assoc($entradas)) : ?>

            <article class="entradas">
                <a href="entrada.php?id=<?= $entrada['id'] ?>">
                    <h2>
                        <?= $entrada['titulo']; ?>
                    </h2>
                    <span class="fecha"><?= $entrada['categorias'] . ' ' . $entrada['fecha']; ?></span>
                    <p>
                        <?= substr($entrada['descripcion'], 0, 200) . "..."; ?>
                    </p>
                </a>
            </article>
    <?php
        endwhile;
    endif;

    ?>

    <div id="ver_todas">
        <a href="entradas.php">Ver todas las entradas</a>
    </div>

</div>
<!-- fin del contenedor -->
<?php include_once "includes/pie.php"; ?>

</body>

</html>