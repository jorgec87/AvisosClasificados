<html>
    <head>
        <title>Registro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="http://2.bp.blogspot.com/-ZJNw3suLePk/VSEkX0oyQ2I/AAAAAAAAAZA/6QkRrUjHLNs/s1600/segundamano.png">
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
 <?php 
         if(isset($_GET['res'])) {
            if($_GET['res']==1){
              ?>     
             <script>
                   alert('Sus datos han sido ingresados correctamente');
             </script>
        
               <?php
            } elseif($_GET['res']==2){
                ?>     
             <script>
                   alert('Error!, Su correo ya esta registrado');
             </script>
        
               <?php
            } 
        }
 ?>
        
     
    </head>
    <body>
        <!-- INCLUDE HEADER-->
        <?php require_once './include/include_header_register.php';?>
        <!-- FIN HEADER-->
        </div>
        
        <div class="container" id="Contenido" style="margin-bottom:200px;" >
            <div class="page-header" style="margin-top: 220px;">
                    <h1>Registrarse como nuevo usuario <small>Publica gratis con nosotros, de forma facil y sencilla</small></h1>
                </div>
            <div class="panel panel-default">
                <div class="panel-heading">Datos</div>
                <div class="panel-body" >
                  
                    <div class="container_form" >
                        <form class="form-horizontal" id="form_usuario" method="POST" action="BO/procesa_registro.php">
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre completo">
                                </div>
                            </div>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-form-label col-sm-2 ">Sexo</label>
                                    <label class="radio-inline" style="margin-left: 10px;">
                                        <input id="inlineradio1" name="sexo" value="0" type="radio">
                                        Masculino</label>
                                    <label class="radio-inline">
                                        <input id="inlineradio2" name="sexo" value="1" type="radio">
                                        Femenino</label>
                                </div>
                            </fieldset>
                            <div class="clearfix"></div>
                            <div class="form-group row">
                                <label for="fecha_nacimiento" class="col-sm-2 col-form-labell">Fecha De Nacimiento</label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="fecha_nacimiento" type="date" value="" id="fecha">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="clave1" class="col-sm-2 col-form-label">Clave</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" id="clave1" placeholder="Ingrese su clave">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="clave" class="col-sm-2 col-form-label">Confirmar Clave</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" name="clave" id="clave" placeholder="Reingrese su clave">
                                </div>
                            </div>

                            

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
        </div>
        <!-- INCLUDE FOOTER-->
<?php require_once './include/include_footer.php';?>
         <!-- FIN FOOTER-->
    </body>
</html>

