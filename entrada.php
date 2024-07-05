<?php include_once "includes/conexion.php"; ?>
<?php include_once "includes/helpers.php"; ?>
<?php
$entrada_actual = conseguir_entrada($db, $_GET['id']);

if (!isset($entrada_actual['id'])) {
    header('Location: index.php');
}

?>
<?php include_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php"; ?>

<!-- contenido principal -->
<div id="principal">

    <h1><?= $entrada_actual['titulo']; ?></h1>
    <a href="categoria.php?id=<?= $entrada_actual['categorias_id'] ?>">
        <h2><?= $entrada_actual['categorias']; ?></h2>
    </a>
    <h4><?= $entrada_actual['fecha']; ?> | <?= $entrada_actual['usuarios'] ?></h4>
    <p><?= $entrada_actual['descripcion']; ?></p>

    <?php
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id']  == $entrada_actual['usuarios_id']) : ?>
        <a class="boton-naranja" href="editar_entrada.php?id=<?= $entrada_actual['id'] ?>">Editar entrada</a>

        <a href="borrar_entrada.php?id=<?= $entrada_actual['id'] ?>" class="boton-rojo">Borrar entrada</a>
    <?php endif; ?>

    <div id="ver_todas">
        <a href="entradas.php">Ver todas las entradas</a>
    </div>

</div>
<!-- fin del contenedor -->
<?php include_once "includes/pie.php"; ?>

</body>

</html>