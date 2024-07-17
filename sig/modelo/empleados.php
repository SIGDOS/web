<?php
    require_once('modelo/datos.php');
    class empleados extends datos{
        //atributos de la clase, todos privados
        private $id;
        private $cedula;
        private $nombre;
        private $apellido;
        private $correo;
        private $cargo;
        private $idDepartamento;
        private $nomUsuario;
        private $claveUsuario;
        private $idEmpleado;
        private $idRol;
        private $status;
        
        //metodos para colocar valores en los atributos
        function set_id($id){ $this->id = trim($id); }
        function set_cedula($cedula){ $this->cedula = trim($cedula); }
        function set_nombre($nombre){ $this->nombre = trim($nombre); }
        function set_apellido($apellido){ $this->apellido =  trim($apellido); }
        function set_correo($correo){ $this->correo = trim($correo); }
        function set_cargo($cargo){ $this->cargo = trim($cargo); }
        function set_idDepartamento($idDepartamento){ $this->idDepartamento = trim($idDepartamento); }
        function set_nomUsuario($nomUsuario){ $this->nomUsuario = trim($nomUsuario); }
        function set_claveUsuario($claveUsuario){ $this->claveUsuario = trim($claveUsuario); }
        function set_idEmpleado($idEmpleado){ $this->idEmpleado = trim($idEmpleado); }
        function set_idRol($idRol){ $this->idRol = trim($idRol); }
        function set_status($status){ $this->status = trim($status); }

        function get_id(){ return $this->id; }
        function get_cedula(){ return $this->cedula; }
        function get_nombre(){ return $this->nombre; }
        function get_apellido(){  return $this->apellido; }
        function get_correo(){ return $this->correo; }
        function get_cargo(){ return $this->cargo; }
        function get_idDepartamento(){ return $this->idDepartamento; }
        function get_nomUsuario(){ return $this->nomUsuario; }
        function get_claveUsuario(){ return $this->claveUsuario; }
        function get_idEmpleado(){ return $this->idEmpleado; }
        function get_idRol(){ return $this->idRol; }
        function get_status(){ return $this->status; }

        function editar_pass(){
            $b = $this->Busca("SELECT * FROM usuariossigdos WHERE nomUsuario='$this->nomUsuario'");
            if(!$b){
                $r = " EL USUARIO NO SE HA ENCONTRADO ";
            }
            else{
                $e = $this->Ejecuta("UPDATE usuariossigdos SET claveUsuario=UPPER('$this->claveUsuario')
                                                    WHERE nomUsuario='$this->nomUsuario'","");
                $r = "actualizacion Exitosa ";
            } 
            return $r;
        }

        function agregar(){
            $b = $this->Busca("SELECT * FROM empleados WHERE cedula = '$this->cedula'");
            if($b){
                $r = "EL EMPLEADO YA EXISTE";
            }
            else{
                $e = $this->Ejecuta("INSERT INTO empleados (cedula, 
                                                        nombre, 
                                                        apellido, 
                                                        correo, 
                                                        cargo, 
                                                        idDepartamento)
                                            VALUES ('$this->cedula',
                                                    UPPER('$this->nombre'),
                                                    UPPER('$this->apellido'),
                                                    UPPER('$this->correo'),
                                                    UPPER('$this->cargo'),
                                                    '$this->idDepartamento')","empleados_id_seq");
                $r = "REGISTRO EXITOSO";
            }
            return $r;
        }

        function editar(){
            $b = $this->Busca("SELECT * FROM empleados WHERE id = '$this->id'");
            if(!$b){
                $r = "EL EMPLEADO NO EXISTE";
            }
            else{
                $e = $this->Ejecuta("UPDATE empleados SET cedula = '$this->cedula', 
                                                        nombre = UPPER('$this->nombre'), 
                                                        apellido = UPPER('$this->apellido'), 
                                                        correo = UPPER('$this->correo'), 
                                                        cargo = UPPER('$this->cargo'), 
                                                        idDepartamento = '$this->idDepartamento'
                                                        WHERE id = '$this->id'","");
                $r = "ACTUALIZACION EXITOSA";
            }
            return $r;
        }

        function eliminar(){
            $b = $this->Busca("SELECT * FROM empleados WHERE cedula = '$this->cedula'");
            if(!$b){
                $r = "EL EMPLEADO NO EXISTE";
            }
            else{
                $e = $this->Ejecuta("DELETE FROM empleados WHERE cedula = '$this->cedula'", " ");
                $r = "ACTUALIZACION EXITOSA";
            }
            return $r;
        }

        function agregar_user(){
            $b = $this->Busca("SELECT * FROM usuariossigdos WHERE idEmpleado = '$this->idEmpleado' AND nomUsuario = '$this->nomUsuario'");
            if(!$b){
                $e = $this->Ejecuta("INSERT INTO usuariossigdos (nomUsuario, claveUsuario, idEmpleado, idRol, status) 
                                        VALUES ('$this->nomUsuario', 
                                                UPPER('IVSS.2024'), 
                                                '$this->idEmpleado', 
                                                '1', 
                                                UPPER('true'))","usuariossigdos_id_seq");
                $r = "REGISTRO EXITOSO";
            } else {
                $r = "EL USUARIO YA EXISTE";
            }
            return $r;
        }
        
        function mostrar(){
            $m = $this->Busca("SELECT e.id, e.cedula, e.nombre, e.apellido, e.correo, e.cargo, d.nomDepartamento
                                FROM empleados AS e
                                INNER JOIN departamentos AS d ON e.idDepartamento = d.id");
            return $m;
        }

        function dpt(){
            $dpt = $this->Busca("SELECT id, nomDepartamento FROM departamentos ORDER BY nomDepartamento ASC");
            return $dpt;
        }

        function rol(){
            $rol = $this->Busca("SELECT id, rol FROM roles ORDER BY rol ASC");
            return $rol;
        }
    
        
    }
?>