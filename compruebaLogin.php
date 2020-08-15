<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title> Documento sin título</title>
</head>

<body>

<?php

try{
    // datos de conexion
    $base=new PDO("mysql:host=localhost; dbname=pruebas" , "root", "admin");

    // $base es un objeto o sea que tiene propiedades y métodos
    // indicamos la propiedada setAttibute de $base (objeto) y seleccionamos ATTR_ERRMODE
    // y ERRMODE_EXCEPTION que son atributos disponibles
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // preparamos la sentencia sql con marcadores (:login y :password)
    $sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS=:login AND PASSWORD=:password";

    // Con el objeto $base y la sentencia $sql, utilizamos el método PREPARE para que nos devuelva
    // otro objeto llamado PDOStatement que se almacena en $resultado
    $resultado=$base->prepare($sql);

    // utilizamos la función htmlentities para convertir cualquier simbolo en html (comilla, guion
    // bajo, etc.). Todo lo contrario de cuando deshacemos &aacute, etc.
    // además, utilizamos la función addslashes para escapar de cualquier caracter de ese tipo (para
    // que no se tenga en cuenta)
    $login=htmlentities(addslashes($_POST["login"]));
    $password=htmlentities(addslashes($_POST["password"]));

    // ahora tenemos que relacionar los marcadores con su correspondiente variable (:login con $login
    // y :password con $password)
    // la variable $resultado utiliza la función bindValue para identificar cada marcador con su
    // correspondiente valor
    // bindValue relaciona las variables utilizando marcadores y bindParam hace lo mismo pero utilizando
    // parametros (?)  - > la diferencia va más allá (ver en stackoverflow)
    $resultado->bindValue(":login", $login);
    $resultado->bindValue(":password", $password);

    // la variable $resultado llama a la función execute para ejecutar nuestra instrucción sql
    $resultado->execute();

    // Tal y como veniamos haciendo hasta ahora, en este ejemplo no vamos a utilizar foreach para
    // mostrar el resultado de la consulta por pantalla, etc. sino que vamos (O NO) a permitir el
    // acceso a nuestra página WEB, para ellos, utilizaremos la función rowCount que devolverá 0
    // o X dependiendo de si existe (o no) el usuario en la BBDD
    $numero_registro=$resultado->rowCount();

    if($numero_registro!=0){                    // SI SE HA ENCONTRADO

        // Para redirigir a una página utilizamos la función header de PHP con el atributo location
        // Parece que sólo con redirigir al usuario a la página deseada, ya estaríamos funcionando
        // pero sólo con esto, si copiamos y pegamos el contenido de la URL en otra pestaña, nos
        // dejaría entrar.. y eso es un trabajo mal hecho
        // Es necesario programar esto con session_start() y $_SESSION para que solamente permita
        // entrar a la página que interesa, desde login.php
        // session_start --> inicia una nueva sesion o bien reanuda la existente
        // $_SESSION  --> almacena el nombre del usuario (rescatado con $_POST)

        // inicia sesión o reanuda la sesión existente
        // si el usuario se encuentra en la BBDD, si existe, entonces CREAR SESIÓN
        session_start();

        // almacenar en la varible superglobal $_SESSION el login del usuario recuperado con $_POST
        // almacenar dentro de una variable superglobal, implica que lo almacenado (en "usuario")
        // se podrá utilizar en cualquier otra página de nuestro sitio.
        $_SESSION["usuario"]=$_POST["login"];

        // AHORA SI, redirigir a la página de acceso --> OK
        header("location:usuariosRegistrados1.php");

    }else{                                      // SI NO SE HA ENCONTRADO
        // redirigir a la propia página de login
        header("location:login.php");
    }

}catch(Exception $e){

    die("Error: " . $e->getMessage());
}



?>

</body>
</html>


