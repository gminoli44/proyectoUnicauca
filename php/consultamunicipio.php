<?php
 header('Content-Type: text/html; charset=utf-8_spanish_ci');
 require "../conexion/conexionoferta.php";
 require "../conexion/config.php";

 $departamentos = preg_split("[,]",$_POST["departamentos"]) ;
 $municipios="";
 $conexion = new conexion(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_CHARSET);

 foreach ($departamentos as &$dep) {
        
             $resultMunicipios=$conexion->getMunicipios($dep);
             while($row=mysqli_fetch_assoc($resultMunicipios)){
                echo '\'<option value="' .$row['cod_depto'].';'.$row['cod_muni']. '">' .$row['nombre_muni']. '</option>\'';
             }
        }

$conexion->cerrar();


?>