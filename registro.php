<?php
if (isset($_POST)) {

    //Conexión a la base de datos;
    require_once 'includes/conexion.php';
    //Iniciar sesion
    if ($_SESSION) {
        session_start();
    }

    // Recoger los valores del formulario de registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    // Array errores
    $errores = array();


    // Validar los datos antes de guardarlo en la base de datos
    // Validar nombre
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
        $errores['apellido'] = 'Los apellido no es valido';
    }

    // Validar email      
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = 'El email no es valido';
    }

    // Validar la contraseña
    if (!empty($password)) {
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password'] = 'La password no es valido';
    }


    $guardar_usuario = false;
    if (count($errores) == 0) {
        $guardar_usuario = true;

        // Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        // INSERTAR USUARIO EN LA BD
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre','$apellidos', '$email', '$password_segura', CURDATE())";
        $guardar = mysqli_query($db, $sql);

        var_dump(mysqli_error($db));

        if ($guardar) {
            $_SESSION['completado'] = "EL registro se ha completado con exito";
        } else {
            $_SESSION['completado']['general'] = "Fallo al guardar el usuario";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: index.php');
