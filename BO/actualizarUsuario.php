<?php
        require_once '../EasyPDO/conexionPDO.php';
        $fecha_actual=date("Y-m-d H:i:s");
        $error="";

        // valida que todos los datos sean recibidos correctamente
        if(!isset($_POST['nombre'])) {
                $error="Ocurrio un problema con el nombre ingresado";
        }else{ 
                $nombre=$_POST['nombre'];
        }

        if(!isset($_POST['sexo'])) {
                $error="Ocurrio un problema con la opcion de sexo marcada";
        }else{
                $sexo=$_POST['sexo'];
        }

        if(!isset($_POST['fecha'])) {
                $error="Ocurrio un problema con la fecha ingresada";
        }else{
                $fecha=$_POST['fecha'];
        }

        if(!isset($_POST['email'])) {
                $error="Ocurrio un problema con el email ingresado";
        }else{
                $email=$_POST['email'];
        }

        if(!isset($_POST['usuario'])) {
                $error="Ocurrio un problema con el nombre de usuario";
        }else{
                $usuario=$_POST['usuario'];
        }

        if(!isset($_POST['clave'])) {
                $error="Ocurrio un problema con la clave";
        }else{
                $clave=$_POST['clave'];
        }
        // fin validacion de datos recibidos

        // confirma que no existan errores
        if ($error=="") {
                // realiza el insert en la tabla usuario
                $db->prepare("UPDATE usuario SET 
                        nombre=:nombre, 
                        sexo=:sexo, 
                        fecha_nacimiento=:fecha_nacimiento, 
                        correo=:correo, 
                        password=:password
                        WHERE usuario=:usuario;
                        "
                        ,true);
                $db->execute(
                        array(
                                ':nombre' => $nombre,
                                ':sexo' => $sexo,
                                ':fecha_nacimiento' => $fecha,
                                ':correo' => $email,
                                ':usuario' => $usuario,
                                ':password' => sha1($clave)
                        )
                );
                
               header("location: ../index.php?res=1");

                $id_usuario=$db->lastId();         
        }else
        {
            echo $error;   
        }
        // fin confirmacion error
