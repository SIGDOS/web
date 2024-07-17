<?php
    require_once('Modelo/datos.php');
    class solicitudes extends datos{
        //atributos de la clase, todos privados
        private $id;
        private $cedEmpleado;
        private $idEquipo;
        private $idServicio;
        private $fechaSolicitud;
        private $statusSolicitud;
       
        
        //metodos para colocar valores en los atributos
        function set_id($id){ $this->id = trim($id); }
        function set_empleado($cedEmpleado){ $this->cedEmpleado = trim($cedEmpleado); }
        function set_equipo($idEquipo){ $this->idEquipo = trim($idEquipo); }
        function set_servicio($idServicio){ $this->idServicio =  trim($idServicio); }
        function set_fechaSolicitud($fechaSolicitud){ $this->fechaSolicitud = trim($fechaSolicitud); }
        function set_status($statusSolicitud){ $this->statusSolicitud = trim($statusSolicitud); }
        

        function get_id(){ return $this->id; }
        function get_empleado(){ return $this->cedEmpleado; }
        function get_equipo(){ return $this->idEquipo; }
        function get_servicio(){  return $this->idServicio; }
        function get_fechaSolicitud(){ return $this->fechaSolicitud; }
        function get_status(){ return $this->statusSolicitud; }

        /*function editar_pass(){
            $b = $this->Busca("SELECT * FROM usuariossigdos WHERE nomUsuario='$this->nomUsuario'");
            if(!$b){
                $r = " EL USUARIO NO SE HA ENCONTRADO ";
            }
            else{
                $e = $this->Ejecuta("UPDATE user SET claveUsuario='$this->claveUsuario'
                                                    WHERE nomUsuario='$this->nomUsuario'","");
                $r = "actualizacion Exitosa ";
            } 
            return $r;
        }*/

        function agregar(){
            $b = $this->Busca("SELECT * FROM solicitudes WHERE cedEmpleado = '$this->cedEmpleado' AND statusSolicitud = '1'");
            if($b){
                $r = "El empleado ya tiene una solicitud pendiente";
            }
            else{
                // Insertar la solicitud con estado pendiente
                $e = $this->Ejecuta("INSERT INTO solicitudes (cedEmpleado, idEquipo, idServicio, fechaSolicitud, statusSolicitud)
                               VALUES ('$this->cedEmpleado',
                                       '$this->idEquipo',
                                       '$this->idServicio',
                                       '$this->fechaSolicitud',
                                       '1')","user_id_seq");
                $r = "REGISTRO EXITOSO";
            }
            return $r;
        }

        /*function editar(){
            $b = $this->Busca("SELECT * FROM empleados WHERE cedula = '$this->cedula'");
            if(!$b){
                $r = "EL EMPLEADO NO EXISTE";
            }
            else{
                $e = $this->Ejecuta("UPDATE empleados SET cedula = '$this->cedula', 
                                                        nombre = '$this->nombre', 
                                                        apellido = '$this->apellido', 
                                                        correo = '$this->correo', 
                                                        cargo = '$this->cargo', 
                                                        idDepartamento = '$this->idDepartamento'
                                                        WHERE id = '$this->id'","");
                $r = "ACTUALIZACION EXITOSA";
            }
            return $r;
        }*/

        /*function eliminar(){
            $b = $this->Busca("SELECT * FROM empleados WHERE cedula = '$this->cedula'");
            if(!$b){
                $r = "EL EMPLEADO NO EXISTE";
            }
            else{
                $e = $this->Ejecuta("DELETE empleados WHERE cedula = '$this->cedula'");
                $r = "ACTUALIZACION EXITOSA";
            }
            return $r;
        }*/
        

        function mostrar(){
            $m = $this->Busca("SELECT s.id, s.cedEmpleado, e.nombre AS nombre, e.apellido AS apellido, eq.nomEquipo AS idEquipo, se.nomServicio AS idServicio, s.fechaSolicitud, ss.statusSolicitud AS statusSolicitud
                    FROM solicitudes s
                    INNER JOIN empleados e ON s.cedEmpleado = e.cedula
                    INNER JOIN equiposAsign eq ON s.idEquipo = eq.id
                    INNER JOIN servicios se ON s.idServicio = se.id
                    INNER JOIN statusSolicitud ss ON s.statusSolicitud = ss.id");
            return $m;
        }

        function dpt(){
            $dpt = $this->Busca("SELECT id, nomDepartamento FROM departamentos ORDER BY nomDepartamento ASC");
            return $dpt;
        }

        function servicio(){
            $servicio = $this->Busca("SELECT id, nomServicio FROM servicios ORDER BY id ASC");
            return $servicio;
        }
        
        function equipo(){
            $equipo = $this->Busca("SELECT id, nomEquipo FROM equiposAsign ORDER BY id ASC");
            return $equipo;
        }
    }
?>