<?php
        require_once '../EasyPDO/conexionPDO.php';
        $fecha_actual=date("Y-m-d H:i:s");
        
         // valida que todos los datos sean recibidos correctamente
        if(!isset($_GET['id'])) {
                $error="Ocurrio un problema con el usuario ingresado";
        }else{ 
                $id=$_GET['id'];
        }
        
        $db->prepare('delete FROM anuncios_beta.aviso WHERE id_aviso=:id');
        $db->execute(
	array(
		':id' => $id
	)
        );
        
        header("location: ../misAvisos.php?res=1");