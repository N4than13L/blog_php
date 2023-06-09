<?php

if (!isset($_SESSION)) {
    session_start();
}

// si no existe.
if (!isset($_SESSION['usuario'])) {
    // redirecionar al index.php
    header('Location: index.php');
}
