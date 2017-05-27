<html>
    <head>
        <title>Registro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once './include/include_header_register.php';?>
        </div>
        
        <div class="container" id="Contenido" >
            <div class="page-header" style="margin-top: 220px;">
                    <h1>Registrarse como nuevo usuario <small>Publica gratis con nosotros, de forma facil y sencilla</small></h1>
                </div>
            <div class="panel panel-default">
                <div class="panel-heading">Datos</div>
                <div class="panel-body">
                  
                    <div class="container_form" >
                        <form class="form-horizontal" role="form">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Ingrese su nombre completo">
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
                                <label for="fecha" class="col-sm-2 col-form-labell">Date</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="date" value="" id="fecha">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Ingrese su correo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Usuario</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre de usuario">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Clave</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Ingrese su clave">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Confirmar Clave</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Reingrese su clave">
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Guardar Datos</button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-lg btn-warning">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>              

                
                
                
            </div>
        </div>
<?php require_once './include/include_footer.php';?>
    </body>
</html>

