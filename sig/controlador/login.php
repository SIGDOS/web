<?php
    if (is_file('vista/'.$p.'.php')) { 
        require_once("modelo/".$p.".php");
        $o= new login();
        if(isset($_POST['iniciar'])){

            $o->set_id($_POST['id']);
            $o->set_nomUsuario($_POST['nomUsuario']);
            $o->set_claveUsuario($_POST['set_claveUsuario']);
            $o->set_idEmpleado($_POST['idEmpleado']);
            $o->set_idRol($_POST['idRol']);
            
            $error=$o->iniciar();
        }
        require_once('vista/'.$p.'.php');
    }
    else{
        require_once('vista/404.php');
    }
?>