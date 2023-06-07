<?php
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

    if (isset($_SESSION['completado'])) {

        $_SESSION['completado'] = null;

        $borrado = true;
    }

    return $borrado;
}
