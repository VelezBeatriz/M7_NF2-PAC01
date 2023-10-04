<?php
//Inicio sesión
session_start();

//Defino unas constantes con datos que considero importantes
define( 'SITE_TIMEZONE', 'Europe/Madrid' );
define( 'SITE_LANG', ['es', 'spa', 'es_ES'] );
define( 'SITE_URL', 'http://localhost:8080/UF1-NF2-PAC01/VelezBeatriz.php');
define( 'SITE_URL2', 'http://localhost:8080/UF1-NF2-PAC01/VelezBeatriz_2.php');


//Defino el lenguaje de la página y su zona
setlocale( LC_TIME, SITE_LANG);
date_default_timezone_set(SITE_TIMEZONE);

        //var_dump($_COOKIE);
        //var_dump($_SESSION);
        //var_dump($_GET);
        if(isset($_COOKIE['nombrecookie']) && isset($_COOKIE['passwordcookie'])):
        if(isset($_GET['Seres_malignos'])):
            ?> Veo que te gustan los gatitos,<?php echo $_SESSION['nombre'];
            ?><br/><a href="<?php echo SITE_URL; ?>">Volver a la página anterior</a><?php
        elseif(isset($_GET['Seres_no_malignos'])):
            ?> Veo que te gustan los perritos,<?php echo $_SESSION['nombre'];
            ?><br/><a href="<?php echo SITE_URL; ?>">Volver a la página anterior</a><?php
        endif;
    else:
        ?> <a href="<?php echo SITE_URL; ?>">Volver a la página anterior</a><?php
    endif;
