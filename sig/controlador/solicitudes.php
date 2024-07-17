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
            $o = new solicitudes();
            if(isset($_POST)){
                    
                    $o->set_id($_POST['id']);
                    $o->set_empleado($_POST['cedEmpleado']);
                    $o->set_equipo($_POST['idEquipo']);
                    $o->set_servicio($_POST['idServicio']);
                    $o->set_fechaSolicitud($_POST['fechaSolicitud']);
                    $o->set_status($_POST['statusSolicitud']);
                    
                    /*if(isset($_POST['editar_pass'])){
                        $error = $o->editar_pass();
                    }*/
                    if(isset($_POST['agregar'])){
                        $error = $o->agregar();
                    }
                    /*elseif(isset($_POST['editar'])){
                        $error = $o->editar();
                    }/*
                    elseif(isset($_POST['eliminar'])){
                        $error = $o->eliminar();
                    }*/

                    $m = $o->mostrar();
                    /*$rol = $o->rol();*/
                    $dpt = $o->dpt();
                    /*$loc = $o->loc();*/
                    $servicio = $o->servicio();

                    $equipo = $o->equipo();

            }
        require_once("vista/".$p.".php");
    }
    else {
        require_once("vista/404.php");
    }
?>