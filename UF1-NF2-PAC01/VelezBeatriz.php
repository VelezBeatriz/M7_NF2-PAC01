<?php
//Inicio sesión
session_start();

//Defino unas constantes con datos que considero importantes
define( 'SITE_TIMEZONE', 'Europe/Madrid' );
define( 'SITE_LANG', ['es', 'spa', 'es_ES'] );
define( 'ADMIN_USER', 'admin' );
define( 'ADMIN_PASSWORD', 'admin' );
define( 'SITE_URL', 'http://localhost:8080/UF1-NF2-PAC01/VelezBeatriz.php');
define( 'SITE_URL2', 'http://localhost:8080/UF1-NF2-PAC01/VelezBeatriz_2.php');


//Defino el lenguaje de la página y su zona
setlocale( LC_TIME, SITE_LANG);
date_default_timezone_set(SITE_TIMEZONE);

$_SESSION['nombre']='';
$_SESSION['password']='';
$_SESSION['fecha']='';
$_SESSION['hora']='';


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Directivas Variables y Operadores</title>
    </head>
    <body>
    <h1>NF2-PAC01</h1>
    <h2>Beatriz Vélez</h2>
    <p>Crea una página principal y una secundaria que contenga estos elementos:</p>
    <ol>
        <li>2 variables GET</li>
        <li>4 variables SESSION</li>
        <li>2 variables POST</li>
        <li>2 COOKIES</li>
        <li>2 links</li>
        <li>Utiliza URLENCODE()</li>
        <li>Utiliza NULL de control</li>
        <li>Utiliza la función DATE()</li>
    </ol>
    <?php
    if(isset($_POST['enviar'])):
    
        $nombre=$_POST['nombre'];
        $password=$_POST['password'];
        $fecha=date("Ymd");
        $hora=date("h:i:s");

        $_SESSION['nombre']=$nombre;
        $_SESSION['password']=$password;
        $_SESSION['fecha']=$fecha;
        $_SESSION['hora']=$hora;
        //var_dump($_SESSION);

        setcookie( 'nombrecookie', $_SESSION['nombre'], time() + 3600);
        setcookie( 'passwordcookie', $_SESSION['password'], time() + 3600);
        //var_dump($_COOKIE);

        ?>
        <h3>Bienvenido/a <?php echo $_SESSION['nombre']; ?> a la primera página de prueba!</h3>
        <h4>Son las <?php echo $_SESSION['hora']; ?></h4>
        <p>¿Qué te gustan más los gatitos o los perritos?</p>
        <?php
        $gatitos = urlencode("Seres malignos");
        $perritos = urlencode("Seres no malignos");
        ?>
        <p><a href="<?php echo SITE_URL2.'?'. $gatitos . '=true' ?>">Gatitos</a></p>
        <p><a href="<?php echo SITE_URL2.'?'. $perritos . '=true' ?>">Perritos</a></p>

        <?php

    else:
        ?>
        <h4>Iniciar sesión</h4>
        <form method="post" action="<?php echo SITE_URL;?>">
            <p>Nombre: 
            <input type="text" name="nombre" required/>
        </p>
        <p>Contraseña: 
            <input type="password" name="password" required/>
        </p>
        <p>
            <input type="submit" name="enviar" value="Enviar"/>
        </p>
        </form>
        <?php
    endif;
    ?>


    

</body>
</html>
