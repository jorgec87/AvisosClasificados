<?php
require_once './include/include_valida_session.php';
require_once './EasyPDO/conexionPDO.php';
require_once './config.php';

   if(!isset($_GET['id'])) {
                $error="Ocurrio un problema con los datos ingresados";
        }else{ 
                $id=$_GET['id'];
        }

//        Consulta a la tablas categoria

$sql_categoria = $db->get_results("SELECT * FROM anuncios_beta.categoria");
$sql_aviso = $db->get_results("SELECT * FROM anuncios_beta.aviso where id_aviso = $id");
    
 


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
       
        <style>
            .thumb {
                height: 300px;
                border: 1px solid #000;
                margin: 10px 5px 0 0;
            }
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
                    alert('Sus aviso se ha actualizado correctamente');
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
        <?php require_once './include/include_header_private_1.php'; ?>
        <div class="container col-md-offset-1 col-md-11" id="Contenido">

            <div class="page-header" style="margin-top: 40px;">
                <h1>Publicar aviso <small>Publica GRATIS con nosotros, de forma facil y sencilla</small></h1>
            </div>

            <div class="panel panel-default col-lg-10 col-lg-offset-1" style="padding: 0; margin-bottom: 200px">
                <div class="panel-heading">Edita tu aviso</div>
                <div class="panel-body" >
                <form class="form-horizontal" id="form_aviso" method="POST" enctype="multipart/form-data" action="BO/actualizarAviso.php">
                    <div class="container col-lg-6" >
                            <div class="form-group row">   
                                <label for="titulo" class="col-sm-3 col-form-label">Titulo de aviso</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nombre" name="titulo" value="<?php echo $sql_aviso[0]->titulo ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="titulo" class="col-sm-3 col-form-label">Categoria</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="ddlCategoria">
                                        <option value="0">Seleccione tipo aviso</option>
                                        <?php
                                        foreach ($sql_categoria as $key => $categoria) 
                                        {
                                            if ($categoria->id_categoria == $sql_aviso[0]->CATEGORIA_id_categora) 
                                            { ?>
                                        <option value="<?php echo $categoria->id_categoria; ?>" selected="<?php $id_categoria?>" ><?php echo $categoria->nombre_categoria; ?></option>        
                                           <?php }
                                            else{
                                            ?>									
                                        <option value="<?php echo $categoria->id_categoria; ?>" ><?php echo $categoria->nombre_categoria; ?></option>
                                            <?php
                                        }}
                                        ?>
                                    </select>  
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="resumen" class="col-sm-3 col-form-label">Resumen del aviso</label>
                                <div class="col-sm-9">
                                    <textarea style="resize:none" rows="2" class="form-control" name="resumen"  id="resumen"><?php echo $sql_aviso[0]->resumen; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcion" class="col-sm-3 col-form-label">Descripción del aviso</label>
                                <div class="col-sm-9">
                                    <textarea style="resize:none" rows="6" class="form-control" name="descripcion"  id="descripcion"><?php echo $sql_aviso[0]->descripcion; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="precio" class="col-sm-3 col-form-label">Precio</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $sql_aviso[0]->precio ?>">
                                </div>
                            </div>
                            <input type="hidden" name="id_aviso" value="<?php echo $sql_aviso[0]->id_aviso;?>" >
                            <div class="form-group row">
                                <div class="col-sm-3 col-md-offset-3">
                                    <a href="misAvisos.php" class="btn btn-lg btn-warning ">Cancelar</a>
                                </div>
                                <div class="col-sm-3 col-md-offset-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Guardar Aviso</button>
                                </div>

                            </div>
                    </div>
                    <div class="col-lg-6">

                        <div style="position:relative;">
                            <a class='btn btn-primary' href='javascript:;'>
                                Subir Imagen
                                <input type="file" id="files" name="imgProducto" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                            </a>
                            &nbsp;
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>

                        <output id="list" >
                             <?php 
                            if ( $sql_aviso[0]->foto  == null || $sql_aviso[0]->foto  == '') 
                            {
                            ?>
                          <td>  <img src="http://icon-icons.com/icons2/79/PNG/256/misc_box_15274.png" alt="Sin Imagen" width="300" height="300"  ></td>
                            <?php    
                            }else
                            {
                            ?>
                           <td><img src="<?php echo $conf['name_server'].'img_avisos/'.$_SESSION['id_cliente'].'/'.$sql_aviso[0]->foto ?>" alt="Sin Imagen" width="100" height="100" class="img-responsive"></td>                    
                            <?php    
                            }
                            ?>    
                        </output>
                    </div>
                    </form>
                </div> 
            </div>   

        </div>
        <?php require_once './include/include_footer.php'; ?>

        <script>
            function archivo(evt) {
                var files = evt.target.files; // FileList object

                // Obtenemos la imagen del campo "file".
                for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }

                    var reader = new FileReader();

                    reader.onload = (function (theFile) {
                        return function (e) {
                            // Insertamos la imagen
                            document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);

                    reader.readAsDataURL(f);
                }
            }

            document.getElementById('files').addEventListener('change', archivo, false);
        </script>
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

   $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Seleccione una Opcion");
            //funcion que valida campos
$("#form_aviso").validate({
                rules: {
                    titulo: {
                        required: true,
                        minlength: 4
                    },ddlCategoria: { 
                        valueNotEquals: "0" 
                    },resumen: {
                        required: true,
                        minlength: 4
                    },descripcion: {
                        required: true,
                        minlength: 4
                    },precio: {
                        required: true,
                        number: true
                    }
                }
            });
          

           
       });
</script>

