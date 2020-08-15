<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title> Documento sin título</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php

// Programar la opción de CERRAR para NO TENER sólo la opción de salir del sitio
// cerrando el navegador ya que (de nuevo) copiando/pegando o tecleando la URL,
// podríamos volver a entrar sin loguearnos

// Si vamos a cerrar, ¿por qué primero hay que reanudar la sesión que está abierta?
// El session_start es imprescindible para indicarle al navegador que reanude la
// sesion que hemos abierto (página 1 - 2 - 3 - 4) para que sepa cual es la sesión
// que tiene que reanudar antes de destruirla
session_start();

// cerrar la sesion
session_destroy();

// redirigir a login.php
header("location:login.php");

?>

</body>

</html>