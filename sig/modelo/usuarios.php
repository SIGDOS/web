<?php
    require_once('modelo/datos.php');
    class empleados extends datos{
        //atributos de la clase, todos privados
        private $id;
        private $nomUsuario;
        private $claveUsuario;
        private $idEmpleado;
        private $idRol;
        private $idStatus;
        
        //metodos para colocar valores en los atributos
        function set_id($id){ $this->id = trim($id); }
        function set_nomUsuario($nomUsuario){ $this->nomUsuario = trim($nomUsuario); }
        function set_claveUsuario($claveUsuario){ $this->claveUsuario = trim($claveUsuario); }
        function set_idEmpleado($idEmpleado){ $this->idEmpleado = trim($idEmpleado); }
        function set_idRol($idRol){ $this->idRol = trim($idRol); }
        function set_idStatus($idStatus){ $this->idStatus = trim($idStatus); }

        function get_id(){ return $this->id; }
        function get_nomUsuario(){ return $this->nomUsuario; }
        function get_claveUsuario(){ return $this->claveUsuario; }
        function get_idEmpleado(){ return $this->idEmpleado; }
        function get_idRol(){ return $this->idRol; }
        function get_idStatus(){ return $this->idStatus; }

        function editar_pass(){
            $b = $this->Busca("SELECT * FROM usuariossigdos WHERE nomUsuario='$this->nomUsuario'");
            if(!$b){
                $r = " EL USUARIO NO SE HA ENCONTRADO ";
            }
            else{
                $e = $this->Ejecuta("UPDATE user SET claveUsuario=UPPER('$this->claveUsuario')
                                                    WHERE nomUsuario='$this->nomUsuario'","");
                $r = "actualizacion Exitosa ";
            } 
            return $r;
        }

        public function buscarEmpleado($cedula) {
            $consulta = "SELECT * FROM empleados WHERE cedula = '$cedula'";
            $resultado = $this->Busca($consulta);
            if ($resultado) {
                return $resultado[0];
            } else {
                return false;
            }
        }
        public function llenar_campos() {
            $cedula = $_POST['cedula'];
            $empleado = $this->modelo->buscarEmpleado($cedula);
            if ($empleado) {
                $datos = array(
                    'nombre' => $empleado['nombre'],
                    'idEmpleado' => $empleado['id'],
                    'nomUsuario' => $empleado['nomUsuario']
                );
                echo json_encode($datos);
            } else {
                echo json_encode(array());
            }
        }

        function agregar(){
            $b = $this->Busca("SELECT * FROM usuariossigdos WHERE nomUsuario = '$this->nomUsuario'");
            if($b){
                $r = "EL EMPLEADO YA EXISTE";
            }
            else{
                $e = $this->Ejecuta("INSERT INTO usuariossigdos (nomUsuario, 
                                                        claveUsuario, 
                                                        idEmpleado, 
                                                        idRol, 
                                                        idStatus)
                                            VALUES (UPPER('$this->nomUsuario'),
                                                    UPPER('$this->claveUsuario'),
                                                    UPPER('$this->idEmpleado'),
                                                    UPPER('$this->idRol'),
                                                    UPPER('$this->idStatus'))","usuariosigdos_id_seq");
                $r = "REGISTRO EXITOSO";
            }
            return $r;
        }

        function editar(){
            $b = $this->Busca("SELECT * FROM usuariossigdos WHERE nomUsuario = '$this->nomUsuario'");
            if(!$b){
                $r = "EL EMPLEADO NO EXISTE";
            }
            else{
                $e = $this->Ejecuta("UPDATE usuariossigdos SET nomUsuario = UPPER('$this->nomUsuario'), 
                                                        claveUsuario = UPPER('$this->claveUsuario'), 
                                                        idEmpleado = UPPER('$this->idEmpleado'), 
                                                        idRol = UPPER('$this->idRol'), 
                                                        WHERE id = '$this->id'","");
                $r = "ACTUALIZACION EXITOSA";
            }
            return $r;
        }

        function eliminar(){
            $b = $this->Busca("SELECT * FROM usuariossigdos WHERE nomUsuario = '$this->nomUsuario'");
            if(!$b){
                $r = "EL EMPLEADO NO EXISTE";
            }
            else{
                $e = $this->Ejecuta("DELETE FROM usuariossigdos WHERE nomUsuario = '$this->nomUsuario'", " ");
                $r = "ACTUALIZACION EXITOSA";
            }
            return $r;
        }
        

        function mostrar(){
            $m = $this->Busca("SELECT u.id, u.nomUsuario, e.nombre, e.apellido, r.rol
                                FROM usuariossigdos AS u
                                INNER JOIN empleados AS e ON u.idEmpleado = e.id
                                INNER JOIN roles AS r ON u.idRol = r.id");
            return $m;
        }

        function rol(){
            $rol = $this->Busca("SELECT id, rol FROM roles ORDER BY rol ASC");
            return $rol;
        }

        function sta(){
            $sta = $this->Busca("SELECT id, status FROM statususuario ORDER BY status ASC");
            return $sta;
        }

        function id(){
            $id = $this->Busca("SELECT id, nombre, apellido FROM empleados ORDER BY nombre, apellido ASC");
            return $id;
        }
    }
?>