<?php
require_once './include/include_valida_session.php';
require_once './EasyPDO/conexionPDO.php';
require_once './config.php';
$fecha_actual=date("Y-m-d H:i:s");

//        Consulta a la tablas categoria

$sql_avisos = $db->get_results("SELECT titulo,
                                (select nombre_categoria from anuncios_beta.categoria where id_categoria = CATEGORIA_id_categora) categoria,
                                precio,
                                foto,
                                id_aviso
                                FROM anuncios_beta.aviso where USUARIO_id_usuario = ".$_SESSION['id_cliente'].";");

//         Fin consultas 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Publicar Aviso</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="http://2.bp.blogspot.com/-ZJNw3suLePk/VSEkX0oyQ2I/AAAAAAAAAZA/6QkRrUjHLNs/s1600/segundamano.png">
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
         <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
         <link href="css/toastr.min.css" rel="stylesheet" type="text/css"/>
 </head>
    <body>
        <?php require_once './include/include_header_private_1.php'; ?>
        <div class="container col-md-offset-1 col-md-11" id="Contenido">

            <div class="page-header" style="margin-top: 40px;">
                <h1>Mis Avisos <small>Publica GRATIS con nosotros, de forma facil y sencilla</small></h1>
            </div>
            <div class="container">
            <table class="table success table-bordered table-striped  table-responsive">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Categoria</th>
                        <th>Fecha</th>
                        <th>Precio</th>
                        <th>Foto</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       foreach ($sql_avisos as $key => $aviso) {
                    ?>									
                     <tr>
                         <td><strong><?php echo $aviso->titulo; ?></strong></td>
                        <td><?php echo $aviso->categoria; ?></td>
                        <td><?php echo $fecha_actual ?></td>
                        <td>$ <?php echo $aviso->precio; ?></td>
                        <?php 
                            if ( $aviso->foto  == null || $aviso->foto  == '') 
                            {
                            ?>
                          <td>  <img src="http://icon-icons.com/icons2/79/PNG/256/misc_box_15274.png" alt="Sin Imagen" width="100" height="100"  ></td>
                            <?php    
                            }else
                            {
                            ?>
                           <td><img src="<?php echo $conf['name_server'].'img_avisos/'.$_SESSION['id_cliente'].'/'.$aviso->foto ?>" alt="Sin Imagen" width="100" height="100" class="img-responsive"></td>                    
                            <?php    
                            }
                            ?>      
                       
                        <td>                
                            <a href="editarAviso.php?id=<?php echo $aviso->id_aviso; ?>" class="btn btn-block  btn-warning"><span class="glyphicon glyphicon-pencil"></span>  Editar</a>
                            <a href="BO/eliminar_aviso.php?id=<?php echo $aviso->id_aviso; ?>" class="btn btn-block btn-danger "><span class="glyphicon glyphicon-remove"></span>  Eliminar</a>
                        </td>
                    </tr>
                       <?php
                         }
                       ?>
                </tbody>
            </table>
        </div>
            
            
          

        </div>
        <?php require_once './include/include_footer.php'; ?>

    </body>
    <script src="js/toastr.min.js" type="text/javascript"></script>
</html>

 <?php
        if (isset($_GET['res'])) {
            if ($_GET['res'] == 1) {
                ?>     
                <script>
                    
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
                   
                 toastr.success("Aviso Eliminado Correctamente!");
                           
                </script>

                <?php
            } elseif ($_GET['res'] == 2) {
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
                   
                 toastr.success("Aviso Editado Correctamente!");
                           });
                </script>

                <?php
            }
        }
        ?>