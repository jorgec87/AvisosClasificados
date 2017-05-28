<?php
	 require_once '../EasyPDO/conexionPDO.php';
         $fecha_actual=date("Y-m-d H:i:s");
         $error="";
         
         // valida que todos los datos sean recibidos correctamente
        if(!isset($_POST['nombre'])) {
                $error="Ocurrio un problema con el usuario ingresado";
        }else{
                $user=$_POST['nombre'];
        }

        if(!isset($_POST['pass'])) {
                $error="Ocurrio un problema con el password paterno";
        }else{
                $pass=$_POST['pass'];
        }
       
	  // fin validacion de datos recibidos

	$db->prepare("SELECT * FROM usuario WHERE usuario=:user",true);
	$db->execute(array(':user' => $user));
	$res=$db->get_results();

	if(empty($res))
	{
		// USUARIO NO EXISTE
		header("location: ../index.php?error=1");
	}
	else
	{
		//VERIFICAR SI LA CONTRASEÑA ES LA CORRECTA
		$db->prepare("SELECT * FROM usuario WHERE usuario=:user AND password=:pass",true);
		$db->execute(array(
			':user' => $res[0]->usuario,
			':pass' => sha1($pass)
		));

		$res_login = $db -> get_results();

		if(empty($res_login)){
			// CONTRASEÑA ES EQUIVOCADA
			header("location: ../index.php?error=2");		
		}else{
			foreach ($res_login as $key => $login) { 
				// dats para utilizar en las variables de sesion
				$id=$login->id_usuario;
				$nombre=$login->nombre;
				$sexo=$login->sexo;
				$fecha=$login->fecha_nacimiento;
				$correo=$login->correo;
				$usuario=$login->usuario;
				
			}
			// Se inicia la sesion y se crean las variables de sesion
			session_start();
			$_SESSION['id_cliente']=$id;
			$_SESSION['nombre']=$nombre;
			$_SESSION['sexo']=$sexo;
			$_SESSION['fecha']=$fecha;
			$_SESSION['correo']=$correo;
			$_SESSION['usuario']=$usuario;
			
			// Se redirecciona al index
			header("location: ../index.php?res=1");
                       // AvisosClasificados/BO/index.php?error=1
                       
			
		}
	}

?>