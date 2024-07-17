<?php
	require_once('modelo/datos.php');
	class login extends datos{
		
		private $id;
		private $nomUsuario;
		private $claveUsuario;
		private $idEmpleado;
		private $idRol;

		function set_id($id){ $this->id = trim($id); }
		function set_nomUsuario($nomUsuario){ $this->nomUsuario = trim($nomUsuario); }
		function set_claveUsuario($claveUsuario){ $this->claveUsuario = trim($claveUsuario); }
		function set_idEmpleado($idEmpleado){ $this->idEmpleado = trim($idEmpleado); }
		function set_idRol($idRol){ $this->idRol = trim($idRol); }

		function get_id(){ return $this->id; }
		function get_nomUsuario(){ return $this->nomUsuario; }
		function get_claveUsuario(){ return $this->claveUsuario; }
		function get_idEmpleado(){ return $this->idEmpleado; }
		function get_idRol(){ return $this->idRol; }

		function iniciar(){
			if (isset($_POST['g-recaptcha-response'])) {
				$captcha_response = $_POST['g-recaptcha-response'];
				$secret_key = "6LdgkfcpAAAAAMCHp3gcCtCHwtsVkOQ5yP8h6JC2";
				$verify_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret_key}&response={$captcha_response}&remoteip={$_SERVER['REMOTE_ADDR']}");
				$response_data = json_decode($verify_response, true);
				if ($response_data['success']) {
					$b = $this->Busca("SELECT *	FROM usuariossigdos
											WHERE nomUsuario = '$this->nomUsuario'");
					$r = false;
					if(isset($b)){
						foreach ($b as $f ) {
								session_start();
								$_SESSION['nomUsuario'] = $f['nomUsuario'];
								$_SESSION['idRol'] = $f['idRol'];
								if($_SESSION['idRol'] != 0) {
									header("location:?p=inicio");
								}
							
						}
					} 
					else {
						$r = "NOMBRE DE USUARIO INVALIDO";
					}
				}
				else{
					$r = "VERIFIQUE QUE HA COMPLETADO EL CAPTCHA CORRECTAMENTE";
				}
			} 
			return $r;
		}
    }
?>

