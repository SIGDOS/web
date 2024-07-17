<?php 
    require_once("modelo/login.php");
    require_once("modelo/datos.php");
    session_start();
    if(!isset($_SESSION['nomUsuario'])) {
        session_unset();   
        session_destroy(); 
        header("Location: ./");
    }
    else {
        if ($_SESSION['idRol'] == 0) {
            session_unset(); 
            session_destroy();
            header("Location: ./");
        }          
    }
    if (is_file("vista/".$p.".php")) {
        require_once("vista/".$p.".php");
    }
    else {
        require_once("vista/404.php");
    }
?>