<?php include_once "includes/conexion.php"; ?>
<?php include_once "includes/helpers.php"; ?>
<?php
$entrada_actual = conseguir_entrada($db, $_GET['id']);

// if (!isset($entrada_actual['id'])) {
// header('Location: index.php');
// }

?>
<?php include_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php"; ?>

<!-- contenido principal -->
<div id="principal">

    <h1><?= $entrada_actual['titulo']; ?></h1>
    <a href="categoria.php?id=<?= $entrada_actual['categoria_id'] ?>">
        <h2><?= $entrada_actual['categoria']; ?></h2>
    </a>
    <h4><?= $entrada_actual['fecha']; ?></h4>
    <p><?= $entrada_actual['descripcion']; ?></p>

    <div id="ver_todas">
        <a href="entradas.php">Ver todas las entradas</a>
    </div>

</div>
<!-- fin del contenedor -->
<?php include_once "includes/pie.php"; ?>

</body>

</html>