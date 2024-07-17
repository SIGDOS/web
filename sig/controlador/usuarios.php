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
        require_once('modelo/'.$p.'.php');
            $o = new empleados();
            if(isset($_POST)){
                    
                    $o->set_nomUsuario($_POST['nomUsuario']);
                    $o->set_claveUsuario($_POST['claveUsuario']);
                    $o->set_idEmpleado($_POST['idEmpleado']);
                    $o->set_idRol($_POST['idRol']);
                    $o->set_idStatus($_POST['idStatus']);
                    
                    if(isset($_POST['editar_pass'])){
                        $error = $o->editar_pass();
                    }
                    elseif(isset($_POST['agregar'])){
                        $error = $o->agregar();
                    }
                    elseif(isset($_POST['editar'])){
                        $error = $o->editar();
                    }
                    elseif(isset($_POST['eliminar'])){
                        $error = $o->eliminar();
                    }

                    $m = $o->mostrar();
                    $rol = $o->rol();
                    $sta = $o->sta();
                    $id = $o->id();
            }
        require_once("vista/".$p.".php");
    }
    else {
        require_once("vista/404.php");
    }
?>