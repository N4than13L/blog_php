<?php
if (!isset($_POST['busqueda'])) {
    header('Location: index.php');
}
?>
<?php include_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php"; ?>

<!-- contenido principal -->
<div id="principal">
    <h1>Busqueda: <?= $_POST['busqueda'] ?></h1>
    <?php
    $entradas = buscar_entradas($db, $_POST['busqueda']);
    if (!empty($entradas)) :
        while ($entrada = mysqli_fetch_assoc($entradas)) : ?>

            <article class="entradas">
                <a href="entrada.php?id=<?= $entrada['id'] ?>">
                    <h2>
                        <?= $entrada['titulo']; ?>
                    </h2>
                    <span class="fecha"><?= $entrada['categoria'] . ' ' . $entrada['fecha']; ?></span>
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