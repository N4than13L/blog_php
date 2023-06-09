<?php include_once "includes/redirecion.php"; ?>
<?php include_once "includes/cabecera.php"; ?>
<?php include_once "includes/lateral.php"; ?>

<!-- contenido principal -->
<div id="principal">
    <h1>Crear categorias</h1>
    <h2>Agrega las categorias para poder crear tus entradas</h2>
    <form action="guardar_categoria.php" method="POST">
        <label for="nombre">Nombre de la categoria:</label>
        <input type="text" name="nombre" placeholder="nombre de la categoria" />
        <input type="submit" value="guardar" />
    </form>


</div>
<!-- fin del contenedor -->
<?php include_once "includes/pie.php"; ?>