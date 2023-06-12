<?php

require_once "conexion.php";
// require_once "helpers.php";


function mostrar_errores($errores, $campo)
{
    $alerta = '';
    if ($errores[$campo] && !empty($campo)) {
        $alerta = "<div class='alerta_error'>" . $errores[$campo] . "</div>";
    }

    return $alerta;
}

function borrar_errores()
{

    $borrado = false;

    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = true;
    }

    // entradas ultimas.
    if (isset($_SESSION['errores_entradas'])) {
        $_SESSION['errores_entradas'] = null;
        // unset($_SESSION['errores_entradas']);
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;

        $borrado = true;
    }

    return $borrado;
}

function conseguir_categorias($conecion)
{
    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $categorias = mysqli_query($conecion, $sql);

    $resultado = array();

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $resultado = $categorias;
    }

    return $resultado;
}

function conseguir_categoria($conecion, $id)
{
    $sql = "SELECT * FROM categorias WHERE id = '$id' ";
    $categorias = mysqli_query($conecion, $sql);

    $resultado = array();

    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $resultado = mysqli_fetch_assoc($categorias);
    }

    return $resultado;
}

function conseguir_entrada($conexion, $id)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id 
   INNER JOIN usuarios u ON e.usuario_id = u.id WHERE e.id =" . $id;

    $entrada = mysqli_query($conexion, $sql);
    $resultado = array();

    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        $resultado = mysqli_fetch_assoc($entrada);
    }

    return $resultado;
}

function conseguir_entradas($conexion, $limit = null, $categoria = null)
{
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN  categorias c ON e.categoria_id= c.id ";

    if (!empty($categoria)) {
        $sql .= "WHERE e.categoria_id = $categoria ";
    }

    $sql .= "ORDER BY e.id DESC";
    if ($limit != null) {
        $sql .= "LIMIT 4";
    }


    $entradas = mysqli_query($conexion, $sql);

    $resultado = array();

    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $resultado = $entradas;
    }
    return $entradas;
}
