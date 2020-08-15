<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title> Documento sin título</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php

    // Al igual que hemos tenido que tomar algunas medidas en compruebaLogin.php, respecto
    // a session_start() y $_SESSION, estas páginas de navegación, también tienen que incluir
    // una especie de filtro para que solamente permita continuar a los usuarios que se han
    // logueado correctamente

    // reanudamos/rescatamos la sesion que se creó cuando entró correctamente (si fue iniciada
    // anteriomente) y si no, creará una nueva sesión
    session_start();


    // isset - función predefinida que comprueba si la variable está definida y no es NULL
    // dicho de otra forma, si hay algo almacenado ahí (devolverá true o false)
    // con ! invertimos lo que devuelva esta expresión
    if(!isset($_SESSION["usuario"])){
        header("Location:login.php");
    }
?>

<h1>Bienvenidos usuarios</h1>

<?php
    echo "<h4>Hola: "  . $_SESSION["usuario"] . "</h4><br>";

?>

<p><a href="cierre.php"><h5>Cerrar sesión</h5></a></p>
<h4> Esto es información sólo para usuarios registrados</h4>

<table>

<tr><td><h4>Está en la página principal 1</h4></td></tr>

<tr><td><a href="usuariosRegistrados2.php"><h5>Página 2</h5></a></td></tr>
<tr><td><a href="usuariosRegistrados3.php"><h5>Página 3</h5></a></td></tr>
<tr><td><a href="usuariosRegistrados4.php"><h5>Página 4</h5></a></td></tr>
</table>

</body>
</html>


