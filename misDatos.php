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
        
        <?php 
         if(isset($_GET['res'])) {
            if($_GET['res']==1){
              ?>     
             <script>
                   alert('Sus datos han sido actualizados correctamente');
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
                                    <input type="password" class="form-control" id="clave1U" placeholder="Ingrese su clave">
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

