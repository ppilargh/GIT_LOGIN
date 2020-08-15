<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title> Documento sin título</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php

    // reanudamos la sesion que se creo cuando entró correctamente (si fue iniciada anteriomente)
    // si no, creará una nueva sesión
    session_start();

    // con ! invertimos lo que devuelva esta expresión
    // isset devolverá true o false determinando si la variable está definida y no es NULL
    if(!isset($_SESSION["usuario"])){
        header("Location:login.php");
    }
?>

<h1>Bienvenidos usuarios</h1>

<?php
    echo "Usuario: " . $_SESSION["usuario"] . "<br>";

?>

<p><a href="cierre.php"><h5>Cerrar sesión</h5></a></p>

<h4> Esto es información sólo para usuarios registrados</h4>

<h4>Está en la página 2</h4>

<p><a href="usuariosRegistrados1.php"><h5>VOLVER A PÁGINA 1</h5></a></p>

</body>
</html>


