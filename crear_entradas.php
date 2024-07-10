<?php include_once "includes/redirecion.php"; ?>
<?php include_once "includes/cabecera.php"; ?>
<?php include_once "includes/lateral.php"; ?>

<!-- contenido principal -->
<div id="principal">
    <h1>Crear entradas</h1>
    <h2>Agrega las entradas para los demas puedan disfrutar de las publicaciones</h2>
    <form id="guardar_entradas">
        <h3 id="mensaje-entrada">Entrada guardada con exito</h3>
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" placeholder="nombre de la categoria" />
        <?php echo isset($_SESSION['errores_entradas']) ? mostrar_errores($_SESSION['errores_entradas'], 'titulo') : ''; ?>

        <label for="descripcion">descripcion:</label>
        <textarea name="descripcion" placeholder="nombre de la categoria"></textarea>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrar_errores($_SESSION['errores_entradas'], 'descripcion') : ''; ?>


        <label for="categoria">categoria:</label>
        <select name="categoria">
            <?php $categorias = conseguir_categorias($db);
            if (!empty($categorias)) :
                while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
                    <option value="<?= $categoria['id']; ?>">
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