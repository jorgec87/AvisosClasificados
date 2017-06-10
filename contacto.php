<?php
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
        <?php
        if (isset($_GET['res'])) {
            if ($_GET['res'] == 1) {
                ?>     
                <script>
                    alert('Sus Consulta se ha enviado correctamente');
                </script>

                <?php
            } elseif ($_GET['res'] == 2) {
                ?>     
                <script>
                    alert('Error!,');
                </script>

                <?php
            }
        }
        ?>
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

            <div class="panel panel-default" style="margin-bottom: 200px; margin-top: 40px">
                <div class="panel-heading">Ingrese Sus Datos</div>
                <div class="panel-body" >                    
                    <div class="container_form col-md-offset-1 col-md-11" >
                        <form class="form-horizontal" id="form_contacto" method="POST" action="BO/procesar_contacto.php">
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" value="">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group row">
                                <label for="Email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electronico" value="">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group row">
                                <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su telefono" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="consulta" class="col-sm-2 col-form-label">Consulta</label>
                                <div class="col-sm-4">
                                    <textarea rows="8" cols="93" name="consulta" id="consulta" placeholder="Ingrese su consulta aca"></textarea>   
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Enviar</button>
                                </div>
                                <div class="col-sm-3">
                                    <a href="index.php" class="btn btn-lg btn-warning ">Limpiar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>                
        </div>
<?php require_once './include/include_footer.php';?>
    </body>
</html>

<script src="js/jquery.validate.min.js" type="text/javascript"></script>

<script>
 $(document).ready(function(){
   
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
$("#form_contacto").validate({
                rules: {
                    nombre: {
                        required: true,
                        minlength: 4
                    },email: { 
                         required: true,
                        email: true 
                    },telefono: {
                        required: true,
                        number: true
                    },consulta: {
                        required: true,
                        minlength: 4
                    }
                }
            });
          

           
       });
</script>
