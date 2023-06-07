<?php require_once "includes/helpers.php"; ?>
<!-- sidebar -->
<aside id="sidebar" class="bloque">
    <div id="login">
        <h3>identificate aquí</h3>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" />

            <label for="password">Contraseña</label>
            <input type="password" name="password" />

            <input type="submit" value="Entrar" />
        </form>
    </div>
</aside>
</div>

<!-- registro -->
<div id="contenedor">
    <!-- sidebar -->
    <aside id="sidebar" class="bloque">
        <div id="registro">
            <h3>registrate aquí</h3>
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
            <form action="registro.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" />
                <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'], 'nombre') : ''; ?>

                <label for="apellidos">apellido</label>
                <input type="text" name="apellidos" />
                <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'], 'apellido') : ''; ?>

                <label for="email">Email</label>
                <input type="email" name="email" />
                <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'], 'email') : ''; ?>

                <label for="password">Contraseña</label>
                <input type="password" name="password" />
                <?php echo isset($_SESSION['errores']) ? mostrar_errores($_SESSION['errores'], 'password') : ''; ?>

                <input type="submit" value="Registrar" name="submit" />
            </form>
            <?php borrar_errores(); ?>
        </div>
    </aside>