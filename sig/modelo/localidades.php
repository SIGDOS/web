<?php
    require_once('modelo/datos.php');
    class localidades extends datos{
        //atributos de la clase, todos privados
        private $id;
        private $nomLocalidad;
        private $dirLocalidad;
        private $telefLocalidad;
        private $parroquia;
        private $municipio;
        private $estado;
        private $idTipoLocalidad;
        
        //metodos para colocar valores en los atributos
        function set_id($id){ $this->id = trim($id); }
        function set_nomLocalidad($nomLocalidad){ $this->nomLocalidad = trim($nomLocalidad); }
        function set_dirLocalidad($dirLocalidad){ $this->dirLocalidad = trim($dirLocalidad); }
        function set_telefLocalidad($telefLocalidad){ $this->telefLocalidad =  trim($telefLocalidad); }
        function set_parroquia($parroquia){ $this->parroquia = trim($parroquia); }
        function set_municipio($municipio){ $this->municipio = trim($municipio); }
        function set_estado($estado){ $this->estado = trim($estado); }
        function set_idTipoLocalidad($idTipoLocalidad){ $this->idTipoLocalidad = trim($idTipoLocalidad); }

        function get_id(){ return $this->id; }
        function get_nomLocalidad(){ return $this->nomLocalidad; }
        function get_dirLocalidad(){ return $this->dirLocalidad; }
        function get_telefLocalidad(){  return $this->telefLocalidad; }
        function get_parroquia(){ return $this->parroquia; }
        function get_municipio(){ return $this->municipio; }
        function get_estado(){ return $this->estado; }
        function get_idTipoLocalidad(){ return $this->idTipoLocalidad; }

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

        function agregar(){
            $b = $this->Busca("SELECT * FROM localidades WHERE nomLocalidad = '$this->nomLocalidad'");
            if($b){
                $r = "LA LOCALIDDAD YA EXISTE";
            }
            else{
                $e = $this->Ejecuta("INSERT INTO localidades
                                                        (nomLocalidad, 
                                                        dirLocalidad, 
                                                        telefLocalidad, 
                                                        parroquia, 
                                                        municipio, 
                                                        estado,
                                                        idTipoLocalidad)
                                            VALUES (UPPER('$this->nomLocalidad'),
                                                    UPPER('$this->dirLocalidad'),
                                                    UPPER('$this->telefLocalidad'),
                                                    UPPER('$this->parroquia'),
                                                    UPPER('$this->municipio'),
                                                    UPPER('$this->estado'),
                                                    UPPER('$this->idTipoLocalidad'))","localidades_id_seq");
                $r = "REGISTRO EXITOSO";
            }
            return $r;
        }

        function editar(){
            $b = $this->Busca("SELECT * FROM localidades WHERE nomLocalidad = '$this->nomLocalidad'");
            if(!$b){
                $r = "LA LOCALIDAD NO EXISTE";
            }
            else{
                $e = $this->Ejecuta("UPDATE localidades SET nomLocalidad = UPPER('$this->nomLocalidad'), 
                                                        dirLocalidad = UPPER('$this->dirLocalidad'), 
                                                        telefLocalidad = UPPER('$this->telefLocalidad'), 
                                                        parroquia = UPPER('$this->parroquia'), 
                                                        municipio = UPPER('$this->municipio'), 
                                                        estado = UPPER('$this->estado'),
                                                        idTipoLocalidad = UPPER('$this->idTipoLocalidad')
                                                        WHERE id = '$this->id'","");
                $r = "ACTUALIZACION EXITOSA";
            }
            return $r;
        }

        function eliminar(){
            $b = $this->Busca("SELECT * FROM localidades WHERE nomLocalidad = '$this->nomLocalidad'");
            if(!$b){
                $r = "LA LOCALIDAD NO EXISTE";
            }
            else{
                $b = $this->Ejecuta("DELETE FROM localidades WHERE nomLocalidad = '$this->nomLocalidad'"," ");
                $r = "ACTUALIZACION EXITOSA";
            }
            return $r;
        }
        

        function mostrar(){
            $m = $this->Busca("SELECT l.id, l.nomLocalidad, l.dirLocalidad, l.telefLocalidad, l.parroquia, l.municipio, l.estado, tl.nomTipoLocalidad
                                FROM tipolocalidad AS tl
                                INNER JOIN localidades AS l 
                                ON l.idTipoLocalidad = tl.id");
            return $m;
        }

        function tpL(){
            $tpL = $this->Busca("SELECT id, nomTipoLocalidad FROM tipolocalidad ORDER BY nomTipoLocalidad ASC");
            return $tpL;
        }
        
    }
?>