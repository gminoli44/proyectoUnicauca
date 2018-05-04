<?php
 header('Content-Type: text/html; charset=utf-8_spanish_ci');
 require "../conexion/conexionoferta.php";
 require "../conexion/config.php";

 $nivel = preg_split("[,]",$_POST["nivel"]) ;
 $conexion = new conexion(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_CHARSET);

 if($_POST["nivel"]==""){
    $resultPrograma = $conexion->getCarreras();
    if($resultPrograma){
        while($row=mysqli_fetch_assoc($resultPrograma)){
            echo '\'<option value="' .$row['sniesprograma']. '">' .$row['nombre_progra']. '</option>\'';
        }
    }
 }
 else{
 foreach ($nivel as &$n) {
    $resultprogramas=$conexion->getProgramas($n);
        while($row=mysqli_fetch_assoc($resultprogramas)){
            echo '\'<option value="' .$row['sniesprograma']. '">' .$row['nombre_progra']. '</option>\'';
        }
    }
 }
$conexion->cerrar();
?>