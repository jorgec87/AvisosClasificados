<?php
	session_start();
?>
<html>
    <head>
        <title>Mis Datos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
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
        <div class="container col-md-offset-1 col-md-11" id="Contenido">
            <div class="page-header" style="margin-top: 20px; margin-bottom: 10px;">
                    <h4>Publica gratis con nosotros, de forma facil y sencilla</h4>
                </div>
            <div class="panel panel-default">
                <div class="panel-heading">Mis Datos</div>
                <div class="panel-body" > 
                    
                    <div class="container_form col-md-offset-1 col-md-11" >
                        <form class="form-horizontal" id="form_usuario" method="POST" action="BO/actualizarUsuario.php">
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre completo" value="<?php echo $_SESSION['nombre'];?>">
                                </div>
                            </div>
                            <fieldset>
                                <div class="form-group">                                                                   
                                     <?php
                                     if ($_SESSION['sexo']=='0') 
                                     {
                                     echo '<label class="col-form-label col-sm-2 ">Sexo</label>';
                                     echo '<label class="radio-inline" style="margin-left: 10px;">';
                                     echo '<input id="inlineradio1" name="sexo" value="0" type="radio" checked="checked">';
                                     echo 'Masculino</label>';
                                     echo '<label class="radio-inline">';
                                     echo '<input id="inlineradio2" name="sexo" value="1" type="radio">';
                                     echo 'Femenino</label>';
                                     }
                                     elseif ($_SESSION['sexo']=='1') 
                                     {
                                     echo '<label class="col-form-label col-sm-2 ">Sexo</label>';
                                     echo '<label class="radio-inline" style="margin-left: 10px;">';
                                     echo '<input id="inlineradio1" name="sexo" value="0" type="radio">';
                                     echo 'Masculino</label>';
                                     echo '<label class="radio-inline">';
                                     echo '<input id="inlineradio2" name="sexo" value="1" type="radio" checked="checked">';
                                     echo 'Femenino</label>';
                                     }
                                     ?>     
                                </div>
                            </fieldset>
                            <div class="clearfix"></div>
                            <div class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-labell">Fecha De Nacimiento</label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="fecha" type="date" value="<?php echo $_SESSION['fecha'];?>" id="fecha">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo" value="<?php echo $_SESSION['correo'];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="clave1" class="col-sm-2 col-form-label">Clave</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" id="clave1U" name="clave1" placeholder="Ingrese su clave">
                                </div>
                            </div>                                                     
                            <div class="form-group row">
                                <label for="clave" class="col-sm-2 col-form-label">Confirmar Clave</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" name="clave" id="clave" placeholder="Reingrese su clave">
                                </div>
                            </div>
                            <input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario'];?>" >
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Guardar Datos</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="index.php" class="btn btn-lg btn-warning ">Cancelar</a>
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
<script src="js/toastr.min.js" type="text/javascript"></script>

<script>
        $(document).ready(function(){
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
});
          
            //funcion que valida campos
            $("#form_usuario").validate({
                rules: {
                    nombre: {
                        required: true,
                        minlength: 4
                    },fecha_nacimiento: {
                        required: true,
                        date: true
                    },email: {
                        required: true,
                        email: true
                    },usuario: {
                        required: true,
                        minlength: 4
                    },clave1: {
                        required: true,
                        minlength: 4
                        
                    },clave: {
                        equalTo: "#clave1"
                         }
                    
        }
            });
          

           
       });
</script>
       <?php 
         if(isset($_GET['res'])) {
            if($_GET['res']==1){
              ?>     
             <script>
                            $(document).ready(function(){
                        toastr.options = {
                      "closeButton": true,
                      "debug": true,
                      "progressBar": true,
                      "preventDuplicates": false,
                      "positionClass": "toast-top-center",
                      "onclick": null,
                      "showDuration": "400",
                      "hideDuration": "600",
                      "timeOut": "2500",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    };
                   
                 toastr.success("Sus datos han sido actualizados correctamente!");
                           });
               
             </script>
               <?php
            } 
        }
 ?>