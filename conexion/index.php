<meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci" />
<?php

    header('Content-Type: text/html; charset=utf-8_spanish_ci');
    require "conexion.php";
    require "config.php";

    $conexion = new conexion(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_CHARSET);
    $carreras;
    $archivo='';
    

    $resultCarreras = $conexion->getCarreras();
    if($resultCarreras){
        while($row=mysqli_fetch_assoc($resultCarreras)){
            $sniescarreras[]= $row['sniesprograma'];
            $nombrecarreras[]= $row['nombre_progra'];
        }
      /*  if($carreras!=null){
        print_r(($carreras));
        }*/
    }
   
    $resultDepartamentos = $conexion->getDepartamentos();
    if($resultDepartamentos){
        while($row=mysqli_fetch_assoc($resultDepartamentos)){
            $departamentos[]= $row['cod_depto'].';'.$row['nombre_depto'];

            
        }
       /* if($departamentos!=null){
          print_r(($departamentos));
        }*/
    }
    $archivo.=";;";
    foreach ($nombrecarreras as &$car) {
            $archivo.=($car.";");
        }

    $archivo.="<br>";
     
    foreach ($departamentos as &$nombreDepto) {
      //  echo $codDepto;
        $nombre = preg_split("[;]",$nombreDepto);
        $archivo.=$nombreDepto.';';
        foreach ($sniescarreras as &$snies) {
        //    echo $snies.",";
             $resultCantiadad=$conexion->getEstudiantesDeptoCarTotal($snies,$nombre[1]);
             while($row=mysqli_fetch_assoc($resultCantiadad)){
                $archivo .= $row['cantidad'].';';
             }
        }  
          $archivo.="<br>";
    }

    echo $archivo;

    
?>
