<?php
include_once "conexion.php"; ?>

<?php include_once "includes/helpers.php"; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog php</title>
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>

    <!-- cabezera -->
    <header id="cabecera">
        <!-- logo -->
        <div id="logo">
            <a href="index.php">
                Blog de videojuego
            </a>
        </div>

        <!-- menu -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">inicio</a>
                </li>

                <?php
                $categorias = conseguir_categorias($db);
                if (!empty($categorias)) :
                    while ($categoria = mysqli_fetch_assoc($categorias)) : ?>
                        <li>
                            <a href="categoria.php?id=<?= $categoria['id']; ?>"><?= $categoria['nombre']; ?></a>
                        </li>
                <?php
                    endwhile;
                endif; ?>
            </ul>
        </nav>
        <div class="clearfix"></div>
        <button id="ayuda"> ? ayuda</button>
        <article id="texto-muestra">
            En este blog te podras registrar y agregar las diferentes entradas y categorias <button class="boton-rojo" id="cerrar-msj">X</button>
        </article>
        <div id="texto_ayuda"></div>
    </header>