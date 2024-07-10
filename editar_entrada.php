<?php include_once "includes/redirecion.php"; ?>
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


<div id="principal">
    <h1>Editar entrada</h1>
    <h2>Edita tus entradas</h2>
    <p>Edita tu enetrada: <?= $entrada_actual['titulo'] ?></p>

    <h3 id="mensaje-actualizar">Entrada actualizada con exito</h3>
    <form action="guardar_entradas.php?editar=<?= $entrada_actual['id'] ?>" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" placeholder="nombre de la categoria" value="<?= $entrada_actual['titulo'] ?>" />
        <?php echo isset($_SESSION['errores_entradas']) ? mostrar_errores($_SESSION['errores_entradas'], 'titulo') : ''; ?>

        <label for="descripcion">descripcion:</label>
        <textarea name="descripcion" placeholder="nombre de la categoria">
        <?= $entrada_actual['descripcion'] ?>
        </textarea>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrar_errores($_SESSION['errores_entradas'], 'descripcion') : ''; ?>

        <label for="categoria">categoria:</label>
        <select name="categoria">
            <?php $categorias = conseguir_categorias($db);
            if (!empty($categorias)) :
                while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
                    <option value="<?= $categoria['id']; ?>" <?= ($categoria['id'] == $entrada_actual['categorias_id'] ? 'Selected="selected"' : "") ?>>
                        <?= $categoria['nombre']; ?>
                    </option>
            <?php endwhile;
            endif; ?>
        </select>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrar_errores($_SESSION['errores_entradas'], 'categoria') : ''; ?>


        <input type="submit" value="Guardar" />
    </form>
    <?php borrar_errores();  ?>

</div>


<!-- fin del contenedor -->
<?php include_once "includes/pie.php"; ?>