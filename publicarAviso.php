<?php
require_once './include/include_valida_session.php';
require_once './EasyPDO/conexionPDO.php';

//        Consulta a la tablas categoria

$sql_categoria = $db->get_results("SELECT * FROM anuncios_beta.categoria");

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

        </style>

     

    </head>
    <body>
        <?php require_once './include/include_header_private_1.php'; ?>
        <div class="container col-md-offset-1 col-md-11" id="Contenido">

            <div class="page-header" style="margin-top: 40px;">
                <h1>Publicar aviso <small>Publica GRATIS con nosotros, de forma facil y sencilla</small></h1>
            </div>

            <div class="panel panel-default col-lg-10 col-lg-offset-1" style="padding: 0; margin-bottom: 200px">
                <div class="panel-heading">Publica tu aviso</div>
                <div class="panel-body" >
                        <form class="form-horizontal" id="form_usuario" method="POST" enctype="multipart/form-data" action="BO/procesar_aviso.php">
                    <div class="container col-lg-6" >
                       
                            <div class="form-group row">
                                <label for="titulo" class="col-sm-3 col-form-label">Titulo de aviso</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nombre" name="titulo" placeholder="Ingrese titulo del aviso">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="titulo" class="col-sm-3 col-form-label">Categoria</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="ddlCategoria">
                                        <option>Seleccione tipo aviso</option>
                                        <?php
                                        foreach ($sql_categoria as $key => $categoria) {
                                            ?>									
                                            <option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->nombre_categoria; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>  
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="resumen" class="col-sm-3 col-form-label">Resumen del aviso</label>
                                <div class="col-sm-9">
                                    <textarea style="resize:none" rows="2" class="form-control" name="resumen"  id="resumen" placeholder="Resumen general del aviso, aparecera en la busqueda" ></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripcion" class="col-sm-3 col-form-label">Descripción del aviso</label>
                                <div class="col-sm-9">
                                    <textarea style="resize:none" rows="6" class="form-control" name="descripcion"  id="descripcion" placeholder="Descripcion detallada del aviso. se mostrara el usuario cuando vea el detalle del aviso" ></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="precio" class="col-sm-3 col-form-label">Precio</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="precio" name="precio" placeholder="$ Precio">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Guardar Aviso</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="index.php" class="btn btn-lg btn-warning ">Cancelar</a>
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

                        <output id="list"></output>
                    </div>

                    </form>







                </div>
            </div>   

        </div>
        <?php require_once './include/include_footer.php'; ?>

        
           <?php
        if (isset($_GET['res'])) {
            if ($_GET['res'] == 1) {
                ?>     
                <script>
                    alert('Sus aviso se ha registrado correctamente');
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

