   <!-- contenedor -->
   <div id="contenedor">
       <!-- sidebar -->
       <aside class="bloque">
           <!-- cuando el login sea correcto. -->
           <div class="bloque">
               <?php if (isset($_SESSION['usuario'])) : ?>
                   <div id="usuario_logeado" class="bloque">
                       <h3>Bienvenid@, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></h3>
                       <!-- botones. -->
                       <a class="boton-verde" href="cerrar.php">crear entradas</a>
                       <a class="boton-azul" href="cerrar.php">crear categorias</a>
                       <a class="boton-naranja" href="cerrar.php">mis datos</a>
                       <a class="boton-rojo" href="cerrar.php">cerrar cesion</a>

                   </div>
               <?php endif; ?>
               <?php borrar_errores(); ?>

           </div>
           <?php if (!isset($_SESSION['usuario'])) :
            ?>
               <h3>Identificate aquí</h3>

               <!-- cuando de error en el login -->
               <div class="bloque">
                   <?php if (isset($_SESSION['error_login'])) : ?>
                       <div class="alerta_error">
                           <p><?= $_SESSION['error_login']; ?></p>
                       </div>
                   <?php endif; ?>

                   <form action="login.php" method="POST">
                       <label for="email">Email</label>
                       <input type="email" name="email" />

                       <label for="password">Contraseña</label>
                       <input type="password" name="password" />

                       <input type="submit" value="Entrar" />
                   </form>
                   <?php borrar_errores(); ?>
               </div>
       </aside>
       <hr />
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
   </div>

   <!-- registro -->
   <div id="contenedor">

   <?php endif; ?>

   <div class="clearfix"></div>
   </div>