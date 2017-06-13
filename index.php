<?php
require_once './EasyPDO/conexionPDO.php';
require_once './config.php';
//require_once './include/include_paginar.php';


    $conexion = new mysqli( $conf['db_hostname'], $conf['db_username'], $conf['db_password'], $conf['db_name']);
    $conexion->query("SET NAMES 'utf8'");
 
    $pagina       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $enlaces      = ( isset( $_GET['enlaces'] ) ) ? $_GET['enlaces'] : 5;
    $consulta      = "SELECT UPPER(titulo) titulo,
                                (select nombre_categoria from anuncios_beta.categoria where id_categoria = CATEGORIA_id_categora) categoria,
                                USUARIO_id_usuario,
                                descripcion,
                                precio,
                                foto,
                                DATE_FORMAT(fecha_aviso, '%d/%m/%Y %r') fecha_aviso,
                                id_aviso
                                FROM anuncios_beta.aviso";
    
  //  $paginar  = new Paginar($conexion, $consulta,$conf['numero_pag']);
   // $resultados    = $paginar->getDatos($pagina);

session_start();
        
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="http://2.bp.blogspot.com/-ZJNw3suLePk/VSEkX0oyQ2I/AAAAAAAAAZA/6QkRrUjHLNs/s1600/segundamano.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link href="css/toastr.min.css" rel="stylesheet" type="text/css"/>
         <style>
           .form-control.error {
             border: 1px dotted #cc5965;
            }
            label.error {
            color: #cc5965;
            display: inline-block;
            margin-left: 5px;
           }
            
        </style>

    </head>
    <body>
 <?php
 //validar session y filtrar header

	if (isset($_SESSION['id_cliente'])) {
		 require_once './include/include_header_private_2.php';
        }else{
                 require_once './include/include_header_public.php';
        }
?>
        
        </div>
        
        <div class="container col-md-offset-1 col-md-11" id="Contenido">
            <div>
                <img src="http://www.impactourbano.com.ar/images/banner-avisos-clasificados.jpg" class="img-responsive" id="fotoBanner"> 
            </div>
            <div id="divText1">
                <span>Bienvenido al Portal de los anuncios Clasificados.</span><br>
                <span>Publica GRATIS con nosotros, de forma facil y sencilla</span>
            </div>
            <div class="col-md-10">
                <ul>
                    <h3>BUSQUEDA DE AVISOS CLASIFICADOS</h3>
                   
                        <div class="container"> 
                            <ul class="pagination pull-right">
                                 <?php echo $paginar->crearLinks( $enlaces); ?>
                            </ul>
                        </div>
                        <?php
                        for( $i = 0; $i < count($resultados->datos); $i++ ):  
                        ?>
                    <li class="row listaAvisos">                   
                        <div class="col-md-3">
                            <?php 
                            if ( $resultados->datos[$i]['foto'] == null || $resultados->datos[$i]['foto'] == '') 
                            {
                            ?>
                            <img src="http://icon-icons.com/icons2/79/PNG/256/misc_box_15274.png" class="imagenListaAvisos">
                            <?php    
                            }else
                            {
                            ?>
                            <img src="<?php echo $conf['name_server'].'img_avisos/'.$_SESSION['id_cliente'].'/'.$resultados->datos[$i]['foto'] ?>" class="imagenListaAvisos">                       
                            <?php    
                            }
                            ?>                         
                        </div>
                        <div class="col-md-3 dashBorder">
                            <p class="tituloListaAvisos"><?php echo $resultados->datos[$i]['titulo']?></p>
                            <br>
                            <p>
                                <span class="textoAvisoNegrita">Fecha:</span><br> 
                                <span class="fecha"> <?php echo $resultados->datos[$i]['fecha_aviso']?></span>
                            </p><br>
                            <p><span class="textoAvisoNegrita">Precio:</span><br> 
                                <span class="precio">$<?php echo number_format($resultados->datos[$i]['precio'], 0, '.', '.');?></span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><span class="textoAvisoNegrita">Categoria:</span><br> 
                                <span class="fecha"> <?php echo $resultados->datos[$i]['categoria']?></span>
                            </p>
                            <p>
                                <span class="textoAvisoNegrita">Descripcion:</span><br>
                                <span class="fecha"> <?php echo $resultados->datos[$i]['descripcion']?></span>
                                
                            </p>
                        </div>
                        <!-- <div class="col-md-1">
                            <button id="botonVer">Ver</button> 
                             </div> -->
                    </li>                                              
                         <?php endfor; ?>	       
                </ul>  
            </div> 
             
        </div>
        <div class="container"> 
            <ul class="pagination pull-right">
                 <?php echo $paginar->crearLinks( $enlaces); ?>
            </ul>
        </div>
<?php require_once './include/include_footer.php';?>
    </body>
    <script src="js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/toastr.min.js" type="text/javascript"></script>
<script>
  
   $(document).ready(function() {
jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una dirección de correo válida",
  url: "Por favor, escribe una URL válida.",
  date: "Por favor, escribe una fecha válida.",
  dateISO: "Por favor, escribe una fecha (ISO) válida.",
  number: "Por favor, escribe un número entero válido.",
  digits: "Por favor, escribe sólo dígitos.",
  creditcard: "Por favor, escribe un número de tarjeta válido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensión aceptada.",
  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});

          
            //funcion que valida campos
            $("#form_login").validate({
                rules: {
                    usuario: {
                        required: true,
                        minlength: 4
                    },
                    pass: {
                        required: true,
                         minlength: 4
                    }
                    
        }
            });
          

           
       });
</script>
    
    
    
</html>

      <?php 
      //mensaje de error desde procesa_login
         if(isset($_GET['error'])) {
            if($_GET['error']==1 || $_GET['error']==2){
              ?>     
             <script>
                   toastr.options = {
                              "closeButton" : true,
                              "debug": false,
                              "progressBar": true,
                              "preventDuplicates": false,
                              "positionClass": "toast-top-center",
                              "onclick": null,
                              "showDuration": "400",
                              "hideDuration": "1000",
                              "timeOut": "7000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            };
                          toastr.error("Los datos de ingreso no son váidos", "Favor verificar!");
             </script>
        
               <?php
            }
        }
 ?>