<?php
require_once './EasyPDO/conexionPDO.php';

session_start();
        
$sql_aviso = $db->get_results("SELECT titulo,
                                (select nombre_categoria from anuncios_beta.categoria where id_categoria = CATEGORIA_id_categora) categoria,
                                USUARIO_id_usuario,
                                descripcion,
                                precio,
                                foto,
                                id_aviso
                                FROM anuncios_beta.aviso;");



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
      <?php 
      //mensaje de error desde procesa_login
         if(isset($_GET['error'])) {
            if($_GET['error']==1 || $_GET['error']==2){
              ?>     
             <script>
                   alert('Error!, sus datos de acceso no son validos');
             </script>
        
               <?php
            }
        }
 ?>
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
                    
                       
                        <?php
                        foreach ($sql_aviso as $key => $aviso) 
                        {?>
                    <li class="row listaAvisos">                   
                        <div class="col-md-3">
                            <?php 
                            if ($aviso->foto == null || $aviso->foto == '') 
                            {
                            ?>
                            <img src="http://icon-icons.com/icons2/79/PNG/256/misc_box_15274.png" class="img-responsive">
                            <?php    
                            }else
                            {
                            ?>
                            <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':82'?>/AvisosClasificados/img_avisos/<?php echo $aviso->USUARIO_id_usuario;?>/<?php echo $aviso->foto; ?>" alt="Sin Imagen" width="200" height="200" class="img-responsive">                       
                            <?php    
                            }
                            ?>                         
                        </div>
                        <div class="col-md-3">
                            <p><?php echo $aviso->titulo;?></p>
                            <br>
                            <p><?php echo $aviso->precio;?></p>
                        </div>
                        <div class="col-md-6">
                            <p>Categoria:<?php echo $aviso->categoria;?></p>
                            <p>
                                Descripcion:<br>
                                <?php echo $aviso->descripcion;?>
                            </p>
                        </div>
                        <!-- <div class="col-md-1">
                            <button id="botonVer">Ver</button> 
                             </div> -->
                    </li>                                              
                        <?php              
                        }?>	       
                </ul>  
            </div> 
        </div>
<?php require_once './include/include_footer.php';?>
    </body>
</html>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>

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
