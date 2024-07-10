<?php include_once "includes/redirecion.php"; ?>
<?php include_once "includes/cabecera.php"; ?>
<?php include_once "includes/lateral.php"; ?>

<div id="principal">
    <h1>Mis datos</h1>

    <aside class="bloque">
        <div class="bloque">
            <h3>Registrate aquí</h3>

            <!-- mostrar errores y mensajes de exito -->
            <?php
            if (isset($_SESSION['completado'])) : ?>
                <div class="alerta alerta-exito">
                    <?= $_SESSION['completado'] ?>
                </div>
            <?php elseif (isset($_SESSION['errores']['general'])) : ?>
                <div class="alerta alerta-error">
                    <?= $_SESSION['errores']['general'] ?>
                </div>
            <?php endif;  ?>


            <h3 id="mensaje-actualizado">Tus datos se han actualizados con exito</h3>

            <form id="actualizar_usuario">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>" />
                <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'], 'nombre') : ''; ?>

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" value="<?= $_SESSION['usuario']['apellidos']; ?>" />
                <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'], 'apellidos') : ''; ?>

                <label for="email">Email</label>
                <input type="email" name="email" value="<?= $_SESSION['usuario']['email']; ?>" />
                <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'], 'email') : ''; ?>



                <input type="submit" value="Actualizar" name="submit" />
            </form>
            <?php borrar_errores(); ?>
        </div>
    </aside>
</div>

<!-- fin del contenedor -->
<?php include_once "includes/pie.php"; ?>