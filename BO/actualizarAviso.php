<?php
        require_once '../include/include_valida_session.php';
        require_once '../config.php';
        require_once '../EasyPDO/conexionPDO.php';

        $fecha_actual=date("Y-m-d H:i:s");
        $fecha=date("Y-m-d");
        $id_usu=$_SESSION['id_cliente'];
        $error="";

         // valida que todos los datos sean recibidos correctamente
        if (!isset($_POST['id_aviso'])) {
                $error = "Ocurrio un problema con el id del aviso";
        } else {
                $id_aviso = $_POST['id_aviso'];
        }

        if(!isset($_POST['titulo'])) {
                $error="Ocurrio un problema con el titulo";
        }else{
                $titulo=$_POST['titulo'];
        }

        if (!isset($_POST['ddlCategoria'])) {
                $error="Ocurrio un problema con la categoria";
        }else{
                $categoria=$_POST['ddlCategoria'];
        }

        if (!isset($_POST['resumen'])) {
                $error="Ocurrio un problema con el resumen";
        }else{
                $resumen=$_POST['resumen'];
        }

        if (!isset($_POST['descripcion'])) {
                $error="Ocurrio un problema con la descripcion";
        }else{
                $descripcion=$_POST['descripcion'];
        }

        if (!isset($_POST['precio'])) {
                $error="Ocurrio un problema con el precio";
        }else{
                $precio=$_POST['precio'];
        }       
        
        if($error !=""){
                echo $error; 
        }

        // fin validacion de datos recibidos
        
       
        // Se ingresa imagen
        if ($error=="") {
          $nombre_img = $_FILES['imgProducto']['name'];       
        if( $nombre_img == NULL ){
             // ingreso de registros en la tabla aviso sin imagen
               $db->prepare("UPDATE aviso SET 
                       titulo=:titulo,
                       resumen=:resumen,
                       descripcion=:descripcion,
                       precio=:precio,
                       fecha_aviso=:fecha_aviso,
                       USUARIO_id_usuario=:id_usu,
                       CATEGORIA_id_categora=:categoria
                       WHERE id_aviso=:id_aviso;

               ",true);
               $db->execute(array(
                       ':id_aviso' => $id_aviso,
                       ':titulo' => $titulo,
                       ':resumen' => $resumen,
                       ':descripcion' => $descripcion,
                       ':precio' => $precio,
                       ':fecha_aviso' => $fecha_actual,
                       ':id_usu' => $id_usu,
                       ':categoria' => $categoria              
               ));
              
            
              header("location: ../misAvisos.php?res=2");
                 
        }else{
              // Recibo los datos de la imagen
           
            $nombre_tmp = $_FILES['imgProducto']['tmp_name'];
            $tipo = $_FILES['imgProducto']['type'];
            $tamano = $_FILES['imgProducto']['size'];
            $limite = 10*1024*1024;//10 mb
            
           //Si existe imagen y tiene un tamaño correcto
            if (($_FILES['imgProducto']['size'] <= $limite)) 
            {
               //indicamos los formatos que permitimos subir a nuestro servidor
               if (($_FILES["imgProducto"]["type"] == "image/gif")
               || ($_FILES["imgProducto"]["type"] == "image/jpeg")
               || ($_FILES["imgProducto"]["type"] == "image/jpg")
               || ($_FILES["imgProducto"]["type"] == "image/png"))
               {
                   
                if( file_exists($conf['path_files']."/".$id_usu."/".$nombre_img) )
                {   //comprueba si existe el archivo 
                    echo"El proceso no fue realizado, no puede actualizar con la misma foto, por favor vuelva a realizar el proceso";
                }else{
                    
                   // crea la carpeta con el id del cliente
                if(!file_exists( $conf['path_files']."/".$id_usu) ){
                        mkdir($conf['path_files']."/".$id_usu, 0777, true);
                } 
                // fin crear carpeta
                
                // mueve el archivo a la carpeta
                    move_uploaded_file($nombre_tmp,$conf['path_files']."/".$id_usu."/".$nombre_img);
                // fin mover archivos
                
                // ingreso de registros en la tabla aviso
               $db->prepare("UPDATE aviso SET 
                       titulo=:titulo,
                       resumen=:resumen,
                       descripcion=:descripcion,
                       precio=:precio,
                       fecha_aviso=:fecha,
                       foto=:foto,
                       USUARIO_id_usuario=:id_usu,
                       CATEGORIA_id_categora=:categoria
                       WHERE id_aviso=:id_aviso;
               ",true);
               $db->execute(array(
                       ':id_aviso' => $id_aviso,
                       ':titulo' => $titulo,
                       ':resumen' => $resumen,
                       ':descripcion' => $descripcion,
                       ':precio' => $precio,
                       ':fecha' => $fecha_actual,
                       ':foto' => $nombre_img ,
                       ':id_usu' => $id_usu,
                       ':categoria' => $categoria                      
               ));
               // fin actualizacion tabla aviso
               
                  
                  header("location: ../misAvisos.php?res=2");
                 
                }
                 } 
                else 
                {
                   //si no cumple con el formato
                   echo "No se puede subir una imagen con ese formato ";
                }
            } 
            else 
            {
                echo "La imagen es demasiado grande "; 
            }
        }
        
            }