<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ANTROPOS | OFERTA Y DEMANDA</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <link href="css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <link href="css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <link href="css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">
    
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    

</head>

<body>

<div id="wrapper">

    <?php 
    
    header('Content-Type: text/html; charset=utf-8_spanish_ci');
    
    require "navbar.php";  
    require "conexion/conexionoferta.php";
    require "conexion/config.php";

    $conexion = new conexion(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_CHARSET);
    
    ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-out"></i> Cerrar sesi&oacute;n
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                     <div class="ibox">
                        <div class="ibox-title">
                            <h5>Formulario de Consulta</h5>
                        </div>
                          
                         <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                             Informaci&oacute;n Geogr&aacute;fica
                                        </div>
                                        <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                            <label class="font-normal"><strong>Tipo de Consulta*</strong></label>
                                                <div>
                                                    <select class="chosen-select" style="" tabindex="4" id="tipoconsulta" required>
                                                        <option value="DEPARTAMENTO">DEPARTAMENTO</option>
                                                        <option value="MUNICIPIO">MUNICIPIO</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                            <div class="animated" id="deptocontainer">
                                            <label class="font-normal"><strong>Departamento de Procedencia</strong></label>
                                                <div>
                                                    <select data-placeholder="Selecciona un departamento" class="chosen-select" multiple style="" tabindex="4" id="departamento">
                                                            <?php
                                                            $resultDepartamento = $conexion->getDepartamentos();
                                                        
                                                            if($resultDepartamento){
                                                                while($row=mysqli_fetch_assoc($resultDepartamento)){
                                                                    echo '<option value="' .$row['cod_depto']. '">' .$row['nombre_depto']. '</option>';
                                                                }
                                                            }
                                                            ?>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4" >
                                                <div class="animated" id="municontainer">
                                                    <label class="font-normal"><strong>Municipio de Procedencia</strong></label>
                                                    <select class="select2_demo_2 form-control" multiple="multiple" data-placeholder="Selecciona un municipio" id="municipios">
                                                    </select>
                                                </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            Informaci&oacute;n Personal
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="font-normal"><strong>Estado Civil</strong></label>
                                                <div>
                                                    <select data-placeholder="Selecciona una opci&oacute;n" class="chosen-select" style="" tabindex="4" id="estadocivil">
                                                        <option value="">Selecciona una opci&oacute;n</option>
                                                        <option value="CASADO">CASADO(A)</option>
                                                        <option value="DIVORCIADO">DIVORCIADO(A)</option>
                                                        <option value="MADRE SOLTERA">MADRE SOLTERA</option>
                                                        <option value="RELIGIOSO">RELIGIOSO(A)</option>
                                                        <option value="SEPARADO">SEPARADO(A)</option>
                                                        <option value="SOLTERO">SOLTERO(A)</option>
                                                        <option value="UNION LIBRE">UNION LIBRE</option>
                                                        <option value="VIUDO">VIUDO(A)</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <label class="font-normal"><strong>Discapacidad</strong></label>
                                                <div>
                                                    <select data-placeholder="Selecciona una opci&oacute;n" class="chosen-select" multiple style="" tabindex="4" id="discapacidad">
                                                        <option value="FISICA">DISCAPACIDAD F&Iacute;SICA</option>
                                                        <option value="INTELECTUAL">DISCAPACIDAD INTELECTUAL</option>
                                                        <option value="MULTIPLE">DISCAPACIDAD M&Uacute;LTiPLE</option>
                                                        <option value="PSICOSOCIAL">DISCAPACIDAD PSICOSOCIAL</option>
                                                        <option value="BAJAVISION">DISCAPACIDAD SENSORIAL - BAJA VISI&Oacute;N</option>
                                                        <option value="CEGUERA">DISCAPACIDAD SENSORIAL - CEGUERA</option>
                                                        <option value="HIPOACUSIA">DISCAPACIDAD SENSORIAL - HIPOACUSIA</option>
                                                        <option value="SORDERAPROFUNDA">DISCAPACIDAD SENSORIAL - SORDERA PROFUNDA</option>
                                                        <option value="SORDOCEGUERA">SORDO-CEGUERA</option>
                                                        <option value="NOAPLICA">NO APLICA</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <label class="font-normal"><strong>G&eacute;nero</strong></label>
                                                    <div>
                                                        <select data-placeholder="Selecciona una opci&oacute;n" class="chosen-select"  tabindex="2" id="genero">
                                                        <option value="">Selecciona una opci&oacute;n</option>
                                                        <option value="M">MASCULINO</option>
                                                        <option value="F">FEMENINO</option>
                                                        </select>
                                                    </div>
                                                <br>
                                                <label class="font-normal"><strong>Edad</strong></label>
                                                <div id="ionrange_edad"></div>
                                                <br>
                                                <label class="font-normal"><strong>Estrato Social</strong></label>
                                                <div id="ionrange_estrato"></div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>    
                         
                               <div class="col-lg-6">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            Informaci&oacute;n Institucional
                                        </div>
                                        <div class="panel-body">
                                        <div class="form-group">
                                             <label class="font-normal"><strong>Regionalizaci&oacute;n</strong></label>
                                                <div>
                                                <select data-placeholder="Selecciona una opci&oacute;n" class="chosen-select"  tabindex="2" id="regionalizacion">
                                                    <option value="">Selecciona una opci&oacute;n</option>
                                                    <option value="S">SI</option>
                                                    <option value="N">NO</option>
                                                </select>
                                                </div>
                                                <br>
                                            <label class="font-normal"><strong>Sede</strong></label>
                                                <div>
                                                <select data-placeholder="Selecciona una opci&oacute;n" class="chosen-select" style="" tabindex="4" id="sede">
                                                    <option value="">Selecciona una opci&oacute;n</option>
                                                    <option value="MIRANDA">MIRANDA</option>
                                                    <option value="POPAYAN">POPAYAN</option>
                                                    <option value="SANTANDER DE QUILICHAO">SANTANDER DE QUILICHAO</option>
                                                    <option value="SILVIA">SILVIA</option>
                                                </select>
                                                </div>
                                                <br>
                                            <label class="font-normal"><strong>Nivel</strong></label>
                                                <div>
                                                <select data-placeholder="Selecciona una opci&oacute;n" class="chosen-select" multiple style="" tabindex="4" id="nivel">
                                                    <option value="DOCTORADO">DOCTORADO</option>
                                                    <option value="ESPECIALIZACION">ESPECIALIZACI&Oacute;N</option>
                                                    <option value="MAESTRIA">MAESTR&Iacute;A</option>
                                                    <option value="PROFESIONAL">PROFESIONAL</option>
                                                    <option value="TECNOLOGIA">TECNOLOG&Iacute;A</option>
                                                </select>
                                                </div>
                                                <br>
                                            <label class="font-normal"><strong>Programa</strong></label>
                                                <div>
                                                <select class="select2_demo_2 form-control" multiple="multiple" data-placeholder="Selecciona una opci&oacute;n" id="programas">
                                                    <?php
                                                            $resultPrograma = $conexion->getCarreras();
                                                        
                                                            if($resultPrograma){
                                                                while($row=mysqli_fetch_assoc($resultPrograma)){
                                                                    echo '<option value="' .$row['sniesprograma']. '">' .$row['nombre_progra']. '</option>';
                                                                }
                                                            }
                                                            ?>
                                                </select>
                                                </div>
                                                <br>
                                                <label class="font-normal"><strong>Semestre</strong></label>
                                                <div id="ionrange_semestre"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="col-lg-12">
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                             Informaci&oacute;n Social
                                        </div>
                                        <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label class="font-normal"><strong>Grupo &Eacute;tnico</strong></label>
                                                    <div>
                                                    <select data-placeholder="Selecciona una opci&oacute;n" class="chosen-select" multiple style="" tabindex="4" id="grupoetnico" data-animation="bounceIn">
                                                        <option value="NEGRA">COMUNIDAD NEGRA</option>
                                                        <option value="INDIGENA">PUEBLO IND&Iacute;GENA</option>
                                                        <option value="RROM">PUEBLO RROM</option>
                                                        <option value="NOINFORMA">NO INFORMA</option>
                                                        <option value="NOPERTENECE">NO PERTENECE</option>
                                                    </select>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-lg-4" >
                                                <div class="animated" id="comunidadnegra">
                                                <label class="font-normal"><strong>Comunidad Negra</strong></label>
                                                    <div>
                                                    <select data-placeholder="Selecciona una opci&oacute;n" class="chosen-select" multiple tabindex="4" id="comuninegra">
                                                        <option value="AFROCOLOMBIANOS">AFROCOLOMBIANOS</option>
                                                        <option value="PALENQUEROS">PALENQUEROS</option>
                                                        <option value="RAIZALES">RAIZALES</option>
                                                        <option value="OTRAS">OTRAS COMUNIDADES NEGRAS</option>
                                                        <option value="NOAPLICA">NO APLICA</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <div class="col-lg-4">
                                                <div class="animated" id="comunidadindigena">
                                                <label class="font-normal"><strong>Comunidad Ind&iacute;gena</strong></label>
                                                    <div>
                                                        <select data-placeholder="Selecciona una opci&oacute;n" class="chosen-select" multiple  tabindex="4" id="comuniindigena">
                                                            <option value="ANDOQUE">ANDOQUE O ANDOKE</option>
                                                            <option value="AWA">AWA (CUAIKER)</option>
                                                            <option value="CANAMOMO">CA&Ntilde;AMOMO</option>
                                                            <option value="COCAMA">COCAMA</option>
                                                            <option value="COCONUCO">COCONUCO</option>
                                                            <option value="GUAMBIANO">GUAMBIANO</option>
                                                            <option value="INGA">INGA</option>
                                                            <option value="KAMSA">KAMSA O KAM&Euml;NTS&Aacute;</option>
                                                            <option value="NASA">NASA (PA&Eacute;Z)</option>
                                                            <option value="PASTOS">PASTOS</option>
                                                            <option value="QUILLINCINGAS">QUILLINCINGAS</option>
                                                            <option value="SIONA">SIONA</option>
                                                            <option value="TOTORO">TOTOR&Oacute;</option>
                                                            <option value="YANACONA">YANACONA</option>
                                                            <option value="YAUNA">YAUNA</option>
                                                            <option value="YUKUNA">YUKUNA</option>
                                                            <option value="OTRO">OTRO</option>
                                                            <option value="NOAPLICA">NO APLICA</option>
                                                            <option value="NOINFORMA">NO INFORMA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-w-m btn-primary" id="consulta">Consultar</button>
                                    <button type="button" class="btn btn-w-m btn-success" id="cancelar">Cancelar</button>
                                </div>
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>
      

    </div>
         <?php //require "footer.php"; ?>
</div>
    
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
    

<script src="js/plugins/chosen/chosen.jquery.js"></script>
<script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/select2/select2.full.min.js"></script>

<script>
    
        $('.chosen-select').chosen({width: "100%"});
        $(".select2_demo_2").select2();
    
        var fromionrange_edad=0;
        var toionrange_edad=100;
    
        var fromionrange_estrato=0;
        var toionrange_estrato=6;
    
        var fromionrange_semestre=1;
        var toionrange_semestre=12;
    
        function get_ionrange_edad(data){
            fromionrange_edad=(data.fromNumber);
            toionrange_edad=(data.toNumber);
        }
    
        function get_ionrange_estrato(data){
            fromionrange_estrato=(data.fromNumber);
            toionrange_estrato=(data.toNumber);
        }
    
        function get_ionrange_semestre(data){
            fromionrange_semestre=(data.fromNumber);
            toionrange_semestre=(data.toNumber);
        }
       
        $("#ionrange_edad").ionRangeSlider({
            min: 10,
            max: 100,
            type: 'double',
            from: 0,
            to: 100,
            prefix: "",
            maxPostfix: "",
            prettify: true,
            hasGrid: true,
            onStart: function (data) {
                get_ionrange_edad(data);
            },
            onChange:  function (data) {
                get_ionrange_edad(data);
            },
        });
    
        
        $("#ionrange_estrato").ionRangeSlider({
            min: 0,
            max: 6,
            type: 'double',
            from: 0,
            to: 6,
            prefix: "",
            maxPostfix: "",
            prettify: true,
            hasGrid: true,
            onStart: function (data) {
                get_ionrange_estrato(data);
            },
            onChange:  function (data) {
                get_ionrange_estrato(data);
            },
        });
    
        $("#ionrange_semestre").ionRangeSlider({
            min: 1,
            max: 12,
            type: 'double',
            from: 1,
            to: 12,
            prefix: "",
            maxPostfix: "",
            prettify: true,
            hasGrid: true,
            onStart: function (data) {
                get_ionrange_semestre(data);
            },
            onChange:  function (data) {
                get_ionrange_semestre(data);
            },
        });
    
    
        $('#comunidadnegra').removeAttr('class').attr('class', '');
                var animation = "bounceOut";
                $('#comunidadnegra').addClass('animated');
                $('#comunidadnegra').addClass(animation);
            
    
        $('#comunidadindigena').removeAttr('class').attr('class', '');
                var animation = "bounceOut";
                $('#comunidadindigena').addClass('animated');
                $('#comunidadindigena').addClass(animation);
    
         $('#municontainer').removeAttr('class').attr('class', '');
                var animation = "bounceOut";
                $('#municontainer').addClass('animated');
                $('#municontainer').addClass(animation);
             
    
        $("#grupoetnico").change(function() {
            
            var str = $("#grupoetnico").val();
                
               if(str.indexOf("NEGRA") > -1){
                    $('#comunidadnegra').removeAttr('class').attr('class', '');
                    var animation = $(this).attr("data-animation");
                    $('#comunidadnegra').addClass('animated');
                    $('#comunidadnegra').addClass(animation);

                    $('#comunidadindigena').removeAttr('class').attr('class', '');
                    var animation = "bounceOut";
                    $('#comunidadindigena').addClass('animated');
                    $('#comunidadindigena').addClass(animation);
                    
               }else if(str.indexOf("INDIGENA") > -1){
                    $('#comunidadindigena').removeAttr('class').attr('class', '');
                    var animation = $(this).attr("data-animation");
                    $('#comunidadindigena').addClass('animated');
                    $('#comunidadindigena').addClass(animation);

                    $('#comunidadnegra').removeAttr('class').attr('class', '');
                    var animation = "bounceOut";
                    $('#comunidadnegra').addClass('animated');
                    $('#comunidadnegra').addClass(animation);
                   
               }else{
                   $('#comunidadnegra').removeAttr('class').attr('class', '');
                    var animation = "bounceOut";
                    $('#comunidadnegra').addClass('animated');
                    $('#comunidadnegra').addClass(animation);

                    $('#comunidadindigena').removeAttr('class').attr('class', '');
                    var animation = "bounceOut";
                    $('#comunidadindigena').addClass('animated');
                    $('#comunidadindigena').addClass(animation);
               }if((str.indexOf("INDIGENA") > -1)&&(str.indexOf("NEGRA") > -1)){
                    
                    $('#comunidadnegra').removeAttr('class').attr('class', '');
                    var animation = $(this).attr("data-animation");
                    $('#comunidadnegra').addClass('animated');
                    $('#comunidadnegra').addClass(animation);

                    $('#comunidadindigena').removeAttr('class').attr('class', '');
                    var animation = $(this).attr("data-animation");
                    $('#comunidadindigena').addClass('animated');
                    $('#comunidadindigena').addClass(animation);
               }

    });
    
     $("#tipoconsulta").change(function() {
         var str = $("#tipoconsulta").val();
         if(str.indexOf("MUNICIPIO") > -1){
            $('#municontainer').removeAttr('class').attr('class', '');
            var animation = "bounceIn";
            $('#municontainer').addClass('animated');
            $('#municontainer').addClass(animation);
         }else{
             $('#municontainer').removeAttr('class').attr('class', '');
             var animation = "bounceOut";
             $('#municontainer').addClass('animated');
             $('#municontainer').addClass(animation);
         }
     });
    
    $("#departamento").change(function() {  
        $.ajax({
            type: "POST",
            url: 'php/consultamunicipio.php',
            data: 'departamentos='+$("#departamento").val(),
            success: function(resp){
                $("#municipios").html(resp);   
            }
        });
    });
    
    $("#nivel").change(function() {  
        $.ajax({
            type: "POST",
            url: 'php/consultaprograma.php',
            data: 'nivel='+$("#nivel").val(),
            success: function(resp){
                $("#programas").html("");
                $("#programas").html(resp);                 
            }
        });
    });

</script>
    
<script>
    
    $("#consulta").click(function() {  
       var enviardatos = 'consulta.php? departamento='+$("#departamento").val()+'&municipios='+$("#municipios").val()+'&estadocivil='+$("#estadocivil").val()+'&discapacidad='+$("#discapacidad").val()+'&genero='+$("#genero").val()+'&toionrange_edad='+toionrange_edad+'&fromionrange_edad='+fromionrange_edad+'&toionrange_estrato='+toionrange_estrato+'&fromionrange_estrato='+fromionrange_estrato+'&regionalizacion='+$("#regionalizacion").val()+'&sede='+$("#sede").val()+'&nivel='+$("#nivel").val()+'&programas='+$("#programas").val()+'&toionrange_semestre='+toionrange_semestre+'&fromionrange_semestre='+fromionrange_semestre+'&grupoetnico='+$("#grupoetnico").val()+'&comuninegra='+$("#comuninegra").val()+'&comuniindigena='+$("#comuniindigena").val()+'&tipoconsulta='+$("#tipoconsulta").val()
 
        window.open(enviardatos, '_blank');  
        
    });
    

</script>
    
</body>

</html>
