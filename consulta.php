<?php
header('Content-Type: text/html; charset=utf-8_spanish_ci');
require "conexion/conexionconsulta.php";
require "conexion/config.php";


$conexion = new conexion(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_CHARSET);

$departamento = ($_GET["departamento"]);
$municipios = ($_GET["municipios"]);
$estadocivil = ($_GET["estadocivil"]);
$discapacidad = ($_GET["discapacidad"]);
$genero = ($_GET["genero"]);
$regionalizacion = ($_GET["regionalizacion"]);
$sede = ($_GET["sede"]);
$nivel = ($_GET["nivel"]);
$programas = ($_GET["programas"]);
$grupoetnico = ($_GET["grupoetnico"]);
$comuninegra = ($_GET["comuninegra"]);
$comuniindigena = ($_GET["comuniindigena"]);
$toionrange_edad = ($_GET["toionrange_edad"]);
$fromionrange_edad = ($_GET["fromionrange_edad"]);
$toionrange_estrato = ($_GET["toionrange_estrato"]);
$fromionrange_estrato = ($_GET["fromionrange_estrato"]);
$toionrange_semestre = ($_GET["toionrange_semestre"]);
$fromionrange_semestre = ($_GET["fromionrange_semestre"]);
$tipoconsulta = ($_GET["tipoconsulta"]);
$reg="";
$se="";
$semestre="";
$escivil="";
$disc="";
$gen="";
$edad="";
$estratosocial="";
$grupoet="";
$comunine="";
$comuniin="";
?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8_spanish_ci">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>RESULTADOS CONSULTA</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

    </head>

    <body>

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>RESULTADOS DE LA CONSULTA</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <?php
                                
                                //VERIFICAR REGIONALIZACION
                                if($regionalizacion=="S"){
                                    $reg=" activos2018.PROGRAMA_REGIONALIZADO='S'";
                                }
                                elseif($regionalizacion=="N"){
                                    $reg=" activos2018.PROGRAMA_REGIONALIZADO='N'";
                                }
                                
                                //VERIFICAR SEDE
                                if($sede=="MIRANDA"){
                                    $se=" AND activos2018.SEDE='MIRANDA'";
                                }
                                elseif($sede=="POPAYAN"){
                                    $se=" AND activos2018.SEDE='POPAYAN'";
                                }
                                elseif($sede=="SANTANDER DE QUILICHAO"){
                                    $se=" AND activos2018.SEDE='SANTANDER DE QUILICHAO'";
                                }
                                elseif($sede=="SILVIA"){
                                    $se=" AND activos2018.SEDE='SILVIA'";
                                }
                                
                                //VERIFICAR SEMESTRE
                                if($fromionrange_semestre!="1" || $toionrange_semestre!="12"){
                                    $semestre=$semestre." AND activos2018.SEMESTRE BETWEEN ".$fromionrange_semestre." AND ".$toionrange_semestre;
                                }
                                
                                //VERIFICAR ESTADO CIVIL
                                if($estadocivil=="CASADO"){
                                    $escivil=" AND activos2018.ESTADOCIVIL='CASADO(A)'";
                                }
                                elseif($estadocivil=="DIVORCIADO"){
                                    $escivil=" AND activos2018.ESTADOCIVIL='DIVORCIADO(A)'";
                                }
                                elseif($estadocivil=="MADRE SOLTERA"){
                                    $escivil=" AND activos2018.ESTADOCIVIL='MADRE SOLTERA'";
                                }
                                elseif($estadocivil=="RELIGIOSO"){
                                    $escivil=" AND activos2018.ESTADOCIVIL='RELIGIOSO(A)'";
                                }
                                elseif($estadocivil=="SEPARADO"){
                                    $escivil=" AND activos2018.ESTADOCIVIL='SEPARADO(A)'";
                                }
                                elseif($estadocivil=="UNION LIBRE"){
                                    $escivil=" AND activos2018.ESTADOCIVIL='UNION LIBRE'";
                                }
                                elseif($estadocivil=="VIUDO"){
                                    $escivil=" AND activos2018.ESTADOCIVIL='VIUDO(A)'";
                                }
                                elseif($estadocivil=="SOLTERO"){
                                    $escivil=" AND activos2018.ESTADOCIVIL='SOLTERO(A)'";
                                }
                                
                                //VERIFICAR DISCAPACIDAD
                                $discapacidades = preg_split("[,]",$discapacidad);
                                foreach ($discapacidades as &$discapa) {
                                    
                                    if ($disc=="" && $discapa!=""){
                                        $disc =$disc. " and (";
                                        if($discapa=="FISICA"){
                                            $disc=$disc."activos2018.DISCAPACIDAD='Discapacidad Física'";
                                        }
                                        if($discapa=="INTELECTUAL"){
                                            $disc=$disc."activos2018.DISCAPACIDAD='Discapacidad Intelectual'";
                                        }
                                        if($discapa=="MULTIPLE"){
                                            $disc=$disc."activos2018.DISCAPACIDAD='Discapacidad Múltiple'";
                                        }
                                        if($discapa=="PSICOSOCIAL"){
                                            $disc=$disc."activos2018.DISCAPACIDAD='Discapacidad Psicosocial'";
                                        }
                                        if($discapa=="BAJAVISION"){
                                            $disc=$disc."activos2018.DISCAPACIDAD='Discapacidad Sensorial - Baja Visión'";
                                        }
                                        if($discapa=="CEGUERA"){
                                            $disc=$disc."activos2018.DISCAPACIDAD='Discapacidad Sensorial - Ceguera'";
                                        }
                                        if($discapa=="HIPOACUSIA"){
                                            $disc=$disc."activos2018.DISCAPACIDAD='Discapacidad Sensorial - Hipoacusia'";
                                        }
                                        if($discapa=="SORDERAPROFUNDA"){
                                            $disc=$disc."activos2018.DISCAPACIDAD='Discapacidad Sensorial - Sordera Profunda'";
                                        }
                                        if($discapa=="SORDOCEGUERA"){
                                            $disc=$disc."activos2018.DISCAPACIDAD='Sordoceguera'";
                                        }
                                        if($discapa=="NOAPLICA"){
                                            $disc=$disc."activos2018.DISCAPACIDAD='NO APLICA'";
                                        }
                                        
                                    }
                                    else{
                                        if($discapa=="FISICA"){
                                            $disc=$disc." OR activos2018.DISCAPACIDAD='Discapacidad Física'";
                                        }
                                        if($discapa=="INTELECTUAL"){
                                            $disc=$disc." OR activos2018.DISCAPACIDAD='Discapacidad Intelectual'";
                                        }
                                        if($discapa=="MULTIPLE"){
                                            $disc=$disc." OR activos2018.DISCAPACIDAD='Discapacidad Múltiple'";
                                        }
                                        if($discapa=="PSICOSOCIAL"){
                                            $disc=$disc." OR activos2018.DISCAPACIDAD='Discapacidad Psicosocial'";
                                        }
                                        if($discapa=="BAJAVISION"){
                                            $disc=$disc." OR activos2018.DISCAPACIDAD='Discapacidad Sensorial - Baja Visión'";
                                        }
                                        if($discapa=="CEGUERA"){
                                            $disc=$disc." OR activos2018.DISCAPACIDAD='Discapacidad Sensorial - Ceguera'";
                                        }
                                        if($discapa=="HIPOACUSIA"){
                                            $disc=$disc." OR activos2018.DISCAPACIDAD='Discapacidad Sensorial - Hipoacusia'";
                                        }
                                        if($discapa=="SORDERAPROFUNDA"){
                                            $disc=$disc." OR activos2018.DISCAPACIDAD='Discapacidad Sensorial - Sordera Profunda'";
                                        }
                                        if($discapa=="SORDOCEGUERA"){
                                            $disc=$disc." OR activos2018.DISCAPACIDAD='Sordoceguera'";
                                        }
                                        if($discapa=="NOAPLICA"){
                                            $disc=$disc." OR activos2018.DISCAPACIDAD='NO APLICA'";
                                        }
                                    }
                                }
                                if ($disc!=""){$disc=$disc.")";}
                                
                                 //VERIFICAR GENERO
                           /*     if($genero=="M"){
                                    $gen=" AND activos2018.GENERO='M'";
                                }
                                elseif($genero=="F"){
                                     $gen=" AND activos2018.GENERO='F'";
                                }*/
                                
                                //VERIFICAR EDAD
                                if($fromionrange_edad!="10" || $toionrange_edad!="100"){
                                    $edad=" AND OBTENEREDAD(FECHA_NACIMIENTO) BETWEEN ".$fromionrange_edad." AND ". $toionrange_edad;
                                }
                                
                                //VERIFICAR ESTRATO SOCIAL
                           /*     if($fromionrange_semestre!="1" || $toionrange_semestre!="12"){
                                    $semestre=$semestre." AND activos2018.ESTRATOSOCIAL BETWEEN ".$fromionrange_semestre." AND ".$toionrange_semestre;
                                }*/
                               
                                //VERIFICAR GRUPO ETNICO
                                $grupoetnicos = preg_split("[,]",$grupoetnico);
                                foreach ($grupoetnicos as &$grupo) {    
                                    //SI NO SELECCIONA UNA COMUNIDAD NEGRA EN ESPECIFICO
                                    if($grupoet=="" && $grupo!=""){
                                        $grupoet=$grupoet." and (";
                                        if($grupo=="NEGRA"){
                                            $grupoet=$grupoet."activos2018.GRUPOETNICO='Comunidad negra'";
                                        }
                                        elseif($grupo=="INDIGENA"){
                                            $grupoet=$grupoet."activos2018.GRUPOETNICO='Pueblo indigena'";
                                        }
                                        elseif($grupo=="RROM"){
                                            $grupoet=$grupoet."activos2018.GRUPOETNICO='Pueblo RROM'";
                                        }
                                        elseif($grupo=="NOINFORMA"){
                                            $grupoet=$grupoet."activos2018.GRUPOETNICO='No Informa'";
                                        }
                                        elseif($grupo=="NOPERTENECE"){
                                            $grupoet=$grupoet."activos2018.GRUPOETNICO='No pertenece'";
                                        }
                                    }
                                    else{
                                        if($grupo=="NEGRA"){
                                            $grupoet=$grupoet." OR activos2018.GRUPOETNICO='Comunidad negra'";
                                        }
                                        elseif($grupo=="INDIGENA"){
                                            $grupoet=$grupoet." OR activos2018.GRUPOETNICO='Pueblo indigena'";
                                        }
                                        elseif($grupo=="RROM"){
                                            $grupoet=$grupoet." OR activos2018.GRUPOETNICO='Pueblo RROM'";
                                        }
                                        elseif($grupo=="NOINFORMA"){
                                            $grupoet=$grupoet." OR activos2018.GRUPOETNICO='No Informa'";
                                        }
                                        elseif($grupo=="NOPERTENECE"){
                                            $grupoet=$grupoet." OR activos2018.GRUPOETNICO='No pertenece'";
                                        }
                                    }
                                }
                                if ($grupo!=""){$grupoet=$grupoet.")";}
                               
                                //VERIFICAR COMUNIDAD NEGRA
                                $comuninegras = preg_split("[,]",$comuninegra);
                                foreach ($comuninegras as &$comuni) {    
                                    //SI NO SELECCIONA UNA COMUNIDAD NEGRA EN ESPECIFICO
                                    if($comunine=="" && $comuni!=""){
                                        $comunine=$comunine." and (";
                                        if($comuni=="AFROCOLOMBIANOS"){
                                            $comunine=$comunine."activos2018.COMUNIDADNEGRA='Afrocolombianos'";
                                        }
                                        elseif($comuni=="PALENQUEROS"){
                                            $comunine=$comunine."activos2018.COMUNIDADNEGRA='Palenqueros'";
                                        }
                                        elseif($comuni=="RAIZALES"){
                                            $comunine=$comunine."activos2018.COMUNIDADNEGRA='Raizales'";
                                        }
                                        elseif($comuni=="OTRAS"){
                                            $comunine=$comunine."activos2018.COMUNIDADNEGRA='Otras comunidades negras'";
                                        }
                                        elseif($comuni=="NOAPLICA"){
                                            $comunine=$comunine."activos2018.COMUNIDADNEGRA='No Aplica'";
                                        }
                                    }
                                    else{
                                        if($comuni=="AFROCOLOMBIANOS"){
                                            $comunine=$comunine." OR activos2018.COMUNIDADNEGRA='Afrocolombianos'";
                                        }
                                        elseif($comuni=="PALENQUEROS"){
                                            $comunine=$comunine." OR activos2018.COMUNIDADNEGRA='Palenqueros'";
                                        }
                                        elseif($comuni=="RAIZALES"){
                                            $comunine=$comunine." OR activos2018.COMUNIDADNEGRA='Raizales'";
                                        }
                                        elseif($comuni=="OTRAS"){
                                            $comunine=$comunine." OR activos2018.COMUNIDADNEGRA='Otras comunidades negras'";
                                        }
                                        elseif($comuni=="NOAPLICA"){
                                            $comunine=$comunine." OR activos2018.COMUNIDADNEGRA='No Aplica'";
                                        }
                                    }
                                }
                                if ($comunine!=""){$comunine=$comunine.")";}
                                
                                //VERIFICAR COMUNIDAD INDIGENA
                                $comuniindigenas = preg_split("[,]",$comuniindigena);
                                foreach ($comuniindigenas as &$comunii) {    
                                    //SI NO SELECCIONA UNA COMUNIDAD NEGRA EN ESPECIFICO
                                    if($comuniin=="" && $comunii!=""){
                                        $comuniin=$comuniin." and (";
                                        if($comunii=="ANDOQUE"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Andoque o andoke'";
                                        }
                                        elseif($comunii=="AWA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Awa (cuaiker)'";
                                        }
                                        elseif($comunii=="CANAMOMO"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Caniamomo'";
                                        }
                                        elseif($comunii=="COCAMA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Cocama'";
                                        }
                                        elseif($comunii=="COCONUCO"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Coconuco'";
                                        }
                                        elseif($comunii=="GUAMBIANO"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Guambiano'";
                                        }
                                        elseif($comunii=="INGA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Inga'";
                                        }
                                        elseif($comunii=="KAMSA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Kamsa o kamentsa'";
                                        }
                                        elseif($comunii=="NASA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Nasa (paez)'";
                                        }
                                        elseif($comunii=="PASTOS"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Pastos'";
                                        }
                                        elseif($comunii=="QUILLINCINGAS"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Quillacingas'";
                                        }
                                        elseif($comunii=="SIONA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Siona'";
                                        }
                                        elseif($comunii=="TOTORO"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Tororo'";
                                        }
                                        elseif($comunii=="YANACONA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Yanacona'";
                                        }
                                        elseif($comunii=="YAUNA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Yauna'";
                                        }
                                        elseif($comunii=="YUKUNA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Yukuna'";
                                        }
                                        elseif($comunii=="OTRO"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='Otro'";
                                        }
                                        elseif($comunii=="NOAPLICA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='No aplica'";
                                        }
                                        elseif($comunii=="NOINFORMA"){
                                            $comuniin=$comuniin."activos2018.PUEBLOINDIGENA='No informa'";
                                        }
                                    }
                                    else{
                                        if($comunii=="ANDOQUE"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Andoque o andoke'";
                                        }
                                        elseif($comunii=="AWA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Awa (cuaiker)'";
                                        }
                                        elseif($comunii=="CANAMOMO"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Caniamomo'";
                                        }
                                        elseif($comunii=="COCAMA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Cocama'";
                                        }
                                        elseif($comunii=="COCONUCO"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Coconuco'";
                                        }
                                        elseif($comunii=="GUAMBIANO"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Guambiano'";
                                        }
                                        elseif($comunii=="INGA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Inga'";
                                        }
                                        elseif($comunii=="KAMSA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Kamsa o kamentsa'";
                                        }
                                        elseif($comunii=="NASA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Nasa (paez)'";
                                        }
                                        elseif($comunii=="PASTOS"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Pastos'";
                                        }
                                        elseif($comunii=="QUILLINCINGAS"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Quillacingas'";
                                        }
                                        elseif($comunii=="SIONA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Siona'";
                                        }
                                        elseif($comunii=="TOTORO"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Tororo'";
                                        }
                                        elseif($comunii=="YANACONA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Yanacona'";
                                        }
                                        elseif($comunii=="YAUNA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Yauna'";
                                        }
                                        elseif($comunii=="YUKUNA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Yukuna'";
                                        }
                                        elseif($comunii=="OTRO"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='Otro'";
                                        }
                                        elseif($comunii=="NOAPLICA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='No aplica'";
                                        }
                                        elseif($comunii=="NOINFORMA"){
                                            $comuniin=$comuniin." OR activos2018.PUEBLOINDIGENA='No informa'";
                                        }
                                    }
                                }
                                if ($comuniin!=""){$comuniin=$comuniin.")";}
                                
                                                                                               
                                function cantidadEstudiantesDepto($codDepto){
                                    
                                    global $conexion,$programas,$regionalizacion,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin;
                                                                        
                                    if($programas==""){
                                        $resultPrograma = $conexion->getCarreras($reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                        if($resultPrograma){
                                            while($rowCar=mysqli_fetch_assoc($resultPrograma)){
                                            $resultCantidad = $conexion->getEstudiantesDeptoCarTotal($rowCar['sniesprograma'],$codDepto,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                                if($resultCantidad){
                                                    while($row=mysqli_fetch_assoc($resultCantidad)){
                                                        echo '<td>' .$row['cantidad']. '</td>';
                                                    }
                                                }
                                            }
                                        }
                                    }else{
                                        $programa = preg_split("[,]",$programas);
                                        foreach ($programa as &$prog) {
                                        $resultCantidad = $conexion->getEstudiantesDeptoCarTotal($prog,$codDepto,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                            if($resultCantidad){
                                                while($row=mysqli_fetch_assoc($resultCantidad)){
                                                    echo '<td>' .$row['cantidad']. '</td>';
                                                }
                                            }
                                        }
                                    }
                                }
                                
                                function cantidadEstudiantesDeptoNivel($codDepto,$n){
                                    
                                    global $conexion,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin; 
                                    $resultprogramas=$conexion->getProgramas($n,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                    while($row=mysqli_fetch_assoc($resultprogramas)){
                                        $resultCantidad = $conexion->getEstudiantesDeptoCarTotal($row['sniesprograma'],$codDepto,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                        if($resultCantidad){
                                                while($rowc=mysqli_fetch_assoc($resultCantidad)){
                                                    echo '<td>' .$rowc['cantidad']. '</td>';
                                                }
                                            }
                                    }
                                }
                                
                                function cantidadEstudiantesMuni($codDepto,$codMuni){
                                    
                                    global $conexion,$programas,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin; 
                                    
                                    if($programas==""){
                                        $resultPrograma = $conexion->getCarreras($reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                        if($resultPrograma){
                                            while($rowCar=mysqli_fetch_assoc($resultPrograma)){
                                            $resultCantidad = $conexion->getEstudiantesMuniCarTotal($rowCar['sniesprograma'],$codDepto,$codMuni,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                                if($resultCantidad){
                                                    while($row=mysqli_fetch_assoc($resultCantidad)){
                                                        echo '<td>' .$row['cantidad']. '</td>';
                                                    }
                                                }
                                            }
                                        }
                                    }else{
                                        $programa = preg_split("[,]",$programas);
                                        foreach ($programa as &$prog) {
                                        $resultCantidad = $conexion->getEstudiantesMuniCarTotal($prog,$codDepto,$codMuni,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                            if($resultCantidad){
                                                while($row=mysqli_fetch_assoc($resultCantidad)){
                                                    echo '<td>' .$row['cantidad']. '</td>';
                                                }
                                            }
                                        }
                                    }
                                }
                                
                                function cantidadEstudiantesMuniNivel($codDepto,$codMuni,$n){
                                    global $conexion,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin; 
                                    $resultprogramas=$conexion->getProgramas($n,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                    while($row=mysqli_fetch_assoc($resultprogramas)){
                                        $resultCantidad = $conexion->getEstudiantesMuniCarTotal($row['sniesprograma'],$codDepto,$codMuni,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                        if($resultCantidad){
                                            while($rowc=mysqli_fetch_assoc($resultCantidad)){
                                                echo '<td>' .$rowc['cantidad']. '</td>';
                                            }
                                        }
                                    }
                                }
                                
                                
                                function cargarprogramas(){
                                    
                                    global $conexion,$programas,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin; 
                                    if($programas==""){
                                    $resultPrograma = $conexion->getCarreras($reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                    if($resultPrograma){
                                        while($row=mysqli_fetch_assoc($resultPrograma)){
                                            echo '<th>' .$row['nombre_progra']. '</th>';
                                        }
                                    }
                                    }else{
                                        $programa = preg_split("[,]",$programas);
                                        foreach ($programa as &$prog) {
                                            $resultNombrePrograma = $conexion->getNombreProgramas($prog);
                                            if($resultNombrePrograma){
                                                while($row=mysqli_fetch_assoc($resultNombrePrograma)){
                                                    echo '<th>' .$row['nombre_progra']. '</th>';
                                                }
                                            }
                                        }
                                    } 
                                }
                                
                                function cargarprogramaspornivel($n){
                                    
                                    global $conexion,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin; 
                                    $resultprogramas=$conexion->getProgramas($n,$reg,$se,$semestre,$escivil,$disc,$edad,$grupoet,$comunine,$comuniin);
                                    while($row=mysqli_fetch_assoc($resultprogramas)){
                                        echo '<th>' .$row['nombre_progra']. '</th>';
                                    }
                                }
                                
                            //++++++++++++++++++COD DEPARTAMENTO O MUNICIPIO++++++++++++++++++++
                                
                                if($tipoconsulta=="DEPARTAMENTO"){
                                    echo '<th>' .'COD_DEPARTAMENTO'. '</th>';
                                }
                                else{
                                   echo '<th>' .'COD_MUNICIPIO'. '</th>';
                                }
                                
                            //++++++++++++++++++NOMBRE DEPARTAMENTO O MUNICIPIO++++++++++++++++++++
                                
                                if($tipoconsulta=="DEPARTAMENTO"){
                                    echo '<th>' .'NOMBRE_DEPARTAMENTO'. '</th>';
                                }
                                else{
                                   echo '<th>' .'NOMBRE_MUNICIPIO'. '</th>';
                                }
                      
                            //++++++++++++++++++++++++PROGRAMAS++++++++++++++++++
                            
                            if (($nivel=="" && $programas=="")||($nivel=="" && $programas!="")||($nivel!="" && $programas!="")){
                                cargarprogramas();
                            }
                            else{
                                $niv = preg_split("[,]",$nivel) ;
                                foreach ($niv as &$n) {
                                    cargarprogramaspornivel($n);
                                }
                                
                            }
                            ?>

                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            //++++++++++++++++++DEPARTAMENTOS++++++++++++++++++++
                                if($tipoconsulta=="DEPARTAMENTO"){
                                    //SI NO HAY DEFINIDO UN DEPARTAMENTO
                                    if($departamento==""){
                                        $resultDepart = $conexion->getDepartamentos();
                                        if($resultDepart){
                                            while($rowDep=mysqli_fetch_assoc($resultDepart)){
                                                echo '<tr>';
                                                echo '<td>' .$rowDep['cod_depto']. '</td>';
                                                echo '<td>' .$rowDep['nombre_depto']. '</td>';
                                                 //DETERMINA SI TIENE DEFINIDO UN NIVEL O NO
                                                if (($nivel=="" && $programas=="")||($nivel=="" && $programas!="")||($nivel!="" && $programas!="")){
                                                    cantidadEstudiantesDepto($rowDep['cod_depto']);
                                                }
                                                else{
                                                    $niv = preg_split("[,]",$nivel) ;
                                                    foreach ($niv as &$n) {
                                                        cantidadEstudiantesDeptoNivel($rowDep['cod_depto'],$n);
                                                    }
                                                }
                                                                                                
                                                echo '</tr>';
                                            }
                                        }
                                    }
                                    //SI SE DEFINE UN DEPARTAMENTO
                                    else{
                                        $nombre_depto="";
                                        $departamentos = preg_split("[,]",$departamento);
                                        foreach ($departamentos as &$dep) {
                                            $resultNombreDepart = $conexion->getNombreDepartamentos($dep);
                                            if($resultNombreDepart){
                                                while($row=mysqli_fetch_assoc($resultNombreDepart)){
                                                $nombre_depto=$row['nombre_depto'];
                                                
                                                echo '<tr>';
                                                echo '<td>' .$dep.'</td>';
                                                echo '<td>' .$nombre_depto. '</td>';
                                                //DETERMINA SI TIENE DEFINIDO UN NIVEL O NO
                                                if (($nivel=="" && $programas=="")||($nivel=="" && $programas!="")||($nivel!="" && $programas!="")){
                                                    cantidadEstudiantesDepto($dep);
                                                }
                                                else{
                                                    $niv = preg_split("[,]",$nivel) ;
                                                    foreach ($niv as &$n) {
                                                        cantidadEstudiantesDeptoNivel($dep,$n);
                                                    }
                                                }
                                            
                                                echo '</tr>';
                                                }
                                            }
                                    }
                                    }
                                }
                            //++++++++++++++++++MUNICIPIOS++++++++++++++++++++
                                else{
                                //SI NO HAY DEFINIDO UN MUNICIPIO
                                    if($municipios==""){
                                //SI NO HAY DEFINIDO UN DEPARTAMENTO        
                                        if($departamento==""){
                                            $resultDepart = $conexion->getDepartamentos();
                                            if($resultDepart){
                                                while($row=mysqli_fetch_assoc($resultDepart)){
                                                    $resultMuni = $conexion->getMunicipios($row['cod_depto']);
                                                    if($resultMuni){
                                                        while($row=mysqli_fetch_assoc($resultMuni)){
                                                            echo '<tr>';
                                                            echo '<td>' .$row['cod_depto'].$row['cod_muni'].'</td>';
                                                            echo '<td>' .$row['nombre_muni']. '</td>';
                                                            
                                                            //DETERMINA SI TIENE DEFINIDO UN NIVEL O NO
                                                            if (($nivel=="" && $programas=="")||($nivel=="" && $programas!="")||($nivel!="" && $programas!="")){
                                                                cantidadEstudiantesMuni($row['cod_depto'],$row['cod_muni']);
                                                            }
                                                            else{
                                                                $niv = preg_split("[,]",$nivel) ;
                                                                foreach ($niv as &$n) {
                                                                    cantidadEstudiantesMuniNivel($row['cod_depto'],$row['cod_muni'],$n);
                                                                }
                                                            }                                                            
                                                                                                                            
                                                            echo '</tr>';
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    
                                // SI HAY DEFINIDO UN DEPARTAMENTO 
                                        else{
                                            $nombre_depto="";
                                            $departamentos = preg_split("[,]",$departamento);
                                            foreach ($departamentos as &$dep) {
                                                $resultNombreDepart = $conexion->getNombreDepartamentos($dep);
                                                if($resultNombreDepart){
                                                    while($row=mysqli_fetch_assoc($resultNombreDepart)){
                                                    $resultMuni = $conexion->getMunicipios($dep);
                                                    if($resultMuni){
                                                        while($row=mysqli_fetch_assoc($resultMuni)){
                                                            echo '<tr>';
                                                            echo '<td>' .$row['cod_depto'].$row['cod_muni'].'</td>';
                                                            echo '<td>' .$row['nombre_muni']. '</td>';
                                                            
                                                            //DETERMINA SI TIENE DEFINIDO UN NIVEL O NO
                                                            if (($nivel=="" && $programas=="")||($nivel=="" && $programas!="")||($nivel!="" && $programas!="")){
                                                                cantidadEstudiantesMuni($row['cod_depto'],$row['cod_muni']);
                                                            }
                                                            else{
                                                                $niv = preg_split("[,]",$nivel) ;
                                                                foreach ($niv as &$n) {
                                                                    cantidadEstudiantesMuniNivel($row['cod_depto'],$row['cod_muni'],$n);
                                                                }
                                                            } 
                                                                                                                        
                                                            echo '</tr>';
                                                        }
                                                    }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    //SI HAY DEFINIDO UN MUNICIPIO
                                    else{
                                        $municipio = preg_split("[,]",$municipios);
                                        
                                        foreach ($municipio as &$mun) {
                                            
                                            $cod=preg_split("[;]",$mun);
                                            $cod_depto=$cod[0];
                                            $cod_muni=$cod[1];
                                            $resultNombreMuni = $conexion->getNombreMunicipios($cod_muni,$cod_depto);
                                            if($resultNombreMuni){
                                                while($row=mysqli_fetch_assoc($resultNombreMuni)){
                                                    $nombre_muni=$row['nombre_muni'];
                                                }
                                            }
                                            echo '<tr>';
                                            echo '<td>' .$cod_depto.$cod_muni.'</td>';
                                            echo '<td>' .$nombre_muni. '</td>';
                                            
                                            
                                            //DETERMINA SI TIENE DEFINIDO UN NIVEL O NO
                                            if (($nivel=="" && $programas=="")||($nivel=="" && $programas!="")||($nivel!="" && $programas!="")){
                                                cantidadEstudiantesMuni($cod_depto,$cod_muni);
                                            }
                                            else{
                                                $niv = preg_split("[,]",$nivel) ;
                                                foreach ($niv as &$n) {
                                                    cantidadEstudiantesMuniNivel($cod_depto,$cod_muni,$n);
                                                }
                                            } 
                                                
                                                                                       
                                            echo '</tr>';
                                        }
                                    }
                                    
                                }
                                ?>
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        
        <?php 
        
            function getData(){
                
                return null;
            }
        
        ?>


        <!-- Mainly scripts -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="js/plugins/dataTables/datatables.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>

        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function() {
                $('.dataTables-example').DataTable({
                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [{
                            extend: 'copy'
                        },
                        {
                            extend: 'csv'
                        },
                        {
                            extend: 'excel',
                            title: 'ExampleFile'
                        },
                        {
                            extend: 'pdf',
                            title: 'ExampleFile'
                        },

                        {
                            extend: 'print',
                            customize: function(win) {
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            }
                        }
                    ]

                });

            });

        </script>

    </body>

    </html>
