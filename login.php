<?php

// iniciar la sesion y la conexion a la db.
require_once "includes/conexion.php";

// reoger los datos del formulario.
if (isset($_POST)) {

    //borrar error antiguo
    if (isset($_SESSION['error_login'])) {
        unset($_SESSION['error_login']);
    }

    // recoger datos de sesion
    $email =  trim($_POST['email']);
    $password = $_POST['password'];

    // consulta para verificar el usuario y contrasena db.
    $sql = "SELECT * FROM usuarios WHERE email='$email';";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);

        // comprobar la contrasena / cifrar.
        $verify = password_verify($password, $usuario['password']);
        var_dump($verify);

        if ($verify) {
            // utilizar datos del usuario para la sesion.
            $_SESSION['usuario'] = $usuario;
        } else {
            // y si falla mostrar el fallo de la sesion.
            $_SESSION['error_login'] = "<h1>login incorrecto</h1>";
        }
    } else {
        // y si falla mostrar el fallo de la sesion.
        $_SESSION['error_login'] = "login incorrecto";
    }
}

// redirecionar al index.php
header('Location: index.php');
