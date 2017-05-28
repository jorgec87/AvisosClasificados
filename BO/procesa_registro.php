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
                $error="Ocurrio un problema con el apellido paterno";
        }else{
                $sexo=$_POST['sexo'];
        }

        if(!isset($_POST['fecha'])) {
                $error="Ocurrio un problema con el RUT ingresado";
        }else{
                $fecha=$_POST['fecha'];
        }

        if(!isset($_POST['email'])) {
                $error="Ocurrio un problema con el email ingresado";
        }else{
                $email=$_POST['email'];
        }

        if(!isset($_POST['usuario'])) {
                $error="Ocurrio un problema con el numero de celular ingresado";
        }else{
                $usuario=$_POST['usuario'];
        }

        if(!isset($_POST['clave'])) {
                $error="Ocurrio un problema con la región seleccionada";
        }else{
                $clave=$_POST['clave'];
        }

        // fin validacion de datos recibidos

        // Valida que el email ingresado no este registrado
        $db->prepare("SELECT * FROM usuario WHERE correo=:email ",true);
        $db->execute(array(':email' => $email ));
        $correo = $db -> get_results();
        // fin validacion de email

        if(!empty($correo)){
                $error="El email ingresado ya esta en uso, por favor ingrese otro email";
                header("location: ../registrarse.php?res=2");
        }

        // confirma que no existan errores
        if ($error=="") {
                // realiza el insert en la tabla usuario
                $db->prepare("INSERT INTO usuario SET 
                        nombre=:nombre, 
                        sexo=:sexo, 
                        fecha_nacimiento=:fecha_nacimiento, 
                        correo=:correo, 
                        usuario=:usuario,
                        password=:password
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
                
               header("location: ../registrarse.php?res=1");
       
                
                $id_usuario=$db->lastId();
                // fin inser de direcciones de usuario

//                // CORREO DE CONFIRMACION DE REGISTRO PARA EL USUARIO
//                // email de comprobacion de cambio de clave
//                $para= $email;
//                $titulo    = 'Cuenta Garve Shop:';
//                $mensaje   ="
//                                                Se ha registrado en Garve Shop.<br>
//                                                Sus datos son:<br><br>
//                                                Usuario: <strong>".$id_usuario."</strong><br>
//                                                Contrase&ntilde;a: <strong>".$pass."</strong><br>
//                                                Ya puede ingresar a Garve Shop Tracking.<br>
//                                                Saludos.<br>
//                                                ";
//
//                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
//                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//
//                $cabeceras .= 'From: reply@garveshop.com' . "\r\n" .
//                        'X-Mailer: PHP/' . phpversion();
//
//                mail($para, $titulo, $mensaje, $cabeceras);
//                // Fin email
//                // FIN CORREO DE CONFIRMACION
        }else
        {
            echo $error;   
        }
        // fin confirmacion error



