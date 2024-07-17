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
            $o = new localidades();
            if(isset($_POST)){
                    
                    $o->set_id($_POST['id']);
                    $o->set_nomLocalidad($_POST['nomLocalidad']);
                    $o->set_dirLocalidad($_POST['dirLocalidad']);
                    $o->set_telefLocalidad($_POST['telefLocalidad']);
                    $o->set_parroquia($_POST['parroquia']);
                    $o->set_municipio($_POST['municipio']);
                    $o->set_estado($_POST['estado']);
                    $o->set_idTipoLocalidad($_POST['idTipoLocalidad']);
                    
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
                    $tpL = $o->tpL();
            }
        require_once("vista/".$p.".php");
    }
    else {
        require_once("vista/404.php");
    }
?>