<?php

if (isset($_POST)) {

    //Conexión a la base de datos;
    require_once 'includes/conexion.php';

    // Recoger los valores del formulario de registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;


    // Array errores
    $errores = array();

    // Validar los datos antes de guardarlo en la base de datos.
    // Validar nombre.
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = 'El nombre no es valido';
    }

    // Validar apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/', $apellidos)) {
        $apellidos_validado = true;
    } else {
        $apellidos_validado = false;
        $errores['apellidos'] = 'Los apellido no es valido';
    }

    // Validar email      
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = 'El email no es valido';
    }

    $guardar_usuario = false;

    if (count($errores) == 0) {
        $usuario = $_SESSION['usuario'];
        $guardar_usuario = true;

        // comprobar si el email ya exite.
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";

        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {
            // ACUTALIZAR USUARIO EN LA BD
            $usuario = $_SESSION['usuario'];

            $sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email' WHERE id = " . $usuario['id'];

            $guardar = mysqli_query($db, $sql);

            if ($guardar) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;

                $_SESSION['completado'] = "datos actualizado con exito";
            } else {
                $_SESSION['completado']['general'] = "Fallo al actualizar";
            }
        } else {
            $_SESSION['errores']['general'] = "el usuario ya existe";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: mis_datos.php');
