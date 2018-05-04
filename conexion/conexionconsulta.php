<?php 
header('Content-Type: text/html; charset=utf-8_spanish_ci');
    
    class conexion{
        private $db;
        private $resultado;
        private $consulta;
        
        public function __construct ($dbhost, $dbuser, $dbpass, $dbname, $dbcharset){
            $this->db = new mysqli( $dbhost, $dbuser, $dbpass, $dbname );
            if($this->db->connect_errno){
                trigger_error(" Fallo la conexión con MySQL, Tipo de error -> ({$this->db->connect_error})", E_USER_ERROR);
            }
        }
        
      //---------------- GET--------------------//  
        
        public function getCarreras($regionalizacion,$sede,$semestre,$estadocivil,$discapacidad,$edad,$grupoet,$comunine,$comuniin){
            if($regionalizacion!=""){$regionalizacion = "WHERE ".$regionalizacion;}
            $this->resultado = $this->db->query("SELECT sniesprograma, nombre_progra FROM activos2018 INNER JOIN cod_snies ON sniesprograma=cod ".$regionalizacion.$sede.$semestre.$estadocivil.$discapacidad.$edad.$grupoet.$comunine.$comuniin." GROUP BY sniesprograma");
            return $this->resultado;
        }
        
        public function getProgramas($nivel,$regionalizacion,$sede,$semestre,$estadocivil,$discapacidad,$edad,$grupoet,$comunine,$comuniin){
            if($regionalizacion!=""){$regionalizacion = " AND ".$regionalizacion;}
            $this->resultado = $this->db->query("SELECT sniesprograma, nombre_progra FROM activos2018 INNER JOIN cod_snies ON sniesprograma=cod WHERE nivel='$nivel'".$regionalizacion.$sede.$semestre.$estadocivil.$discapacidad.$edad.$grupoet.$comunine.$comuniin." GROUP BY sniesprograma");
            return $this->resultado;
        }
                        
        public function getEstudiantesDeptoCarTotal($snies,$codDepto,$regionalizacion,$sede,$semestre,$estadocivil,$discapacidad,$edad,$grupoet,$comunine,$comuniin){
            if($regionalizacion!=""){$regionalizacion = " AND ".$regionalizacion;}
            $this->resultado = $this->db->query("SELECT COUNT('digoe') as cantidad FROM activos2018 WHERE activos2018.SNIESPROGRAMA='$snies' and activos2018.CODIGODPTO='$codDepto'".$regionalizacion.$sede.$semestre.$estadocivil.$discapacidad.$edad.$grupoet.$comunine.$comuniin);
            return $this->resultado;
        }
        
         public function getEstudiantesMuniCarTotal($snies,$codDepto,$codMuni,$regionalizacion,$sede,$semestre,$estadocivil,$discapacidad,$edad,$grupoet,$comunine,$comuniin){
            if($regionalizacion!=""){$regionalizacion = " AND ".$regionalizacion;}
            $this->resultado = $this->db->query("SELECT COUNT('digoe') as cantidad FROM activos2018 WHERE activos2018.SNIESPROGRAMA='$snies' and activos2018.CODIGODPTO='$codDepto' and activos2018.CODIGOMUN='$codMuni'".$regionalizacion.$sede.$semestre.$estadocivil.$discapacidad.$edad.$grupoet.$comunine.$comuniin);
            return $this->resultado;
        }
        
        public function getNombreProgramas($snies){
            $this->resultado = $this->db->query("SELECT nombre_progra FROM cod_snies WHERE cod='$snies';");
            return $this->resultado;
        }
        
        public function getDepartamentos(){
            $this->resultado = $this->db->query("SELECT cod_dane_depto.cod_depto, nombre_depto FROM activos2018 INNER JOIN cod_dane_muni on activos2018.CODIGODPTO=cod_dane_muni.cod_depto INNER JOIN cod_dane_depto ON cod_dane_muni.cod_depto=cod_dane_depto.cod_depto GROUP BY activos2018.CODIGODPTO;");
            return $this->resultado;
        }
        
        public function getNombreDepartamentos($codDepartamento){
            $this->resultado = $this->db->query("SELECT nombre_depto FROM cod_dane_depto WHERE cod_depto='$codDepartamento';");
            return $this->resultado;
        }
        
        public function getMunicipios($departamento){
            $this->resultado = $this->db->query("SELECT cod_dane_muni.cod_muni, cod_dane_muni.cod_depto, cod_dane_muni.nombre_muni FROM activos2018 INNER JOIN cod_dane_muni ON activos2018.CODIGOMUN=cod_dane_muni.cod_muni INNER JOIN cod_dane_depto ON cod_dane_muni.cod_depto=cod_dane_depto.cod_depto WHERE cod_dane_depto.cod_depto='$departamento' GROUP BY activos2018.CODIGOMUN;");
            return $this->resultado;
        }
        
        public function getNombreMunicipios($cod_mun,$cod_depto){
            $this->resultado = $this->db->query("SELECT nombre_muni FROM cod_dane_muni WHERE cod_muni='$cod_mun' and cod_depto='$cod_depto';");
            return $this->resultado;
        }
        
        public function getCarrerasee($username){
            $this->resultado = $this->db->query("SELECT nombre, resultado FROM resultados_loterias INNER JOIN loterias ON loterias.id=resultados_loterias.id_loteria where fecha=CURDATE()");
            return $this->resultado->fetch_all();
        }
        
        public function getCarrerasss(){
            $this->resultado = $this->db->query("SELECT nombre, resultado FROM resultados_loterias INNER JOIN loterias ON loterias.id=resultados_loterias.id_loteria where fecha=CURDATE()");
            return $this->resultado;
        }
        
         public function getTotalLotList($fecha){
            $this->resultado = $this->db->query("select nombre, resultado from resultados_loterias INNER JOIN loterias ON loterias.id=resultados_loterias.id_loteria where fecha='$fecha'");
            return $this->resultado;
        }
        
   
       
        //-------------- VALIDATE--------------//
        public function validateData($gps,$pass){
            $this->resultado = $this->db->query("SELECT id FROM users WHERE gps = '$gps' and pass ='$pass'");
            return $this->resultado;
        }
        //-----------------CLOSE--------------------//
        public function cerrar(){
            $this->db->close();
        }
    }
?>