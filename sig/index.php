<?php
    $p = 'login';
    if (!empty($_GET['p'])) {
        $p = $_GET['p'];
    }
	if(is_file("Controlador/".$p.".php")){
		require_once("Controlador/".$p.".php");
	}
	else{
		require_once("vista/404.php");
	}
?>