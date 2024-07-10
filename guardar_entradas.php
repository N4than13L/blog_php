<?php
if (isset($_POST)) {
    //Conexión a la base de datos;
    require_once 'includes/conexion.php';

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];

    // Array errores
    $errores = array();

    // Validar los datos antes de guardarlo en la base de datos.
    // Validar nombre.
    if (empty($titulo)) {
        $errores['titulo'] = 'El titulo no es valido';
    }

    // Validar description
    if (empty($descripcion)) {
        $errores['descripcion'] = 'La descripcion no es valido';
    }

    // Validar categoria
    if (empty($categoria) && !is_numeric($categoria)) {
        $errores['categoria'] = 'La categoria no es valido';
    }

    // var_dump($errores);
    // die();

    if (count($errores) == 0) {
        if (isset($_GET['editar'])) {
            //    editar.
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];

            $sql = "UPDATE entradas SET titulo='$titulo',  descripcion='$descripcion', categorias_id=$categoria WHERE id = $entrada_id AND usuarios_id = $usuario_id";

            $guardar = mysqli_query($db, $sql);
        } else {
            // insertar
            $sql = "INSERT INTO entradas VALUES(null, '$usuario', '$categoria', '$titulo', '$descripcion', CURDATE());";
        }

        $guardar = mysqli_query($db, $sql);
        header('Location: index.php');
    } else {
        $_SESSION['errores_entradas'] = $errores;
        if (isset($_GET['editar'])) {
            header('Location: editar_entrada.php?id=' . $_GET['editar']);
        } else {
            header('Location: crear_entradas.php');
        }
    }
}
