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

            <div class="panel panel-default">
                <div class="panel-heading">Ingrese Sus Datos</div>
                <div class="panel-body" >                    
                    <div class="container_form col-md-offset-1 col-md-11" >
                        <form class="form-horizontal" id="form_usuario" method="POST" action="BO/procesar_contacto.php">
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

