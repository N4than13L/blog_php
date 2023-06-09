<?php

// conexion a la base de datos.
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$base_de_datos = 'blog';

$db = mysqli_connect($servidor, $usuario, $password, $base_de_datos);

mysqli_query($db, "SET NAMES 'utf8'");

// iniciar la seccion 
if (!isset($_SESSION)) {
    session_start();
}
