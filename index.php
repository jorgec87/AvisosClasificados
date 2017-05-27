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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php require_once './include/include_header_public.php';?>
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
                    <li class="row" id="listaAvisos">
                        <div class="col-md-3">
                            <img src="http://icon-icons.com/icons2/79/PNG/256/misc_box_15274.png" class="img-responsive">
                        </div>
                        <div class="col-md-3">
                            <p>ELECTRÓNICA TAKAME, S.A. DE C.V.</p>
                            <p>25 de Mayo del 2017.</p><br>
                            <p>Precio: $ Variable.</p>
                        </div>
                        <div class="col-md-5">
                            <p>COMUNICADO (tipo de aviso)</p>
                            <p>
                                Se comunica a todo el personal que el próximo 
                                lunes 30 de abril del año en curso,  se presentará en 
                                oficinas centrales de esta Empresa,  
                                el Presidente del Consorcio Mundial TAKAWE,  
                                por lo que en su honor se ofrecerá una comida en el Centro Libanes de la Cd.  
                                de México a partir de las 15:00 horas.    La bienvenida estará a cargo de 
                                nuestro Director de la Planta Nogales,  Sr.  Oko Na-gazawa,  por lo cual,  
                                les rogamos su puntual asistencia. Los boletos serán personales y podrán recogerlos en 
                                la Gerencia Administrativa,  así como los viáticos correspondientes,  a partir de hoy.
                            </p>
                        </div>
                        <div class="col-md-1">
                            <button id="botonVer">Ver</button>
                        </div>
                    </li>         
                </ul>  
            </div> 
        </div>
<?php require_once './include/include_footer.php';?>
    </body>
</html>

